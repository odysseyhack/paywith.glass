<?php
require_once ('endpoint/RestServiceBaseEndpoint.php');
require_once ('model/RegistrationRequest.php');
require_once ('utility/ValidationFunctions.php');
require_once ('utility/UserValidationFunctions.php');

class RegistrationSubmitEndpoint extends RestServiceBaseEndpoint
{

    /**
     *
     * @ApiDescription(section="Registration", description="Submit a registration")
     * @ApiMethod(type="post")
     * @ApiRoute(name="/register/submit")
     * @ApiHeaders(name="v", type="string", nullable=false, description="Vendor domain name")
     * @ApiHeaders(name="cc", type="string", nullable=false, description="Vendor country code id")
     * @ApiHeaders(name="o", type="string", nullable=false, description="User id hash")
     * @ApiParams(name="acceptedTos", type="integer", nullable=false, description="Are the ToS accepted.")
     * @ApiParams(name="username", type="string", nullable=false, description="The username to create")
     * @ApiParams(name="email", type="string", nullable=false, description="The email attached to this registration")
     * @ApiParams(name="allowOtherUsersToEmailMe", type="integer", nullable=true, description="Allow other users to send you email.")
     * @ApiParams(name="passwordHash", type="string", nullable=false, description="A hash of the password")
     * @ApiParams(name="verificationCode", type="string", nullable=false, description="The verificationCode for this registration.")
     */
    function handlePostRequest()
    {
        $isValid = $this->validatePostRequest();

        if ($isValid) {
            $validator = new ValidationFunctions();
            $allowOtherUserMail = $validator->isOtherUserEmailAllowed();
            $submitRequest = RegistrationRequest::createForSubmitRegistration($_POST['acceptedTos'], $_POST['username'], $_POST['email'], $allowOtherUserMail, $_POST['passwordHash'], $_POST['verificationCode']);
            // throw submit request to backend.
            echo json_encode($submitRequest);
        }
    }

    function validatePostRequest()
    {
        $validator = new ValidationFunctions();
        $userValidator = new UserValidationFunctions();
        return ($validator->validateAcceptedToS() && $userValidator->validateUsername() && 
            $userValidator->validateEmail() && $validator->validatePasswordHash() && $validator->validateVerificationCode());
    }
}

$endpoint = new RegistrationSubmitEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);