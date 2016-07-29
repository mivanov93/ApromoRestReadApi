<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TPerformant\API\HTTP\Affiliate;
use TPerformant\API\Model\Product;

class TwoPerformantController extends Controller {

    const CACHE_TIME = 5;

    public function testAction() {
        $me = new Affiliate('info@asumltd.com', '#RuasNl32_2p3rforman.bg'); // fill in with your own credentials

         $feeds = $me->getProductFeeds();
            var_dump($feeds);
        
        $redisCache = $this->get('doctrine_cache.providers.apromo_redis_cache')->getRedis();
        $affKey = "ewdfwef123";
        if (false && !$redisCache->exists($affKey) || !($prods = unserialize($redisCache->get($affKey)))) {
            $feeds = $me->getProductFeeds();
            var_dump($feeds);
            $sel = rand(0, count($feeds) - 1);
            $feed = $feeds[$sel];
            $rawProds = $me->getProducts($feed->getId());
            $brandName = $feed->getName();
            $prods = [];
            foreach ($rawProds as $rawProd) {
                $prods[] = $this->parseProduct($rawProd, $brandName);
            }
            if ($prods !== false) {
                $redisCache->set($affKey, serialize($prods));
                $redisCache->expire($affKey, self::CACHE_TIME);
            }
        }


        $jsonResponseFactory = $this->get('response_factory');
        $r = $jsonResponseFactory->getJsonMysqlRowsResponse($prods, count($prods), self::CACHE_TIME);
        return $r;
    }

    private function parseProduct($rawProd, $brandName) {
        $prod = [];
        $prod['prodId'] = $rawProd->getId();
        $prod['prodUniqueId'] = $rawProd->getUniqueCode();
        $prod['prodDescr'] = $rawProd->getDescription();
        $prod['prodProdcat'] = ['prodcatName' => $rawProd->getCategory() . " " . $rawProd->getSubcategory()];
        $prod['prodNewprice'] = $rawProd->getPrice();
        $prod['prodUrl'] = $rawProd->getUrl();
        $prod['prodName'] = $rawProd->getTitle();
        $prod['prodCaption'] = $rawProd->getCaption();
        $prod['prodBrand'] = ['brandName' => $brandName];
        $prod['prodManufacturer'] = $rawProd->getBrand(); //['brandName' => $rawProd->getBrand()];
        $prod['prodImgUrls'] = $rawProd->getStructuredImageUrls();
        return $prod;
    }

}
