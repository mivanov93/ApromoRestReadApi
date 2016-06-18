<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Prodcat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProdcatController extends Controller {

    const PRODCAT_FIELDS = 'partial pc.{prodcatId,prodcatName,prodcatDescr}';
    const CACHE_TIME = 1000;

    public function indexAction() {
        $brandsRepo = $this->getDoctrine()->getRepository(Prodcat::class);
        $qb = $brandsRepo->createQueryBuilder('pc');
        $qb->select(self::PRODCAT_FIELDS);
        $qry = $qb->getQuery();
        $qry->setResultCacheId('prodcat_index');
        $qry->setResultCacheLifetime(self::CACHE_TIME);
        $brandList = $qry->getArrayResult();
        $jsonResponseFactory = $this->get('response_factory');
        $r = $jsonResponseFactory->getJsonResponse($brandList, self::CACHE_TIME);
        return $r;
    }

}
