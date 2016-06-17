<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Products;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller {

//    private $lastModified;
//
//    public function __construct() {
//        $conn = $this->getDoctrine()->getConnection();
//        $query = "SELECT prod_lastmodified FROM products ORDER BY prod_lastmodified DESC LIMIT 1";
//        $qcp = new QueryCacheProfile(1, "last_modified");
//        $stmt = $conn->executeCacheQuery($query);
//        $this->lastModified = $stmt->fetchColumn();
//    }

    public function topAction(Request $request, $limit) {
        /* @var $em EntityManager */
        $repo = $this->getDoctrine()->getRepository(Products::class);
        /* @var $qb \Doctrine\ORM\QueryBuilder */
        $qb = $repo->createQueryBuilder('p');
        $qb->select('partial p.{prodId,prodName},pi');
        $qb->join('p.prodPiCollection', 'pi');
        $qb->setMaxResults($limit);
        $qry = $qb->getQuery();
        $qry->setResultCacheId('cached_top');
        $qry->setResultCacheLifetime(30);
        $res = $qry->getArrayResult();
$r=new JsonResponse($res);
$r->setCharset('UTF-8');
$r->setEncodingOptions(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $r->setMaxAge(30);
        $r->setSharedMaxAge(30);
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
