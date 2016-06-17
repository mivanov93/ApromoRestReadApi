<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}


//
//        $config = $conn->getConfiguration();
//        $config->setResultCacheImpl($this->get('apromo_cache'));
//
//
//        $query = "SELECT prod_id,prod_name,prod_newprice,prod_oldprice,pi_id FROM products as p "
//                . "INNER JOIN products_images as pi ON (pi.pi_prod_id = p.prod_id) "
//                . "WHERE 1 "
//                . "GROUP by prod_brand_id "
//                . "ORDER BY rand() "
//                . "LIMIT " . (int) $limit;
//
//        $query2 = "SELECT * FROM products";
//        $rsm = new \Doctrine\ORM\Query\ResultSetMappingBuilder($em);
//        $rsm->addScalarResult("prod_id", "prodId");
//        $rsm->addScalarResult("pi_id", "piId");
//        $q = $em->createNativeQuery($query, $rsm);
//        $r = $q->getResult();
//
//
//        $params = [];
//        $types = [];
//        $qcp = new QueryCacheProfile(1, "products_top");
//        $stmt = $conn->executeCacheQuery($query, $params, $types, $qcp);
//        $results = $stmt->fetchAll();
//        $stmt->closeCursor();
//        $r = new Response("<html><body><pre>" . json_encode($r, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre></body></html");
//        $r->setMaxAge(30);
//        $r->setSharedMaxAge(30);
//        $r->setEtag(md5(1));
//        $r->setPublic();
//        if ($r->isNotModified($request)) {
//            return $r;
//        }
//        for ($i = 0; $i < 100000; $i++)
//            md5($i);
//        return $r;
