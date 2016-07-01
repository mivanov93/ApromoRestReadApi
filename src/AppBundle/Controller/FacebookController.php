<?php

namespace AppBundle\Controller;

use Doctrine\Common\Cache\RedisCache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use function mb_substr;

/**
 * Description of FacebookController
 *
 * @author x0r
 */
class FacebookController extends Controller {

    const APP_ID = 1729345433988478;
    const SITE_NAME = 'Apromo.bg';
    const CACHE_TIME = 1000;
    const TEMPLATE = 'fb/generic.html.twig';
    const LENGTH_OF_FB_STR = 3;
    const IMAGE_SIZE_CACHE = 3600 * 10;

    public function indexAction() {

        $gen = $this->render(self::TEMPLATE,
                             [
            'title' => 'Apromo.bg',
            'url' => 'http://www.apromo.bg',
            'type' => 'article',
            'site_name' => self::SITE_NAME,
            'app_id' => self::APP_ID,
            'image' => 'http://www.apromo.bg/images/apromo-fb-thumb2.png',
            'image_width' => 1200,
            'image_height' => 630,
            'description' => 'Сайт за промоции'
        ]);
        $res = $this->get('response_factory')->getHtmlResponse($gen->getContent(), self::CACHE_TIME);
        return $res;
    }

//            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
    public function partnersAction() {
        $gen = $this->render(self::TEMPLATE,
                             [
            'title' => 'За партньори',
            'url' => 'http://www.apromo.bg/partners',
            'type' => 'article',
            'site_name' => self::SITE_NAME,
            'app_id' => self::APP_ID,
            'image' => 'http://www.apromo.bg/images/apromo-fb-thumb.png',
            'image_width' => 1200,
            'image_height' => 630,
            'description' => 'Партньорска програма на Apromo.bg'
        ]);
        $res = $this->get('response_factory')->getHtmlResponse($gen->getContent(), self::CACHE_TIME);
        return $res;
    }

    public function productsByProdcatAction(Request $request, $prodcatId) {
        $prodcatDetails = $this->get('prodcat_data_srv')->getProdcatDetailsById((int) $prodcatId);
        $currentUri = "http://www.apromo.bg" . mb_substr($request->getPathInfo(), self::LENGTH_OF_FB_STR);
        $gen = $this->render(self::TEMPLATE,
                             [
            'title' => 'Промоции от категория ' . $prodcatDetails['prodcatName'],
            'url' => $currentUri,
            'type' => 'article',
            'site_name' => self::SITE_NAME,
            'app_id' => self::APP_ID,
            'image' => 'http://www.apromo.bg/images/ic_apromo_923x922.png',
            'image_width' => 923,
            'image_height' => 922,
            'description' => 'Най-новите промоции от категория ' . $prodcatDetails['prodcatName']
        ]);
        $res = $this->get('response_factory')->getHtmlResponse($gen->getContent(), self::CACHE_TIME);
        return $res;
    }

    public function productDetailsByIdAction(Request $request, $prodId) {
        /* @var $redisCache RedisCache */
        $redisCache = $this->get('doctrine_cache.providers.apromo_redis_cache')->getRedis();
        $currentUri = "http://www.apromo.bg" . mb_substr($request->getPathInfo(), self::LENGTH_OF_FB_STR);

        $prodDetails = $this->get('products_data_srv')->getProductDetailsById((int) $prodId);
        if ($prodDetails === null) {
            $params = [
                'title' => "Страницата не е намерена",
                'url' => $currentUri,
                'type' => 'article',
                'site_name' => self::SITE_NAME,
                'app_id' => self::APP_ID,
                'image' => 'http://www.apromo.bg/landing/images/pc-phone.png',
                'description' => "Грешен адрес"
            ];
            $statusCode = 404;
        } else {
            $imageUrl = 'http://images.apromo.bg/products/site/' .
                    (int) $prodDetails['prodPiCollection'][0]['piId'] . '.jpg';
            $imageKey = crc32('imgsize' . $imageUrl);
            if (!$redisCache->exists($imageKey) || !($imageSize = unserialize($redisCache->get($imageKey)))) {
                $imageSize = getimagesize($imageUrl);
                if ($imageSize !== false) {
                    $redisCache->set($imageKey, serialize($imageSize));
                    $redisCache->expire($imageKey, self::IMAGE_SIZE_CACHE);
                }
            }
            if ($imageSize !== false) {
                $imageWidth = $imageSize[0];
                $imageHeight = $imageSize[1];
            } else {
                $imageWidth = 768;
                $imageHeight = 432;
            }
            $params = [
                'title' => $prodDetails['prodName'],
                'url' => $currentUri,
                'type' => 'product',
                'site_name' => self::SITE_NAME,
                'app_id' => self::APP_ID,
                'image' => 'http://images.apromo.bg/products/site/' .
                (int) $prodDetails['prodPiCollection'][0]['piId'] . '.jpg',
                'image_width' => $imageWidth,
                'image_height' => $imageHeight,
                'description' => 'Цена: ' . number_format((float) $prodDetails['prodNewprice'], 2, '.', '') . " лв"
            ];

            //. ' лв\nОписание: ' . $prodDetails['prodDescr']
            //. ' от ' . $prodDetails['prodBrand']['brandName']
            $statusCode = 200;
        }
        $gen = $this->render(self::TEMPLATE, $params
        );
        $res = $this->get('response_factory')->getHtmlResponse($gen->getContent(), self::CACHE_TIME, $statusCode);
        return $res;
    }

    public function brandByBrandIdAction(Request $request, $brandId, $page) {
        /* @var $redisCache RedisCache */
        $redisCache = $this->get('doctrine_cache.providers.apromo_redis_cache')->getRedis();
        $currentUri = "http://www.apromo.bg" . mb_substr($request->getPathInfo(), self::LENGTH_OF_FB_STR);

        $brandDetails = $this->get('brands_data_srv')->getBrandDetailsById((int) $brandId);
        if ($brandDetails === null) {
            $params = [
                'title' => "Страницата не е намерена",
                'url' => $currentUri,
                'type' => 'article',
                'site_name' => self::SITE_NAME,
                'app_id' => self::APP_ID,
                'image' => 'http://www.apromo.bg/landing/images/pc-phone.png',
                'description' => "Грешен адрес"
            ];
            $statusCode = 404;
        } else {
            $imageUrl = 'http://images.apromo.bg/brands/site/' . (int) $brandId . '.png';
            $imageKey = crc32('imgsize' . $imageUrl);
            if (!$redisCache->exists($imageKey) || !($imageSize = unserialize($redisCache->get($imageKey)))) {
                $imageSize = getimagesize($imageUrl);
                if ($imageSize !== false) {
                    $redisCache->set($imageKey, serialize($imageSize));
                    $redisCache->expire($imageKey, self::IMAGE_SIZE_CACHE);
                }
            }
            if ($imageSize !== false) {
                $imageWidth = $imageSize[0];
                $imageHeight = $imageSize[1];
            } else {
                $imageWidth = 300;
                $imageHeight = 300;
            }
            $params = [
                'title' => $brandDetails['brandName'],
                'url' => $currentUri,
                'type' => 'article',
                'site_name' => self::SITE_NAME,
                'app_id' => self::APP_ID,
                'image' => $imageUrl,
                'image_width' => $imageWidth,
                'image_height' => $imageHeight,
                'description' => $brandDetails['brandDescr']
            ];
            $statusCode = 200;
        }
        $gen = $this->render(self::TEMPLATE, $params
        );
        $res = $this->get('response_factory')->getHtmlResponse($gen->getContent(), self::CACHE_TIME, $statusCode);
        return $res;
    }

}
