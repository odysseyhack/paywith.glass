<?php
require_once ('RestServiceBaseEndpoint.php');
require_once ('model/RegistrationRequest.php');

class RegistrationInitializeEndpoint extends RestServiceBaseEndpoint
{
    /**
     * @ApiDescription(section="Registration", description="Initialize a new registration")
     * @ApiMethod(type="post")
     * @ApiRoute(name="/register/initialize")
     * @ApiParams(name="acceptedTos", type="integer", nullable=true, description="Indicates whether the user has accepted tos (1) or not (0).")
     */
    function handlePostRequest()
    {
        $isValid = $this->validateRequest();
        if ($isValid) {
            $initialRegistrationRequest = RegistrationRequest::createForInitializeRegistration($_POST['acceptedTos']);
            if ($initialRegistrationRequest->acceptedTos) {
                // return verification URL
                echo "verification url";
            } else {
                // return tos to user
                echo "tos";
            }
        }
    }

    function validateRequest()
    {
        // validate all parameters are present
        if (! isset($_POST['acceptedTos'])) {
            header("HTTP/1.0 400 Bad request. Missing 'acceptedTos' parameter");
            return false;
        }
        return true;
    }
}

$endpoint = new RegistrationInitializeEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);