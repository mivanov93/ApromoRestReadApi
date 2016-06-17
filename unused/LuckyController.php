<?php

// src/AppBundle/Controller/LuckyController.php

namespace AppBundle\Controller;

use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\DBAL\Cache\QueryCacheProfile;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller {

    public function cachedAction(Request $request, $id) {
        $response = new JsonResponse(str_repeat("abc", 1000) . (rand() % 2) . intval($id));
        $response->setTtl(3);
        $response->setMaxAge(20);
        $response->setETag(md5($response->getContent()));
        $response->setPublic(); // make sure the response is public/cacheable
        if ($response->isNotModified($request)) {
            return $response;
        }

        $this->numberAction();
        $this->numberAction();
        $this->numberAction();

        return $response;
    }

    public function jsonAction($c) {
        $number = rand(0, 100);
        $t = 0;
        for ($i = 0; $i < 100; $i++) {
            $t = max($t, crc32(rand()));
        }
        return new JsonResponse(
                ["a" => 123, "z" => $c]
        );
    }

    public function numberAction(Request $request) {

        $number = 5; //rand(0, 100);
        /* @var $conn Connection */
//        $cache = new FilesystemCache(__DIR__ . "/../../../var/cache/test");
//
//        $cache->save('cache_id', 'my_data');
        $conn = $this->getDoctrine()->getConnection();
$config = $conn->getConfiguration();
        $config->setResultCacheImpl($this->get('apromo_cache'));
        $qRaw = "SELECT prod_brand_id,prod_prodcat_id,prod_name,prod_descr,pi_id,"
                . "MATCH(prod_name,prod_descr) AGAINST(:textSearch IN BOOLEAN MODE) as score FROM `products` as p "
                . "INNER JOIN `products_images` as pi ON(pi.pi_prod_id = p.prod_id) WHERE "
                . "  MATCH(prod_name,prod_descr) AGAINST( :textSearch IN BOOLEAN MODE) "
                // . " AND ( prod_name LIKE :textSearchB OR prod_descr LIKE :textSearchB) "
                . " AND prod_brand_id IN(1,2,3,4,5,6,7,8,11)"
                . " AND prod_prodcat_id = 114 "
                . " ORDER BY score DESC LIMIT 30";
//        $q = $conn->prepare($qRaw);
//        $q->bindValue('textSearch', 'миксер ютия бял ' . rand());
//        //   $q->bindValue('textSearchB', '%миксер ютия бял '.rand().'%');
//        $q->execute();
        $q = $conn->executeCacheQuery($qRaw, ['textSearch' => 'миксер ютия бял'], ['string'],
                                      new QueryCacheProfile(30, "cache_id2", $this->get('apromo_cache')));
        $data = $q->fetchAll();
        $q->closeCursor();
        $res = json_encode($data);

//        $t = 0;
//        for ($i = 0; $i < 10 * 100000; $i++) {
//            $t = max($t, crc32(rand()));
//        }
        $response = new Response(
                '<html><body>Lucky number: ' . $res . $number . '</body></html>'
        );
        $response->setTtl(30);
        $response->setMaxAge(30);
//        $response->setETag(crc32($response->getContent()));
        $response->setPublic();
        if ($response->isNotModified($request)) {
            return $response;
        }

        return $response;
    }

}
