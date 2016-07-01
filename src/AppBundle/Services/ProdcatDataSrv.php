<?php

namespace AppBundle\Services;

use AppBundle\Entity\Prodcat;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

class ProdcatDataSrv {

    const PRODCAT_FIELDS = 'partial pc.{prodcatId,prodcatName,prodcatDescr,prodcatLastmodified},partial pl.{plProdcat,plLastmodified,plPrcount,plIndirPrcount}';
    const CACHE_TIME = 1000;

    private $doctrineRegistry;

    public function __construct(Registry $doctrineRegistry) {

        $this->doctrineRegistry = $doctrineRegistry;
    }

    public function getProdcatDetailsById($prodcatId, $cacheTime = self::CACHE_TIME) {
        /* @var $repo \Doctrine\ORM\Repository */
        $repo = $this->doctrineRegistry->getRepository(Prodcat::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('pc');
        $qb->select(self::PRODCAT_FIELDS);
        $qb->innerJoin('pc.prodcatLinkage', 'pl');
        $qb->where('pc.prodcatId = :prodcatId');
        $qb->setParameter('prodcatId', (int) $prodcatId);
        $qry = $qb->getQuery();

        $qry->setResultCacheId('prodcat_details');
        $qry->setResultCacheLifetime($cacheTime);

        $prod = $qry->getOneOrNullResult(Query::HYDRATE_ARRAY);
        return $prod;
    }

}
