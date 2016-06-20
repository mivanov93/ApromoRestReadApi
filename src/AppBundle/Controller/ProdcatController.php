<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Prodcat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

}
