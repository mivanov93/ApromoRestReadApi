<?php

namespace AppBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Proxies\__CG__\AppBundle\Entity\Products;

class ProductsDataSrv {

    const PROD_DETAILS_VIEW = 'partial b.{brandId,brandName,brandLastmodified,brandUrl},'
            . 'partial p.{prodId,prodName,prodDescr,prodUrl,'
            . 'prodDeliveryTime,prodDeliveryCost,prodManufacturer,'
            . 'prodNewprice,prodOldprice,prodPercentage,prodExptime,prodLastmodified},'
            . 'partial pc.{prodcatId,prodcatName},'
            . 'partial pi.{piId}';
    const DETAILS_QUERY_CACHE_TIME = 1000;

    private $doctrineRegistry;

    public function __construct(Registry $doctrineRegistry) {

        $this->doctrineRegistry = $doctrineRegistry;
    }

    public function getProductDetailsById($prodId, $cacheTime = self::DETAILS_QUERY_CACHE_TIME) {
        /* @var $repo \Doctrine\ORM\Repository */
          $repo = $this->doctrineRegistry->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_DETAILS_VIEW);
        $qb->innerJoin('p.prodBrand', 'b');
        $qb->join('p.prodPiCollection', 'pi');
        $qb->innerJoin('p.prodProdcat', 'pc');
        $qb->where('p.prodId = :prodId');
        $qb->setParameter('prodId', (int) $prodId);
        $qry = $qb->getQuery();

        $qry->setResultCacheId('prod_details');
        $qry->setResultCacheLifetime($cacheTime);

        $prod = $qry->getOneOrNullResult(Query::HYDRATE_ARRAY);
        return $prod;
    }

}
