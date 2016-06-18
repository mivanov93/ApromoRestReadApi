<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cities;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CitiesController extends Controller {

    const CITIES_FIELDS = 'partial c.{cityId,cityName,cityLatitude}';
    const CACHE_TIME = 1000;

    public function indexAction() {
        $brandsRepo = $this->getDoctrine()->getRepository(Cities::class);
        $qb = $brandsRepo->createQueryBuilder('c');
        $qb->select(self::CITIES_FIELDS);
        $qry = $qb->getQuery();
        $qry->setResultCacheId('cities_index');
        $qry->setResultCacheLifetime(self::CACHE_TIME);
        $brandList = $qry->getArrayResult();
        $jsonResponseFactory = $this->get('response_factory');
        $r = $jsonResponseFactory->getJsonResponse($brandList, self::CACHE_TIME);
        return $r;
    }

}
