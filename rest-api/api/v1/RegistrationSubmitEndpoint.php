<?php
require_once ('RestServiceBaseEndpoint.php');
require_once ('model/RegistrationRequest.php');

class RegistrationSubmitEndpoint extends RestServiceBaseEndpoint
{

    /**
     *
     * @ApiDescription(section="Registration", description="Submit a registration")
     * @ApiMethod(type="post")
     * @ApiRoute(name="/register/submit")
     * @ApiParams(name="acceptedTos", type="integer", nullable=false, description="Are the ToS accepted.")
     * @ApiParams(name="userName", type="string", nullable=false, description="The username to create")
     * @ApiParams(name="email", type="string", nullable=false, description="The email attached to this registration")
     * @ApiParams(name="allowOtherUsersToEmailMe", type="integer", nullable=true, description="Allow other users to send you email.")
     * @ApiParams(name="passwordHash", type="string", nullable=false, description="A hash of the password")
     * @ApiParams(name="verificationCode", type="string", nullable=false, description="The verificationCode for this registration.")
     */
    function handlePostRequest()
    {
        $isValid = $this->validatePostRequest();

        if ($isValid) {
            $allowOtherUserMail = 0;
            if (isset($_POST['allowOtherUsersToEmailMe'])) {
                $allowOtherUserMail = $_POST['allowOtherUsersToEmailMe'];
            }
            $submitRequest = RegistrationRequest::createForSubmitRegistration($_POST['acceptedTos'], $_POST['userName'], 
                $_POST['email'], $allowOtherUserMail, $_POST['passwordHash'], $_POST['verificationCode']);
            // throw submit request to backend.
            print_r($submitRequest);
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
        } else if (! isset($_POST['email'])) {
            header("HTTP/1.0 400 Bad request. Missing 'emailAddres' parameter");
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