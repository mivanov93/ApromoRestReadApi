<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Products;
use AppBundle\Utils\ResponseFactory;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Transliterator\Settings;
use Transliterator\Transliterator;

class ProductsController extends Controller {

    const PROD_GRID_VIEW = 'partial b.{brandId,brandName},'
            . 'partial p.{prodId,prodName,prodNewprice,prodOldprice,prodPercentage,'
            . 'prodLastmodified,prodExptime},'
            . 'partial pc.{prodcatId,prodcatName},'
            . 'partial pi.{piId}';
    const PROD_DETAILS_VIEW = 'partial b.{brandId,brandName,brandLastmodified,brandUrl},'
            . 'partial p.{prodId,prodName,prodDescr,prodUrl,'
            . 'prodDeliveryTime,prodDeliveryCost,prodManufacturer,'
            . 'prodNewprice,prodOldprice,prodPercentage,prodExptime,prodLastmodified},'
            . 'partial pc.{prodcatId,prodcatName},'
            . 'partial pi.{piId}';
    const TOP_QUERY_CACHE_TIME = 60;
    const GRID_CACHE_TIME = 1000;
    const DETAILS_QUERY_CACHE_TIME = 1000;
    const MAX_BRANDS = 100;

//    private $lastModified;
//
//    public function __construct() {
//        $conn = $this->getDoctrine()->getConnection();
//        $query = "SELECT prod_lastmodified FROM products ORDER BY prod_lastmodified DESC LIMIT 1";
//        $qcp = new QueryCacheProfile(1, "last_modified");
//        $stmt = $conn->executeCacheQuery($query);
//        $this->lastModified = $stmt->fetchColumn();
//    }


    public function suggestAction($limit, $prodId) {

        $foundProduct = $this->getProductDetailsById($prodId);
        if ($foundProduct) {
            /* @var $repo \Doctrine\ORM\Repository */
            $repo = $this->getDoctrine()->getRepository(Products::class);
            /* @var $qb QueryBuilder */
            $qb = $repo->createQueryBuilder('p');
            $qb->select(self::PROD_DETAILS_VIEW);
            $qb->innerJoin('p.prodBrand', 'b');
            $qb->join('p.prodPiCollection', 'pi');
            $qb->innerJoin('p.prodProdcat', 'pc');
            $qb->where('p.prodProdcat = :prodcatId and p.prodId != :prodId');
            $qb->setMaxResults((int) $limit);
            $qb->setParameter('prodcatId', (int) $foundProduct['prodProdcat']['prodcatId']);
            $qb->setParameter('prodId', (int) $foundProduct['prodId']);
            $qb->addSelect("MATCH_AGAINST "
                    . "(p.prodName, p.prodDescr, p.prodKeywords, :searchQuery 'IN BOOLEAN MODE') as hidden score");
            $searchQuery = $foundProduct['prodName'];
            $searchQuery = preg_replace('/[^\p{L}\p{N}_]+/u', ' ', $searchQuery);
            $searchQuery = preg_replace('/[+\-><\(\)~*\"@]+/u', ' ', $searchQuery);
            $qb->setParameter('searchQuery', $searchQuery);
            $qb->orderBy('score', 'desc');
            $qry = $qb->getQuery();

            $qry->setResultCacheId('prod_suggest');
            $qry->setResultCacheLifetime(self::GRID_CACHE_TIME);

            $prodList = $qry->getArrayResult();
        } else {
            throw new Exception("product not found " . (int) $prodId);
        }
        $r = $this->get('response_factory')->getJsonMysqlRowsResponse($prodList, count($prodList), self::GRID_CACHE_TIME);
        return $r;
    }

    public function byIdsAction($prodIds) {
        /* @var $repo \Doctrine\ORM\Repository */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_DETAILS_VIEW);
        $qb->innerJoin('p.prodBrand', 'b');
        $qb->join('p.prodPiCollection', 'pi');
        $qb->innerJoin('p.prodProdcat', 'pc');
        $qb->where('p.prodId IN (:prodIds)');
        $idsArr = explode(',', $prodIds, 100);
        foreach ($idsArr as &$id) {
            $id = (int) $id;
        }
        sort($idsArr);
        $qb->setParameter('prodIds', $idsArr);
        $qry = $qb->getQuery();

        $qry->setResultCacheId('prod_by_ids');
        $qry->setResultCacheLifetime(self::GRID_CACHE_TIME);

        $prodList = $qry->getArrayResult();
        $r = $this->get('response_factory')->getJsonMysqlRowsResponse($prodList, count($prodList), self::GRID_CACHE_TIME);
        return $r;
    }

    private function getProductDetailsById($prodId, $cacheTime = self::DETAILS_QUERY_CACHE_TIME) {
        /* @var $repo \Doctrine\ORM\Repository */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_DETAILS_VIEW);
        $qb->innerJoin('p.prodBrand', 'b');
        $qb->join('p.prodPiCollection', 'pi');
        $qb->innerJoin('p.prodProdcat', 'pc');
        $qb->where('p.prodId = :prodId');
        $qb->setParameter('prodId', (int) $prodId);
        $qry = $qb->getQuery();

        $qry->setResultCacheId('prod_details');
        $qry->setResultCacheLifetime($cacheTime);

        $prod = $qry->getOneOrNullResult(Query::HYDRATE_ARRAY);
        return $prod;
    }

    public function detailsAction($prodId) {
        $prod = $this->getProductDetailsById($prodId);
        $r = $this->get('response_factory')->getJsonMysqlRowsResponse($prod ? [$prod] : [], $prod ? 1 : 0,
                                                                      self::DETAILS_QUERY_CACHE_TIME);
        return $r;
    }

    public function randomTopAction($limit, $prodcatId = null) {
        /* @var $repo \Doctrine\ORM\Repository */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_GRID_VIEW);
        $qb->addSelect(' rand() as HIDDEN r');
        $qb->join('p.prodPiCollection', 'pi');
        $qb->join('p.prodBrand', 'b');
        $qb->innerJoin('p.prodProdcat', 'pc');
        //$qb->groupBy('p.prodBrand');
        $qb->setMaxResults((int) $limit);
        $qb->orderBy('r');
        if ($prodcatId > 0) {
            $qb->andWhere('p.prodProdcat = :pcatId');
            $qb->setParameter('pcatId', (int) $prodcatId);
        }
        $qry = $qb->getQuery();
        $qry->setResultCacheId('cached_random_top');
        $qry->setResultCacheLifetime(self::TOP_QUERY_CACHE_TIME);

        $topProducts = $qry->getArrayResult();
        $r = $this->get('response_factory')->getJsonMysqlRowsResponse($topProducts, count($topProducts)
                , self::TOP_QUERY_CACHE_TIME);
        return $r;
    }

    public function randomProdcatAction($limit, $prodcatId = null) {
        /* @var $repo \Doctrine\ORM\Repository */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_GRID_VIEW);
        $qb->addSelect(' rand() as HIDDEN r');
        $qb->join('p.prodPiCollection', 'pi');
        $qb->join('p.prodBrand', 'b');
        $qb->innerJoin('p.prodProdcat', 'pc');
        $qb->setMaxResults((int) $limit);
        $qb->orderBy('r');
        $qb->andWhere('p.prodProdcat = :pcatId');
        $qb->setParameter('pcatId', (int) $prodcatId);

        $qry = $qb->getQuery();
        $qry->setResultCacheId('cached_random_prodcat');
        $qry->setResultCacheLifetime(self::TOP_QUERY_CACHE_TIME);

        $topProducts = $qry->getArrayResult();
        $r = $this->get('response_factory')->getJsonMysqlRowsResponse($topProducts, count($topProducts)
                , self::TOP_QUERY_CACHE_TIME);
        return $r;
    }

    public function randomBrandAction($limit, $brandId) {
        /* @var $repo \Doctrine\ORM\Repository */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_GRID_VIEW);
        $qb->addSelect(' rand() as HIDDEN r');
        $qb->join('p.prodPiCollection', 'pi');
        $qb->join('p.prodBrand', 'b');
        $qb->innerJoin('p.prodProdcat', 'pc');
        $qb->setMaxResults((int) $limit);
        $qb->orderBy('r');
        $qb->andWhere('p.prodBrand = :brandId');
        $qb->setParameter('brandId', (int) $brandId);

        $qry = $qb->getQuery();
        $qry->setResultCacheId('cached_random_brand');
        $qry->setResultCacheLifetime(self::TOP_QUERY_CACHE_TIME);

        $topProducts = $qry->getArrayResult();
        $r = $this->get('response_factory')->getJsonMysqlRowsResponse($topProducts, count($topProducts)
                , self::TOP_QUERY_CACHE_TIME);
        return $r;
    }

    public function byTopAction($prodcatId, $page, $perPage, $topOnly) {
        /* @var $repo \Doctrine\ORM\Repository */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_GRID_VIEW);
        $qb->join('p.prodPiCollection', 'pi');
        $qb->join('p.prodBrand', 'b');
        $qb->innerJoin('p.prodProdcat', 'pc');
        $qb->setFirstResult(((int) $page - 1) * (int) $perPage);
        $qb->setMaxResults((int) $perPage);
        if ($prodcatId > 0) {
            $qb->andWhere('p.prodProdcat = :pcatId');
            $qb->setParameter('pcatId', (int) $prodcatId);
        }
        if ($topOnly) {
            $qb->andWhere('p.prodPercentage > 0');
        }
        $qry = $qb->getQuery();
        $qry->setResultCacheId('cached_top');
        $qry->setResultCacheLifetime(self::GRID_CACHE_TIME);
        $qry->setHydrationMode(Query::HYDRATE_ARRAY);
        $paginator = new Paginator($qry);
        $products = $paginator->getIterator()->getArrayCopy();
        $qb->select('count(distinct p.prodId) as x');
        $qb->orderBy('x');
        $qb->setFirstResult(0);
        $qb->setMaxResults(1);
        $totalQry = $qb->getQuery();
        $totalQry->setResultCacheId('products_by_top_total');
        $totalQry->setResultCacheLifetime(self::GRID_CACHE_TIME);

        $totalRowCount = $totalQry->getSingleScalarResult();
        $r = $this->get('response_factory')->getJsonMysqlRowsResponse($products, $totalRowCount, self::GRID_CACHE_TIME);
        return $r;
    }

    public function byBrandAction($brandId, $page, $perPage) {
        /* @var $repo \Doctrine\ORM\Repository */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_GRID_VIEW);
        $qb->innerJoin('p.prodPiCollection', 'pi');
        $qb->innerJoin('p.prodBrand', 'b');
        $qb->leftJoin('p.prodPo', 'po');
        $qb->innerJoin('p.prodProdcat', 'pc');
        $qb->setFirstResult(((int) $page - 1) * (int) $perPage);
        $qb->setMaxResults((int) $perPage);
        $qb->andWhere('p.prodBrand = :brandId');
        $qb->setParameter('brandId', (int) $brandId);
        $qb->orderBy('po.poRand', 'ASC');
        $qry = $qb->getQuery();
        $qry->setResultCacheId('products_by_brand');
        $qry->setResultCacheLifetime(self::GRID_CACHE_TIME);
        $qry->setHydrationMode(Query::HYDRATE_ARRAY);
        $paginator = new Paginator($qry);
        $products = $paginator->getIterator()->getArrayCopy();
        if (count($products) > 0 || $page > 1) {
            $qb->select('count(distinct p.prodId) as x');
            $qb->orderBy('x');
            $qb->setFirstResult(0);
            $qb->setMaxResults(1);
            $totalQry = $qb->getQuery();
            $totalQry->setResultCacheId('products_by_brand_total');
            $totalQry->setResultCacheLifetime(self::GRID_CACHE_TIME);

            $totalRowCount = $totalQry->getSingleScalarResult();
        } else {
            $totalRowCount = 0;
        }
        $r = $this->get('response_factory')->getJsonMysqlRowsResponse($products, $totalRowCount, self::GRID_CACHE_TIME);
        return $r;
    }

    public function byProdcatAction($prodcatId, $page, $perPage) {
        /* @var $repo \Doctrine\ORM\Repository */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_GRID_VIEW);
        $qb->innerJoin('p.prodPiCollection', 'pi');
        $qb->innerJoin('p.prodBrand', 'b');
        $qb->leftJoin('p.prodPo', 'po');
        $qb->innerJoin('p.prodProdcat', 'pc');
        $qb->setFirstResult(((int) $page - 1) * (int) $perPage);
        $qb->setMaxResults((int) $perPage);
        $qb->andWhere('p.prodProdcat = :prodcatId');
        $qb->setParameter('prodcatId', (int) $prodcatId);
        $qb->orderBy('po.poRand', 'ASC');

        $qry = $qb->getQuery();
        $qry->setResultCacheId('products_by_category');
        $qry->setResultCacheLifetime(self::GRID_CACHE_TIME);
        $qry->setHydrationMode(Query::HYDRATE_ARRAY);
        $paginator = new Paginator($qry);
        $products = $paginator->getIterator()->getArrayCopy();
        if (count($products) > 0 || $page > 1) {
            $qb->select('count(distinct p.prodId) as x');
            $qb->orderBy('x');
            $qb->setFirstResult(0);
            $qb->setMaxResults(1);
            $totalRowCountQuery = $qb->getQuery();
            $totalRowCountQuery->setResultCacheId('products_by_category_total');
            $totalRowCountQuery->setResultCacheLifetime(self::GRID_CACHE_TIME);

            $totalRowCount = $totalRowCountQuery->getSingleScalarResult();
        } else {
            $totalRowCount = 0;
        }
        $r = $this->get('response_factory')->getJsonMysqlRowsResponse($products, $totalRowCount, self::GRID_CACHE_TIME);
        return $r;
    }

    public function searchAction(Request $request, $prodcatId, $order, $orderDir, $page, $perPage, $topOnly) {
        $cached = true;
        $brandsIds = $request->get('brandsIds');
        $searchQuery = $request->get('searchQuery');
        $maxNewPrice = (double) $request->get('maxNewPrice');
        $orderDir = (strtoupper($orderDir) === 'DESC' ? 'DESC' : 'ASC');
        switch ($order) {
            case "prodAddtime":
                $order = "p.prodAddtime";
                break;
            case "poRand":
                $order = "po.poRand";
                break;
            case "prodNewprice":
                $order = "p.prodNewprice";
                break;
            case "prodName":
                $order = "p.prodName";
                break;
            case "prodPercentage":
                $order = "p.prodPercentage";
                break;
            default:
                $order = "p.prodLastmodified";
        }
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_GRID_VIEW);
        $qb->innerJoin('p.prodPiCollection', 'pi');
        $qb->innerJoin('p.prodBrand', 'b');
        $qb->leftJoin('p.prodPo', 'po');
        $qb->innerJoin('p.prodProdcat', 'pc');
        $qb->setFirstResult(((int) $page - 1) * (int) $perPage);
        $qb->setMaxResults((int) $perPage);
        if ($prodcatId > 0) {
            $qb->andWhere('p.prodProdcat = :prodcatId');
            $qb->setParameter('prodcatId', (int) $prodcatId);
        }

        if ($brandsIds !== null) {
            $qb->andWhere('p.prodBrand IN (:brandsIds)');
            $brandsIds = explode(',', $brandsIds, self::MAX_BRANDS);
            $qb->setParameter('brandsIds', $brandsIds);
            $brCount = count($brandsIds);
            $maxBrCount = $this->get('common_data')->getBrandsCount();
            if ($brCount > 3 && $brCount < $maxBrCount - 3) {
                $cached&=false;
            }
        }

        if ($topOnly) {
            $qb->andWhere('p.prodPercentage > 0');
        }

        if ($maxNewPrice > 0) {
            $qb->andWhere('p.prodNewprice <= :maxNewPrice');
            $qb->setParameter('maxNewPrice', (double) $maxNewPrice);
        }

        if (floor($maxNewPrice) !== ceil($maxNewPrice)) {
            $cached&=false;
        }
        if (\mb_strlen($searchQuery) > 2) {
            // $searchQuery=preg_replace("/[^[:alnum:][:space:]]/u", '', $searchQuery);
            $searchQuery = preg_replace('/[^\p{L}\p{N}_]+/u', ' ', $searchQuery);
            $searchQuery = preg_replace('/[+\-><\(\)~*\"@]+/u', ' ', $searchQuery);
        }
        if (\mb_strlen($searchQuery) > 2) {
            $expl = explode(' ', $searchQuery, 5);
            $transliterator = new Transliterator(Settings::LANG_BG);
            $newSearchQuery = [];
            foreach ($expl as $word) {
                $newSearchQuery[] = $word;
                $toLatin = $transliterator->cyr2Lat($word);
                if ($toLatin !== $word) {
                    $newSearchQuery[] = $toLatin;
                }
                $toCyr = $transliterator->lat2Cyr($word);
                if ($toCyr !== $word) {
                    $newSearchQuery[] = $toCyr;
                }
            }

            $searchQuery = implode(' ', $newSearchQuery);
            $qb->addSelect("MATCH_AGAINST "
                    . "(p.prodName, p.prodDescr,p.prodKeywords, :searchQuery 'IN BOOLEAN MODE') as hidden score");
            $qb->andWhere("MATCH_AGAINST(p.prodName, p.prodDescr,p.prodKeywords, :searchQuery 'IN BOOLEAN MODE') > 0");
            $qb->setParameter('searchQuery', $searchQuery);
            $qb->orderBy('score', 'desc');
        }
        $qb->addOrderBy($order, $orderDir);
        $qry = $qb->getQuery();
        if ($cached) {
            $qry->setResultCacheId('products_search');
            $qry->setResultCacheLifetime(self::GRID_CACHE_TIME);
        }
        $qry->setHydrationMode(Query::HYDRATE_ARRAY);
        $paginator = new Paginator($qry);
        $products = $paginator->getIterator()->getArrayCopy();
        if (count($products) > 0 || $page > 1) {
            $qb->select('count(distinct p.prodId) as x');
            $qb->orderBy('x');
            $qb->setFirstResult(0);
            $qb->setMaxResults(1);
            $totalRowsQuery = $qb->getQuery();
            if ($cached) {
                $totalRowsQuery->setResultCacheId('products_search_total_rows');
                $totalRowsQuery->setResultCacheLifetime(self::GRID_CACHE_TIME);
            }
            $totalRowCount = $totalRowsQuery->getSingleScalarResult();
        } else {
            $totalRowCount = 0;
        }
        $r = $this->get('response_factory')->getJsonMysqlRowsResponse($products, $totalRowCount, self::GRID_CACHE_TIME,
                                                                      $cached ? ResponseFactory::publicCache : ResponseFactory::privateCache);
        return $r;
    }

}
