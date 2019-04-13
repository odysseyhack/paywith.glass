<?php

/**
 *   Base class to provide some base support for building REST endpoints.
 *   In order to use this create a class that extendsd from this base class and override the 'handleGetRequest', 'handlePostRequest', 'handlePutRequest' met'hods.
 */
class RestServiceBaseEndpoint
{

    var $v;

    var $cc;

    var $o;

    function handleRequest($requestMethod)
    {
        if ($this->handleHeaderAuthentication()) {
            switch ($requestMethod) {
                case 'GET':
                    $this->handleGetRequest();
                    break;
                case 'POST':
                    $this->handlePostRequest();
                    break;
                case 'PUT':
                    $this->handlePutRequest();
                    break;
                default:
                    header("HTTP/1.0 405 Method Not Allowed");
            }
        }
    }

    function initHeadersFunction()
    {
        if (! function_exists('getallheaders')) {

            function getallheaders()
            {
                $headers = [];
                foreach ($_SERVER as $name => $value) {
                    if (substr($name, 0, 5) == 'HTTP_') {
                        $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
                    }
                }
                return $headers;
            }
        }
    }

    /**
     * In order to authenticate to the system we need to have following headers present on each request:
     * v: vendor domain name
     * cc: vendor country id
     * o: user id hash
     *
     * If any of these headers is not present we will redirect with a 401 unautherized response.
     */
    function handleHeaderAuthentication()
    {
        $this->initHeadersFunction();
        foreach (getallheaders() as $name => $value) {
            if ($name == 'v') {
                $this->v = $value;
            } else if ($name == 'cc') {
                $this->cc = $value;
            } else if ($name == 'o') {
                $this->o = $value;
            }
        }
        if (empty($this->v)) {
            header('HTTP/1.0 401 Header paremeter v is required for authentication');
            return false;
        }
        if (empty($this->cc)) {
            header('HTTP/1.0 401 Header paremeter cc is required for authentication');
            return false;
        }
        if (empty($this->o)) {
            header('HTTP/1.0 401 Header paremeter o is required for authentication');
            return false;
        }
        return true;
    }

    function handleGetRequest()
    {
        header("HTTP/1.0 501 Not found");
    }

    function handlePostRequest()
    {
        header("HTTP/1.0 501 Not found");
    }

    function handlePutRequest()
    {
        header("HTTP/1.0 501 Not found");
    }
}