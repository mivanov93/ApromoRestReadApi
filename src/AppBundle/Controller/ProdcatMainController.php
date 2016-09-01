<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Prodcat;
use AppBundle\Entity\ProdcatMain;
use AppBundle\Entity\Products;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Transliterator\Settings;
use Transliterator\Transliterator;
use function mb_strlen;

class ProdcatMainController extends Controller {

    const PRODCAT_MAIN_FIELDS = 'partial mc.{pmId,pmName,pmDescr,pmLastmodified},'
            . 'partial prcat.{prodcatId,prodcatName,prodcatDescr,prodcatLastmodified}';
    const PRODCAT_FIELDS = 'partial pc.{prodcatId,prodcatName},'
            . 'partial pm.{pmId}';
    const COUNT_F = 'partial mc.{pmId},count(p.prodId)';
    const CACHE_TIME = 1000;

    public function prodcatMainSearchAction(Request $request, $topOnly, $promoOnly, $nameOnly) {
        $cached = true;
        $brandsIds = $request->get('brandsIds');
        $searchQuery = $request->get('searchQuery');
        $minNewPrice = (double) $request->get('minNewPrice');
        $maxNewPrice = (double) $request->get('maxNewPrice');

        $prodcatMainRepo = $this->getDoctrine()->getRepository(ProdcatMain::class);


        $prodcatRepo = $this->getDoctrine()->getRepository(Prodcat::class);
        /* @var $qb QueryBuilder */
        $qb = $prodcatRepo->createQueryBuilder('pc');
        $qb->select(self::PRODCAT_FIELDS . ',count(p.prodId) as pCount,'
                . 'sum(case when p.prodPercentage > 0 then 1 else 0 end) '
                . 'as pPromoCount');
        $qb->innerJoin(Products::class, 'p', Join::WITH, 'p.prodProdcat = pc.prodcatId');
        $qb->innerJoin('p.prodPiCollection', 'pi');
        $qb->innerJoin('pc.prodcatLinkage', 'pl');
        $qb->innerJoin('pc.prodcatPm', 'pm');
        $qb->groupBy('pc.prodcatId');
        $qb->indexBy('pc', 'pc.prodcatId');

        if ($brandsIds !== null) {
            $qb->andWhere('p.prodBrand IN (:brandsIds)');
            $brandsIds = explode(',', $brandsIds, ProductsController::MAX_BRANDS);
            $qb->setParameter('brandsIds', $brandsIds);
            $brCount = count($brandsIds);
            $maxBrCount = $this->get('common_data')->getBrandsCount();
            if ($brCount > 3 && $brCount < $maxBrCount - 3) {
                $cached&=false;
            }
        }
        if ($topOnly) {
            $qb->andWhere('p.prodTop = 1');
        }
        if ($promoOnly) {
            $qb->andWhere('p.prodPercentage > 0');
        }

        if ($maxNewPrice > 0) {
            $qb->andWhere('p.prodNewprice <= :maxNewPrice');
            $qb->setParameter('maxNewPrice', (double) $maxNewPrice);
        }

        if (floor($maxNewPrice) !== ceil($maxNewPrice)) {
            $cached&=false;
        }
        if ($minNewPrice > 0) {
            $qb->andWhere('p.prodNewprice >= :minNewPrice');
            $qb->setParameter('minNewPrice', (double) $minNewPrice);
        }

        if (floor($minNewPrice) !== ceil($minNewPrice)) {
            $cached&=false;
        }
        if (mb_strlen($searchQuery) > 2) {
            // $searchQuery=preg_replace("/[^[:alnum:][:space:]]/u", '', $searchQuery);
            $searchQuery = preg_replace('/[^\p{L}\p{N}_]+/u', ' ', $searchQuery);
            $searchQuery = preg_replace('/[+\-><\(\)~*\"@]+/u', ' ', $searchQuery);
        }
        if (mb_strlen($searchQuery) > 2) {
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
            if ($nameOnly) {
                $sFields = "p.prodName";
            } else {
                $sFields = "p.prodName, p.prodDescr,p.prodKeywords";
            }
            $searchQuery = implode(' ', $newSearchQuery);
            $qb->andWhere("MATCH_AGAINST({$sFields}, :searchQuery 'IN BOOLEAN MODE') > 0");
            $qb->setParameter('searchQuery', $searchQuery);
        }


        $qry = $qb->getQuery();
        $qry->setResultCacheId('prodcat_index');
        $qry->setResultCacheLifetime(self::CACHE_TIME);
        $prodcatList = $qry->getArrayResult();

        $qb2 = $prodcatMainRepo->createQueryBuilder('mc');
        $qb2->select(self::PRODCAT_MAIN_FIELDS);
        $qb2->innerJoin('mc.pmProdcatCollection', 'prcat');
        $qry2 = $qb2->getQuery();
        $qry2->setResultCacheId('prodcat_index');
        $qry2->setResultCacheLifetime(self::CACHE_TIME);
        $prodcatList2 = $qry2->getArrayResult();

        foreach ($prodcatList as $prodcat) {
            foreach ($prodcatList2 as &$prodcatMain) {
                if ($prodcatMain['pmId'] == $prodcat['0']['prodcatPm']['pmId']) {
                    if (!isset($prodcatMain['virtual'])) {
                        $prodcatMain['virtual'] = ["prodCount" => 0, "promoProdCount" => 0];
                    }
                    $prodcatMain['virtual']['prodCount']+=$prodcat['pCount'];
                    $prodcatMain['virtual']['promoProdCount']+=$prodcat['pPromoCount'];
                    foreach ($prodcatMain['pmProdcatCollection'] as &$innerProdcat) {
                        if ($innerProdcat['prodcatId'] == $prodcat[0]['prodcatId']) {
                            $innerProdcat['virtual'] = ["prodCount" => $prodcat['pCount'], "promoProdCount" => $prodcat['pPromoCount']];
                        }
                    }
                    unset($innerProdcat);
                }
                unset($prodcatMain);
            }
        }

        foreach ($prodcatList2 as &$prodcatMain) {
            if (!isset($prodcatMain['virtual'])) {
                $prodcatMain['virtual'] = ["prodCount" => 0, "promoProdCount" => 0];
            }
            foreach ($prodcatMain['pmProdcatCollection'] as &$innerProdcat) {
                if (!isset($innerProdcat['virtual'])) {
                    $innerProdcat['virtual'] = ["prodCount" => 0, "promoProdCount" => 0];
                }
                unset($innerProdcat);
            }
            unset($prodcatMain);
        }

        $jsonResponseFactory = $this->get('response_factory');
        $r = $jsonResponseFactory->getJsonMysqlRowsResponse($prodcatList2, count($prodcatList2), self::CACHE_TIME);
        return $r;
    }

}
