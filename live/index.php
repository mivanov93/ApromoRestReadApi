<?php

namespace Api;

use AppKernel;
use Composer\Autoload\ClassLoader;
use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

error_reporting(-1);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
/**
 * @var ClassLoader
 */
$loader = require __DIR__ . '/../app/autoload.php';
include_once __DIR__ . '/../var/bootstrap.php.cache';

class MyAppCache extends HttpCache {

    protected function getOptions() {
        return array(
            'debug' => false,
            'default_ttl' => 30,
            'private_headers' => array('Authorization', 'Cookie'),
            'allow_reload' => false,
            'allow_revalidate' => false,
            'stale_while_revalidate' => 2,
            'stale_if_error' => 60,
        );
    }

}

$kernel = new AppKernel('live_prod', false);
$kernel->loadClassCache();
$kernel = new MyAppCache($kernel);

// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
