<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function restIndexAction(Request $request) {
        $jsonResponseFactory = $this->get('response_factory');
        $time=time();
        $time=  date("Y-m-d h:i:s",$time);
        $r = $jsonResponseFactory->getJsonResponse("200 working ".$time, 1000);
//        $r->setEtag();
//        $r->setLastmodified(new \DateTime("01-02-2016"));
//          //      $r->setExpires(new \DateTime("01-11-2016"));

        return $r;
    }

}
