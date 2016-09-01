<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Prodcat;
use AppBundle\Entity\ProdcatMain;
use AppBundle\Entity\Products;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProdcatMainController extends Controller {

    const PRODCAT_MAIN_FIELDS = 'partial mc.{pmId,pmName,pmDescr,pmLastmodified},'
            . 'partial prcat.{prodcatId,prodcatName,prodcatDescr,prodcatLastmodified}';
    const PRODCAT_FIELDS = 'partial pc.{prodcatId,prodcatName},'
            . 'partial pm.{pmId}';
    const COUNT_F = 'partial mc.{pmId},count(p.prodId)';
    const CACHE_TIME = 1000;

    public function getAllProdcats() {
        $prodcatMainRepo = $this->getDoctrine()->getRepository(ProdcatMain::class);
//        $qb = $prodcatRepo->createQueryBuilder('mc');
//        $qb->select(self::COUNT_F);
//        $qb->innerJoin('mc.pmProdcatCollection', 'prcat');
//        $qb->innerJoin(Products::class, "p", Join::WITH, "p.prodProdcat = prcat.prodcatId");
//        $qb->innerJoin('p.prodPiCollection', 'pi');
//        $qb->groupBy("mc.pmId");
//        $qb->indexBy('mc', 'mc.pmId');
//        $qry = $qb->getQuery();
//        $qry->setResultCacheId('prodcat_index');
//        $qry->setResultCacheLifetime(self::CACHE_TIME);
//        $prodcatList = $qry->getArrayResult();


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

        return $prodcatList2;
    }

    public function indexAction() {
        $prodcatList = $this->getAllProdcats();
        $jsonResponseFactory = $this->get('response_factory');
        $r = $jsonResponseFactory->getJsonMysqlRowsResponse($prodcatList, count($prodcatList), self::CACHE_TIME);
        return $r;
    }

}
