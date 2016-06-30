<?php

namespace AppBundle\Services;

use AppBundle\Entity\Brands;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\Query;

class BrandsDataSrv {

    const BRAND_DETAILS_FIELDS = 'partial b.{brandName,brandId,brandPrcount,brandShopcount,brandUrl,brandDescr}';
    const CACHE_TIME = 1000;

    private $doctrineRegistry;

    public function __construct(Registry $doctrineRegistry) {

        $this->doctrineRegistry = $doctrineRegistry;
    }

    public function getAllBrands() {
        
    }

    public function getBrandDetailsById($brandId, $cacheTime = self::CACHE_TIME) {
        $brandsRepo = $this->doctrineRegistry->getRepository(Brands::class);
        $qb = $brandsRepo->createQueryBuilder('b');
        $qb->select(self::BRAND_DETAILS_FIELDS);
        $qb->where('b.brandId = :brandId');
        $qb->setParameter('brandId', (int) $brandId);
        $qry = $qb->getQuery();
        $qry->setResultCacheId('brands_details');
        $qry->setResultCacheLifetime($cacheTime);
        $brandDetails = $qry->getOneOrNullResult(Query::HYDRATE_ARRAY);
        return $brandDetails;
    }

}
