<?php 
/**
*   Base class to provide some base support for building REST endpoints.
*   In order to use this create a class that extendsd from this base class and override the 'handleGetRequest', 'handlePostRequest', 'handlePutRequest' met'hods.
*/
class RestServiceBaseEndpoint
{

    function handleRequest($requestMethod)
    {
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