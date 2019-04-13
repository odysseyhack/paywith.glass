<?php
require_once ('endpoint/RestServiceBaseEndpoint.php');
require_once ('model/LoginRequest.php');
require_once ('utility/ValidationFunctions.php');
require_once ('utility/UserValidationFunctions.php');

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
            // TODO add integration
            $response = json_encode($loginRequest);
            echo $response;
            return $response;
        }
    }

    /**
     * Validates if all the expected parameters are present on the request.
     */
    function validatePostParameters()
    {
        return  (validateUsername() && validatePasswordHash());
    }

}

$endpoint = new LoginEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);