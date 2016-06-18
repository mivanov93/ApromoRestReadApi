<?php

namespace AppBundle\Utils;

use AppBundle\Entity\Brands;
use Doctrine\Bundle\DoctrineBundle\Registry;

/**
 * Description of CommonData
 *
 * @author x0r
 */
class CommonData {

    const CACHE_TIME = 1000;

    /**
     * @var Registry
     */
    private $doctrineRegistry;

    public function __construct(Registry $doctrineRegistry) {

        $this->doctrineRegistry = $doctrineRegistry;
    }

    public function getBrandsCount() {
        return $this->doctrineRegistry->getRepository(Brands::class)->createQueryBuilder('b')->select('count(b.brandId)')
                        ->getQuery()->setResultCacheId('brands_count')->setResultCacheLifetime(self::CACHE_TIME)
                        ->getSingleScalarResult();
    }

}
