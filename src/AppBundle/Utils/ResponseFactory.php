<?php

namespace AppBundle\Utils;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of JsonResponseFactory
 *
 * @author x0r
 */
class ResponseFactory {

    const publicCache = 1;
    const privateCache = 2;

    private $jsonEncodeOpts;
    private $cacheTime;

    public function __construct($cacheTime, $jsonEncodeOpts) {
        $this->jsonEncodeOpts = $jsonEncodeOpts;
        $this->cacheTime = $cacheTime;
    }

    public function getJsonResponse($data, $cacheTime = null, $cacheMode = self::publicCache, $jsonEncodeOpts = null) {
        if ($cacheTime === null) {
            $cacheTime = $this->cacheTime;
        }
        if ($jsonEncodeOpts === null) {
            $jsonEncodeOpts = $this->jsonEncodeOpts;
        }
        $jsonData = json_encode($data, $jsonEncodeOpts);
        $r = new JsonResponse($jsonData, 200, ["Content-type" => "application/json; charset=UTF-8"], true);
        $r->setMaxAge($cacheTime);
        $r->setSharedMaxAge($cacheTime);
        $r->setEtag(md5($jsonData));
        if ($cacheMode === self::publicCache) {
            $r->setPublic();
        } else {
            $r->setPrivate();
        }
        return $r;
    }

    public function getHtmlResponse($data, $cacheTime = null, $cacheMode = self::publicCache,$statusCode=200) {
        if ($cacheTime === null) {
            $cacheTime = $this->cacheTime;
        }
        $r = new Response($data, $statusCode);
        $r->setMaxAge($cacheTime);
        $r->setSharedMaxAge($cacheTime);
        $r->setEtag(md5($data));
        if ($cacheMode === self::publicCache) {
            $r->setPublic();
        } else {
            $r->setPrivate();
        }
        return $r;
    }

    public function getJsonMysqlRowsResponse($rawData, $totalRowCount, $cacheTime = null, $cacheMode = self::publicCache,
                                             $jsonEncodeOpts = null) {
        $data = ["data" => ["rows" => $rawData, "totalRowCount" => $totalRowCount], "statusCode" => 1, "statusMsg" => "OK", "reqId" => 15, "execTime" => 0.01];
        $r = $this->getJsonResponse($data, $cacheTime, $cacheMode, $jsonEncodeOpts);
        return $r;
    }

    public function getHtmlMockResponse($data, $cacheTime = null, $cacheMode = self::publicCache, $jsonEncodeOpts = null) {
        if ($cacheTime === null) {
            $cacheTime = $this->cacheTime;
        }
        if ($jsonEncodeOpts === null) {
            $jsonEncodeOpts = $this->jsonEncodeOpts;
        }
        $jsonData = json_encode($data, $jsonEncodeOpts);
        $r = new Response("<html><body><pre>" . $jsonData . "</pre></body></html>");
        $r->setMaxAge($cacheTime);
        $r->setSharedMaxAge($cacheTime);
        $r->setEtag(md5($jsonData));
        if ($cacheMode === self::publicCache) {
            $r->setPublic();
        } else {
            $r->setPrivate();
        }
        return $r;
    }

}
