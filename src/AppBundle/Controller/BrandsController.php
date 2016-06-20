<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Brands;
use Doctrine\ORM\Query;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BrandsController extends Controller {

    const BRAND_FIELDS = 'partial b.{brandName,brandId,brandPrcount,brandShopcount}';
    const BRAND_DETAILS_FIELDS = 'partial b.{brandName,brandId,brandPrcount,brandShopcount,brandUrl,brandDescr}';
    const CACHE_TIME = 1000;

    public function indexAction() {
        $brandsRepo = $this->getDoctrine()->getRepository(Brands::class);
        $qb = $brandsRepo->createQueryBuilder('b');
        $qb->select(self::BRAND_FIELDS);
        $qry = $qb->getQuery();
        $qry->setResultCacheId('brands_index');
        $qry->setResultCacheLifetime(self::CACHE_TIME);
        $brandList = $qry->getArrayResult();
        $jsonResponseFactory = $this->get('response_factory');
        $r = $jsonResponseFactory->getJsonMysqlRowsResponse($brandList, count($brandList), self::CACHE_TIME);
        return $r;
    }

    public function detailsAction($brandId) {
        $brandsRepo = $this->getDoctrine()->getRepository(Brands::class);
        $qb = $brandsRepo->createQueryBuilder('b');
        $qb->select(self::BRAND_DETAILS_FIELDS);
        $qb->where('b.brandId = :brandId');
        $qb->setParameter('brandId', (int) $brandId);
        $qry = $qb->getQuery();
        $qry->setResultCacheId('brands_details');
        $qry->setResultCacheLifetime(self::CACHE_TIME);
        $brandDetails = $qry->getOneOrNullResult(Query::HYDRATE_ARRAY);
        $jsonResponseFactory = $this->get('response_factory');
        $r = $jsonResponseFactory->getJsonMysqlRowsResponse($brandDetails, $brandDetails ? 1 : 0, self::CACHE_TIME);

        return $r;
    }

}
