<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Prodcat;
use AppBundle\Entity\Products;
use AppBundle\Utils\ResponseFactory;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Transliterator\Settings;
use Transliterator\Transliterator;
use function mb_strlen;

class ProdcatController extends Controller {

    const PRODCAT_FIELDS = 'partial pc.{prodcatId,prodcatName,prodcatDescr,prodcatLastmodified},partial pl.{plProdcat,plLastmodified,plPrcount,plIndirPrcount}';
    const CACHE_TIME = 1000;

    public function getAllProdcats() {
        $prodcatRepo = $this->getDoctrine()->getRepository(Prodcat::class);
        $qb = $prodcatRepo->createQueryBuilder('pc');
        $qb->select(self::PRODCAT_FIELDS);
        $qb->innerJoin('pc.prodcatLinkage', 'pl');
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

    public function getPromoCount($brandsIds, $topOnly, $maxNewPrice, $searchQuery) {
        $totalFound = 0;
        $repo = $this->getDoctrine()->getRepository(Prodcat::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('pc');
        $qb->select(self::PRODCAT_FIELDS . ',count(p.prodId) as pCount');
        $qb->innerJoin(Products::class, 'p', Query\Expr\Join::WITH, 'p.prodProdcat = pc.prodcatId');
        $qb->innerJoin('p.prodPiCollection', 'pi');
        $qb->innerJoin('pc.prodcatLinkage', 'pl');
        $qb->groupBy('pc.prodcatId');

        if ($brandsIds !== null) {
            $qb->andWhere('p.prodBrand IN (:brandsIds)');
            $brandsIds = explode(',', $brandsIds, ProductsController::MAX_BRANDS);
            $qb->setParameter('brandsIds', $brandsIds);
            $brCount = count($brandsIds);
            $maxBrCount = $this->get('common_data')->getBrandsCount();
            if ($brCount > 3 && $brCount < $maxBrCount - 3) {
                $cached&=false;
            }
        }
        $qb->andWhere('p.prodPercentage > 0');
        if ($topOnly) {
            $qb->andWhere('p.prodTop > 0');
        }
        if ($maxNewPrice > 0) {
            $qb->andWhere('p.prodNewprice <= :maxNewPrice');
            $qb->setParameter('maxNewPrice', (double) $maxNewPrice);
        }

        if (floor($maxNewPrice) !== ceil($maxNewPrice)) {
            $cached&=false;
        }
        if (mb_strlen($searchQuery) > 2) {
            // $searchQuery=preg_replace("/[^[:alnum:][:space:]]/u", '', $searchQuery);
            $searchQuery = preg_replace('/[^\p{L}\p{N}_]+/u', ' ', $searchQuery);
            $searchQuery = preg_replace('/[+\-><\(\)~*\"@]+/u', ' ', $searchQuery);
        }
        if (mb_strlen($searchQuery) > 2) {
            $expl = explode(' ', $searchQuery, 5);
            $transliterator = new Transliterator(Settings::LANG_BG);
            $newSearchQuery = [];
            foreach ($expl as $word) {
                $newSearchQuery[] = $word;
                $toLatin = $transliterator->cyr2Lat($word);
                if ($toLatin !== $word) {
                    $newSearchQuery[] = $toLatin;
                }
                $toCyr = $transliterator->lat2Cyr($word);
                if ($toCyr !== $word) {
                    $newSearchQuery[] = $toCyr;
                }
            }

            $searchQuery = implode(' ', $newSearchQuery);
            $qb->andWhere("MATCH_AGAINST(p.prodName, p.prodDescr,p.prodKeywords, :searchQuery 'IN BOOLEAN MODE') > 0");
            $qb->setParameter('searchQuery', $searchQuery);
        }

        $qry = $qb->getQuery();
        // echo $qry->getDQL();
        if (true) {
            $qry->setResultCacheId('prodcat_promo_products_search');
            $qry->setResultCacheLifetime(self::CACHE_TIME);
        }
        $foundProdcats = $qry->getArrayResult();

        $prodcats = [];
        foreach ($foundProdcats as &$prodcat) {
            $pCount = $prodcat['pCount'];
            $totalFound +=$pCount;
            $prodcats[$prodcat[0]['prodcatId']] = $pCount;
        }
        return ['prodcats' => $prodcats, 'totalFound' => $totalFound];
    }

    public function indexByProdSearchAction(Request $request, $topOnly) {
        $cached = true;
        $brandsIds = $request->get('brandsIds');
        $searchQuery = $request->get('searchQuery');
        $maxNewPrice = (double) $request->get('maxNewPrice');
        $totalFound = 0;
        $searching = false;
        if ($brandsIds !== null || $searchQuery !== null || $maxNewPrice > 0 || $topOnly) {
            $searching = true;

            $repo = $this->getDoctrine()->getRepository(Prodcat::class);
            /* @var $qb QueryBuilder */
            $qb = $repo->createQueryBuilder('pc');
            $qb->select(self::PRODCAT_FIELDS . ',count(p.prodId) as pCount');
            $qb->innerJoin(Products::class, 'p', Query\Expr\Join::WITH, 'p.prodProdcat = pc.prodcatId');
            $qb->innerJoin('p.prodPiCollection', 'pi');
            $qb->innerJoin('pc.prodcatLinkage', 'pl');
            $qb->groupBy('pc.prodcatId');

            if ($brandsIds !== null) {
                $qb->andWhere('p.prodBrand IN (:brandsIds)');
                $brandsIds = explode(',', $brandsIds, ProductsController::MAX_BRANDS);
                $qb->setParameter('brandsIds', $brandsIds);
                $brCount = count($brandsIds);
                $maxBrCount = $this->get('common_data')->getBrandsCount();
                if ($brCount > 3 && $brCount < $maxBrCount - 3) {
                    $cached&=false;
                }
            }
            if ($topOnly) {
                $qb->andWhere('p.prodTop > 0');
            }
            if ($maxNewPrice > 0) {
                $qb->andWhere('p.prodNewprice <= :maxNewPrice');
                $qb->setParameter('maxNewPrice', (double) $maxNewPrice);
            }

            if (floor($maxNewPrice) !== ceil($maxNewPrice)) {
                $cached&=false;
            }
            if (mb_strlen($searchQuery) > 2) {
                // $searchQuery=preg_replace("/[^[:alnum:][:space:]]/u", '', $searchQuery);
                $searchQuery = preg_replace('/[^\p{L}\p{N}_]+/u', ' ', $searchQuery);
                $searchQuery = preg_replace('/[+\-><\(\)~*\"@]+/u', ' ', $searchQuery);
            }
            if (mb_strlen($searchQuery) > 2) {
                $expl = explode(' ', $searchQuery, 5);
                $transliterator = new Transliterator(Settings::LANG_BG);
                $newSearchQuery = [];
                foreach ($expl as $word) {
                    $newSearchQuery[] = $word;
                    $toLatin = $transliterator->cyr2Lat($word);
                    if ($toLatin !== $word) {
                        $newSearchQuery[] = $toLatin;
                    }
                    $toCyr = $transliterator->lat2Cyr($word);
                    if ($toCyr !== $word) {
                        $newSearchQuery[] = $toCyr;
                    }
                }

                $searchQuery = implode(' ', $newSearchQuery);
                $qb->andWhere("MATCH_AGAINST(p.prodName, p.prodDescr,p.prodKeywords, :searchQuery 'IN BOOLEAN MODE') > 0");
                $qb->setParameter('searchQuery', $searchQuery);
            }

            $qry = $qb->getQuery();
            // echo $qry->getDQL();
            if ($cached) {
                $qry->setResultCacheId('prodcat_products_search');
                $qry->setResultCacheLifetime(self::CACHE_TIME);
            }
            $prodcats = $qry->getArrayResult();

            $in = [];
            foreach ($prodcats as &$prodcat) {
                $pCount = $prodcat['pCount'];
                $totalFound +=$pCount;
                $prodcat = $prodcat[0];
                $in[$prodcat['prodcatId']] = &$prodcat;
                $prodcat['virtual'] = ['prodCount' => (int) $pCount];
            }
            unset($prodcat);
        } else {
            $in = [];
            $prodcats = [];
        }
        $allProdcats = $this->getAllProdcats();
        $promoProdcatData = $this->getPromoCount($brandsIds, $topOnly, $maxNewPrice, $searchQuery);
        $promoProdcats = $promoProdcatData['prodcats'];
        $totalPromos = $promoProdcatData['totalFound'];

        foreach ($allProdcats as $prodcat) {
            if (!$searching) {
                $prodCount = $prodcat['prodcatLinkage']['plPrcount'] +
                        $prodcat['prodcatLinkage']['plIndirPrcount'];
                $promoProdCount = isset($promoProdcats[$prodcat['prodcatId']]) ? (int) $promoProdcats[$prodcat['prodcatId']] : 0;
                $promoProdCount = $prodcat['prodcatId'] == 0 ? $totalPromos : $promoProdCount;
                $prodcat['virtual'] = ['prodCount' => $prodCount,
                    'promoProdCount' => $promoProdCount];

                $prodcats[] = $prodcat;
            } else {
                if (isset($in[$prodcat['prodcatId']])) {
                    $prodcat = &$in[$prodcat['prodcatId']];
                    $promoProdCount = isset($promoProdcats[$prodcat['prodcatId']]) ? (int) $promoProdcats[$prodcat['prodcatId']] : 0;
                    $promoProdCount = $prodcat['prodcatId'] == 0 ? $totalPromos : $promoProdCount;
                    $prodcat['virtual']['promoProdCount'] = $promoProdCount;
                } else {
                    $prodcat['virtual'] = ['prodCount' => 0,
                        'promoProdCount' => 0];
                    $prodcats[] = $prodcat;
                }
            }
            unset($prodcat);
        }
        $r = $this->get('response_factory')->getJsonMysqlRowsResponse($prodcats, count($prodcats), self::CACHE_TIME,
                                                                                       $cached ? ResponseFactory::publicCache : ResponseFactory::privateCache);
        return $r;
    }

}
