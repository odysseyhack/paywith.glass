<?php
require_once ('RestServiceBaseEndpoint.php');
require_once ('model/LoginRequest.php');

class LoginEndpoint extends RestServiceBaseEndpoint
{

    /**
     *
     * @ApiDescription(section="Login", description="Login to the application")
     * @ApiMethod(type="post")
     * @ApiHeaders(name="v", type="string", nullable=false, description="Vendor domain name")
     * @ApiHeaders(name="cc", type="string", nullable=false, description="Vendor country code id")
     * @ApiHeaders(name="o", type="string", nullable=false, description="User id hash")
     * @ApiRoute(name="/login")
     * @ApiParams(name="username", type="string", nullable=false, description="The username to login")
     * @ApiParams(name="passwordHash", type="string", nullable=false, description="The password hash to login")
     */
    function handlePostRequest()
    {
        if ($this->validatePostParameters()) {
            $loginRequest = new LoginRequest($_POST['username'], $_POST['passwordHash']);
            //TODO add integration
            print_r($loginRequest);
        }
    }

    /**
     * Validates if all the expected parameters are present on the request.
     */
    function validatePostParameters()
    {
        if (! isset($_POST['username'])) {
            header("HTTP/1.0 400 Bad request. Missing 'username' parameter");
            return false;
        } else if (! isset($_POST['passwordHash'])) {
            header("HTTP/1.0 400 Bad request. Missing 'passwordHash' parameter");
            return false;
        }
        return true;
    }
}


$endpoint = new LoginEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);