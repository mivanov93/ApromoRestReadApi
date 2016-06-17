<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Products;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller {

    const PROD_GRID_VIEW = 'partial b.{brandId,brandName},'
            . 'partial p.{prodId,prodName,prodNewprice,prodOldprice,prodExptime},'
            . 'partial pi.{piId}';
    const PROD_DETAILS_VIEW = 'partial b.{brandId,brandName,brandUrl},'
            . 'partial p.{prodId,prodName,prodDescr,prodUrl,'
            . 'prodDeliveryTime,prodDeliveryCost,prodManufacturer,'
            . 'prodNewprice,prodOldprice,prodExptime},'
            . 'partial pc.{prodcatId,prodcatName},'
            . 'partial pi.{piId}';
    const JSON_OPTS = JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;

//    private $lastModified;
//
//    public function __construct() {
//        $conn = $this->getDoctrine()->getConnection();
//        $query = "SELECT prod_lastmodified FROM products ORDER BY prod_lastmodified DESC LIMIT 1";
//        $qcp = new QueryCacheProfile(1, "last_modified");
//        $stmt = $conn->executeCacheQuery($query);
//        $this->lastModified = $stmt->fetchColumn();
//    }

    public function detailsAction($prodId) {
        /* @var $em EntityManager */
        $repo = $this->getDoctrine()->getRepository(Products::class);
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
        $qry->setResultCacheLifetime(20);
        $prod = $qry->getOneOrNullResult(Query::HYDRATE_ARRAY);
        $r = new JsonResponse($prod, 200, ["Content-type" => "application/json; charset=UTF-8"]);
        // $r = new Response("<html><body><pre>" . json_encode($prod, self::JSON_OPTS) . "</pre></body></html");
        $r->setCharset('UTF-8');
        $r->setEncodingOptions(self::JSON_OPTS);
        $r->setMaxAge(10);
        $r->setSharedMaxAge(10);
        $r->setEtag(md5(serialize($prod)));
        $r->setPublic();

        return $r;
    }

    public function topAction(Request $request, $limit, $prodcatId = null) {
        /* @var $em EntityManager */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select(self::PROD_GRID_VIEW);
        $qb->addSelect(' rand() as HIDDEN r');
        $qb->join('p.prodPiCollection', 'pi');
        $qb->join('p.prodBrand', 'b');
        $qb->groupBy('p.prodBrand');
        $qb->setMaxResults($limit);
        $qb->orderBy('r');
        if ($prodcatId > 0) {
            $qb->andWhere('p.prodProdcat = :pcatId');
            $qb->setParameter('pcatId', (int) $prodcatId);
        }
        $qry = $qb->getQuery();
        $qry->setResultCacheId('cached_top');
        $qry->setResultCacheLifetime(10);
        $res = $qry->getArrayResult();
        //$r = new Response("<html><body><pre>" .json_encode($res, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre></body></html");

        $r = new JsonResponse($res, 200, ["Content-type" => "application/json; charset=UTF-8"]);
        $r->setCharset('UTF-8');
        $r->setEncodingOptions(self::JSON_OPTS);
        $r->setMaxAge(10);
        $r->setSharedMaxAge(10);
        $r->setEtag(md5(serialize($res)));
        $r->setPublic();
        if ($r->isNotModified($request)) {
            return $r;
        }
//$r = new Response("<html><body><pre>" . json_encode($res, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre></body></html");
        return $r;
    }

    public function cachedAction(Request $request, $id) {
        $response = new JsonResponse(str_repeat("abc", 1000) . (rand() % 2) . intval($id));
        $response->setTtl(3);
        $response->setMaxAge(20);
        $response->setETag(md5($response->getContent()));
        $response->setPublic(); // make sure the response is public/cacheable
        if ($response->isNotModified($request)) {
            return $response;
        }

        return $response;
    }

}
