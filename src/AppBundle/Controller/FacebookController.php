<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function indexAction() {

        $gen = $this->render(self::TEMPLATE,
                             [
            'title' => 'Apromo.bg',
            'url' => 'http://www.apromo.bg',
            'type' => 'article',
            'site_name' => self::SITE_NAME,
            'app_id' => self::APP_ID,
            'image' => 'http://www.apromo.bg/landing/images/logo.png',
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
            'image' => 'http://www.apromo.bg/landing/images/pc-phone.png',
            'description' => 'Партньорска програма на Apromo.bg'
        ]);
        $res = $this->get('response_factory')->getHtmlResponse($gen->getContent(), self::CACHE_TIME);
        return $res;
    }

    public function productsByProdcatAction($prodcatId) {
        $res = new Response("prodcat".$prodcatId);
        return $res;
    }

    public function productDetailsByIdAction(Request $request, $prodId) {
        $currentUri = $request->getUri();

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
            $params = [
                'title' => $prodDetails['prodName'] . ' от ' . $prodDetails['prodBrand']['brandName'],
                'url' => $currentUri,
                'type' => 'product',
                'site_name' => self::SITE_NAME,
                'app_id' => self::APP_ID,
                'image' => 'http://images.apromo.bg/products/high/' .
                (int) $prodDetails['prodPiCollection'][0]['piId'] . '.jpg',
                'description' => 'Цена: ' . $prodDetails['prodNewprice'] . ' лв\nОписание: ' . $prodDetails['prodDescr']
            ];
            $statusCode = 200;
        }
        $gen = $this->render(self::TEMPLATE, $params
        );
        $res = $this->get('response_factory')->getHtmlResponse($gen->getContent(), self::CACHE_TIME, $statusCode);
        return $res;
    }

    public function brandByBrandIdAction(Request $request, $brandId, $page) {
        $currentUri = $request->getUri();

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
            $params = [
                'title' => $brandDetails['brandName'],
                'url' => $currentUri,
                'type' => 'article',
                'site_name' => self::SITE_NAME,
                'app_id' => self::APP_ID,
                'image' => 'http://images.apromo.bg/brands/high/' . (int) $brandId . '.png',
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
