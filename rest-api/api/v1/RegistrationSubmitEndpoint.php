<?php

class RegistrationSubmitEndpoint extends RestServiceBaseEndpoint
{

    /**
     *
     * @ApiDescription(section="Registration", description="Submit a registration")
     * @ApiMethod(type="post")
     * @ApiRoute(name="/register/submit")
     * @ApiParams(name="acceptedTos", type="integer", nullable=true, description="Indicates whether the user has accepted tos (1) or not (0).")
     * @ApiParams(name="userName", type="string", nullable=false, description="The username to create")
     * @ApiParams(name="emailAddres", type="string", nullable=false, description="The emailaddress attached to this registration")
     * @ApiParams(name="allowOtherUsersToEmailMe", type="integer", nullable=false, description="Would you like other users to email you (1) or not (0)?")
     * @ApiParams(name="passwordHash", type="string", nullable=false, description="A hash of the password")
     * @ApiParams(name="verificationCode", type="string", nullable=false, description="The verificationCode for this registration.")
     */
    function handlePostRequest()
    {
        $isValid = $this->validatePostRequest();

        if ($isValid()) {
            $submitRequest = RegistrationRequest::createForSubmitRegistration($_POST['acceptedTos'], $_POST['userName'], $_POST['emailAddress'], 
                $_POST['allowOtherUsersToEmailMe'], $_POST['passwordHash'], $_POST['verificationCode']);
            //throw submit request to backend.
        }
    }

    function validatePostRequest()
    {
        if (! isset($_POST['acceptedTos'])) {
            header("HTTP/1.0 400 Bad request. Missing 'acceptedTos' parameter");
            return false;
        } else if (! isset($_POST['userName'])) {
            header("HTTP/1.0 400 Bad request. Missing 'userName' parameter");
            return false;
        } else if (! isset($_POST['emailAddres'])) {
            header("HTTP/1.0 400 Bad request. Missing 'emailAddres' parameter");
            return false;
        } else if (! isset($_POST['allowOtherUsersToEmailMe'])) {
            header("HTTP/1.0 400 Bad request. Missing 'allowOtherUsersToEmailMe' parameter");
            return false;
        } else if (! isset($_POST['passwordHash'])) {
            header("HTTP/1.0 400 Bad request. Missing 'passwordHash' parameter");
            return false;
        } else if (! isset($_POST['verificationCode'])) {
            header("HTTP/1.0 400 Bad request. Missing 'verificationCode' parameter");
            return false;
        }
        return true;
    }
}

$endpoint = new RegistrationSubmitEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);