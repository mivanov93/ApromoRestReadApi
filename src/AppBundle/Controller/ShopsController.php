<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Shops;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShopsController extends Controller {

    const SHOPS_FIELDS = 'partial s.{shopId,shopName}';
    const CACHE_TIME = 1000;

    public function indexAction() {
        $brandsRepo = $this->getDoctrine()->getRepository(Shops::class);
        $qb = $brandsRepo->createQueryBuilder('s');
        $qb->select(self::SHOPS_FIELDS);
        $qry = $qb->getQuery();
        $qry->setResultCacheId('shops_index');
        $qry->setResultCacheLifetime(self::CACHE_TIME);
        $shopList = $qry->getArrayResult();
        $jsonResponseFactory = $this->get('response_factory');
        $r = $jsonResponseFactory->getJsonResponse($shopList, self::CACHE_TIME);
        return $r;
    }

    public function byCityBrandAction($cityId, $brandId) {
        $brandsRepo = $this->getDoctrine()->getRepository(Shops::class);
        $qb = $brandsRepo->createQueryBuilder('s');
        $qb->select(self::SHOPS_FIELDS);
        $qb->where('s.shopCity = :cityId');
        $qb->setParameter('cityId', (int) $cityId);
        if ($brandId > 0) {
            $qb->andWhere('s.shopBrand = :brandId');
            $qb->setParameter('brandId', (int) $brandId);
        }
        $qry = $qb->getQuery();
        $qry->setResultCacheId('shops_by_city');
        $qry->setResultCacheLifetime(self::CACHE_TIME);
        $brandList = $qry->getArrayResult();
        $jsonResponseFactory = $this->get('response_factory');
        $r = $jsonResponseFactory->getJsonResponse($brandList, self::CACHE_TIME);
        return $r;
    }

}
