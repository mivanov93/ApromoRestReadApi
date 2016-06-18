<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Brands;
use AppBundle\Entity\Products;
use AppBundle\Utils\ResponseFactory;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductsController extends Controller {

    const PROD_GRID_VIEW = 'partial b.{brandId,brandName},'
            . 'partial p.{prodId,prodName,prodNewprice,prodOldprice,prodExptime},'
            . 'partial pi.{piId}';
    const PROD_DETAILS_VIEW = 'partial b.{brandId,brandName,brandUrl},'
            . 'partial p.{prodId,prodName,prodDescr,prodUrl,'
            . 'prodDeliveryTime,prodDeliveryCost,prodManufacturer,'
            . 'prodNewprice,prodOldprice,prodExptime},'
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

    public function detailsAction($prodId) {
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
        $qry->setResultCacheLifetime(self::DETAILS_QUERY_CACHE_TIME);

        $prod = $qry->getOneOrNullResult(Query::HYDRATE_ARRAY);
        $r = $this->get('response_factory')->getJsonResponse($prod, self::DETAILS_QUERY_CACHE_TIME);
        return $r;
    }

    public function byTopAction($limit, $prodcatId = null) {
        /* @var $repo \Doctrine\ORM\Repository */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_GRID_VIEW);
        $qb->addSelect(' rand() as HIDDEN r');
        $qb->join('p.prodPiCollection', 'pi');
        $qb->join('p.prodBrand', 'b');
        $qb->groupBy('p.prodBrand');
        $qb->setMaxResults((int) $limit);
        $qb->orderBy('r');
        if ($prodcatId > 0) {
            $qb->andWhere('p.prodProdcat = :pcatId');
            $qb->setParameter('pcatId', (int) $prodcatId);
        }
        $qry = $qb->getQuery();
        $qry->setResultCacheId('cached_top');
        $qry->setResultCacheLifetime(self::TOP_QUERY_CACHE_TIME);

        $res = $qry->getArrayResult();
        $r = $this->get('response_factory')->getJsonResponse($res, self::TOP_QUERY_CACHE_TIME);
        return $r;
    }

    public function byBrandAction($brandId, $page, $perPage) {
        /* @var $repo \Doctrine\ORM\Repository */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_GRID_VIEW);
        $qb->join('p.prodPiCollection', 'pi');
        $qb->join('p.prodBrand', 'b');
        $qb->setFirstResult(((int) $page - 1) * (int) $perPage);
        $qb->setMaxResults((int) $perPage);
        $qb->andWhere('p.prodBrand = :brandId');
        $qb->setParameter('brandId', (int) $brandId);

        $qry = $qb->getQuery();
        $qry->setResultCacheId('products_by_brand');
        $qry->setResultCacheLifetime(self::GRID_CACHE_TIME);
        $qry->setHydrationMode(Query::HYDRATE_ARRAY);
        $paginator = new Paginator($qry);
        $res = $paginator->getIterator()->getArrayCopy();

        $r = $this->get('response_factory')->getHtmlMockResponse($res, self::GRID_CACHE_TIME);
        return $r;
    }

    public function byProdcatAction($prodcatId, $page, $perPage) {
        /* @var $repo \Doctrine\ORM\Repository */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_GRID_VIEW);
        $qb->join('p.prodPiCollection', 'pi');
        $qb->join('p.prodBrand', 'b');
        $qb->setFirstResult(((int) $page - 1) * (int) $perPage);
        $qb->setMaxResults((int) $perPage);
        $qb->andWhere('p.prodProdcat = :prodcatId');
        $qb->setParameter('prodcatId', (int) $prodcatId);

        $qry = $qb->getQuery();
        $qry->setResultCacheId('products_by_category');
        $qry->setResultCacheLifetime(self::GRID_CACHE_TIME);
        $qry->setHydrationMode(Query::HYDRATE_ARRAY);
        $paginator = new Paginator($qry);
        $res = $paginator->getIterator()->getArrayCopy();

        $r = $this->get('response_factory')->getHtmlMockResponse($res, self::GRID_CACHE_TIME);
        return $r;
    }

    public function searchAction(Request $request, $prodcatId, $order, $orderDir, $page, $perPage) {
        $cached = true;
        $brandsIds = $request->get('brandsIds');
        $searchQuery = $request->get('searchQuery');
        $maxPrice = (double) $request->get('maxPrice');
        $orderDir = ($orderDir === 'ASC' ? 'ASC' : 'DESC');
        switch ($order) {
            case "newprice":
                $order = "p.prodNewprice";
                break;
            case "added":
                $order = "p.prodNewprice";
                break;
            case "discount":
                $order = "p.prodPercentage";
                break;
            default:
                $order = "p.prodLastmodified";
        }
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_GRID_VIEW);
        $qb->join('p.prodPiCollection', 'pi');
        $qb->join('p.prodBrand', 'b');
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

        if ($searchQuery !== null || floor($maxPrice) !== ceil($maxPrice)) {
            $cached&=false;
        }
        if (\mb_strlen($searchQuery) > 2) {
            $qb->addSelect("MATCH_AGAINST "
                    . "(p.prodName, p.prodDescr, :searchQuery 'IN BOOLEAN MODE') as hidden score");
            $qb->andWhere("MATCH_AGAINST(p.prodName, p.prodDescr, :searchQuery 'IN BOOLEAN MODE') > 0");
            $qb->setParameter('searchQuery', $searchQuery);
            $qb->orderBy('score', 'desc');
        }
        $qb->addOrderBy($order, $orderDir);
        $qry = $qb->getQuery();
    //    echo $qry->getDQL();
        if ($cached) {
            $qry->setResultCacheId('products_by_category');
            $qry->setResultCacheLifetime(self::GRID_CACHE_TIME);
        }
        $qry->setHydrationMode(Query::HYDRATE_ARRAY);
        $paginator = new Paginator($qry);
        $products = $paginator->getIterator()->getArrayCopy();
        $qb->select('count(distinct p.prodId) as x');
        $qb->orderBy('x');
        $qb->setFirstResult(0);
        $qb->setMaxResults(1);
        $totalQry = $qb->getQuery();
        if ($cached) {
            $totalQry->setResultCacheId('products_by_category');
            $totalQry->setResultCacheLifetime(self::GRID_CACHE_TIME);
        }
        $total = $totalQry->getSingleScalarResult();
        $res = ["rows" => $products, "total" => $total];
        $r = $this->get('response_factory')->getHtmlMockResponse($res, self::GRID_CACHE_TIME, ResponseFactory::privateCache);
        return $r;
    }

}
