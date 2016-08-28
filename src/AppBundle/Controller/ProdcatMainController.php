<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ProdcatMain;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProdcatMainController extends Controller {

    const PRODCAT_FIELDS = 'partial mc.{pmId,pmName,pmDescr,pmLastmodified},partial prcat.{prodcatId,prodcatName,prodcatDescr,prodcatLastmodified}';
    const CACHE_TIME = 1000;

    public function getAllProdcats() {
        $prodcatRepo = $this->getDoctrine()->getRepository(ProdcatMain::class);
        $qb = $prodcatRepo->createQueryBuilder('mc');
        $qb->select(self::PRODCAT_FIELDS);
        $qb->innerJoin('mc.pmProdcatCollection', 'prcat');
        $qry = $qb->getQuery();
        $qry->setResultCacheId('prodcat_index');
        $qry->setResultCacheLifetime(self::CACHE_TIME);
        $prodcatList = $qry->getArrayResult();
        return $prodcatList;
    }

    public function indexAction() {
        $prodcatList = $this->getAllProdcats();
        $jsonResponseFactory = $this->get('response_factory');
        $r = $jsonResponseFactory->getJsonMysqlRowsResponse($prodcatList, count($prodcatList), self::CACHE_TIME);
        return $r;
    }

}
