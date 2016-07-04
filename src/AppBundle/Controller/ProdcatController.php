<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Prodcat;
use AppBundle\Entity\Products;
use AppBundle\Utils\ResponseFactory;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Transliterator\Settings;
use Transliterator\Transliterator;
use function mb_strlen;

class ProdcatController extends Controller {

    const PRODCAT_FIELDS = 'partial pc.{prodcatId,prodcatName,prodcatDescr,prodcatLastmodified},partial pl.{plProdcat,plLastmodified,plPrcount,plIndirPrcount}';
    const CACHE_TIME = 1000;

    public function indexAction() {
        $brandsRepo = $this->getDoctrine()->getRepository(Prodcat::class);
        $qb = $brandsRepo->createQueryBuilder('pc');
        $qb->select(self::PRODCAT_FIELDS);
        $qb->innerJoin('pc.prodcatLinkage', 'pl');
        $qry = $qb->getQuery();
        $qry->setResultCacheId('prodcat_index');
        $qry->setResultCacheLifetime(self::CACHE_TIME);
        $prodcatList = $qry->getArrayResult();
        $jsonResponseFactory = $this->get('response_factory');
        $r = $jsonResponseFactory->getJsonMysqlRowsResponse($prodcatList, count($prodcatList), self::CACHE_TIME);
        return $r;
    }

    public function indexByProdSearchAction(Request $request) {
        $cached = true;
        $brandsIds = $request->get('brandsIds');
        $searchQuery = $request->get('searchQuery');
        $maxNewPrice = (double) $request->get('maxNewPrice');
        $repo = $this->getDoctrine()->getRepository(Prodcat::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('pc');
        $qb->select(self::PRODCAT_FIELDS . ',count(p.prodId) as pCount');
        $qb->leftJoin(Products::class, 'p', Query\Expr\Join::WITH, 'p.prodProdcat = pc.prodcatId');
        $qb->leftJoin('p.prodPiCollection', 'pi');
        $qb->innerJoin('pc.prodcatLinkage', 'pl');
        $qb->groupBy('pc.prodcatId');


        $andWhere = 'p.prodId is null or (pi.piId is not null';
        $params = [];

        if ($brandsIds !== null) {
            $andWhere.=' and p.prodBrand IN (:brandsIds) ';
            $brandsIds = explode(',', $brandsIds, ProductsController::MAX_BRANDS);
            $params['brandsIds'] = $brandsIds;
            $brCount = count($brandsIds);
            $maxBrCount = $this->get('common_data')->getBrandsCount();
            if ($brCount > 3 && $brCount < $maxBrCount - 3) {
                $cached&=false;
            }
        }
        if ($maxNewPrice > 0) {
            $andWhere.=' and p.prodNewprice <= :maxNewPrice ';
            $params['maxNewPrice'] = (double) $maxNewPrice;
        }

        if (floor($maxNewPrice) !== ceil($maxNewPrice)) {
            $cached&=false;
        }
        if (mb_strlen($searchQuery) > 3) {
            // $searchQuery=preg_replace("/[^[:alnum:][:space:]]/u", '', $searchQuery);
            $searchQuery = preg_replace('/[^\p{L}\p{N}_]+/u', ' ', $searchQuery);
            $searchQuery = preg_replace('/[+\-><\(\)~*\"@]+/u', ' ', $searchQuery);
        }
        if (mb_strlen($searchQuery) > 3) {
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
            $andWhere.=" and MATCH_AGAINST(p.prodName, p.prodDescr,p.prodKeywords, :searchQuery 'IN BOOLEAN MODE') > 0 ";
            $params['searchQuery'] = $searchQuery;
        }
        foreach($params as $key=>$param) {
            $qb->setParameter($key, $param);
        }
        $andWhere.=')';
        $qb->andWhere($andWhere);
//        else {
//            $qb->andWhere('p.prodId is null or pi.piId is not null');
//        }

        $qry = $qb->getQuery();
        if ($cached) {
            $qry->setResultCacheId('products_search');
            $qry->setResultCacheLifetime(self::CACHE_TIME);
        }
        $prodcats = $qry->getArrayResult();
        foreach($prodcats as &$prodcat) {
            $pCount=$prodcat['pCount'];
            $prodcat=$prodcat[0];
            $prodcat['virtual']=['prodCount'=>$pCount];
        }
        $r = $this->get('response_factory')->getJsonMysqlRowsResponse($prodcats, count($prodcats), self::CACHE_TIME,
                                                                                       $cached ? ResponseFactory::publicCache : ResponseFactory::privateCache);
        return $r;
    }

}
