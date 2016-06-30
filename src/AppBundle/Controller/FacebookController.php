<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Description of FacebookController
 *
 * @author x0r
 */
class FacebookController {

    public function indexAction() {
        $res = new Response('fb no-cache test');
        return $res;
    }

}
