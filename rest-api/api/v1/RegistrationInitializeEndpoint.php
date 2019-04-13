<?php
require_once ('endpoint/RestServiceBaseEndpoint.php');
require_once ('model/RegistrationRequest.php');
require_once ('utility/ValidationFunctions.php');
require_once ('utility/UserValidationFunctions.php');

class RegistrationInitializeEndpoint extends RestServiceBaseEndpoint
{

    /**
     *
     * @ApiDescription(section="Registration", description="Initialize a new registration")
     * @ApiHeaders(name="v", type="string", nullable=false, description="Vendor domain name")
     * @ApiHeaders(name="cc", type="string", nullable=false, description="Vendor country code id")
     * @ApiHeaders(name="o", type="string", nullable=false, description="User id hash")
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
                // TODO return verification URL
                $verificationUrl = '';
                echo $verificationUrl;
                return $verificationUrl;
            } else {
                // TODO return tos to user
                echo "tos";
            }
        }
    }

    function validateRequest()
    {
        return validateAcceptedToS();
    }
}

$endpoint = new RegistrationInitializeEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);