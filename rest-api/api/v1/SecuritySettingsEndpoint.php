<?php
require_once ('endpoint/RestServiceBaseEndpoint.php');
require_once ('model/SecuritySettingsRequest.php');
require_once ('utility/ValidationFunctions.php');
require_once ('utility/UserValidationFunctions.php');

class SecuritySettingsEndpoint extends RestServiceBaseEndpoint
{

    /**
     *
     * @ApiDescription(section="Profile", description="fetch your security settings")
     * @ApiMethod(type="get")
     * @ApiHeaders(name="v", type="string", nullable=false, description="Vendor domain name")
     * @ApiHeaders(name="cc", type="string", nullable=false, description="Vendor country code id")
     * @ApiHeaders(name="o", type="string", nullable=false, description="User id hash")
     * @ApiRoute(name="/authenticated/profile/security/settings")
     * @ApiReturn(type="object", sample="{
     *  'name':'string',
     *  'email':'string',
     *  'currentPassword': 'string',
     *  'newPassword' : 'string',
     *  'confirmNewPassword' : 'string'
     * }")
     */
    function handleGetRequest()
    {
        $securitySettings = new SecuritySettingsRequest();
        echo json_encode($securitySettings);
        // TODO delegate the call to paywith.glass and return the output
    }

    /**
     *
     * @ApiDescription(section="Profile", description="Update your user profile")
     * @ApiMethod(type="post")
     * @ApiHeaders(name="v", type="string", nullable=false, description="Vendor domain name")
     * @ApiHeaders(name="cc", type="string", nullable=false, description="Vendor country code id")
     * @ApiHeaders(name="o", type="string", nullable=false, description="User id hash")
     * @ApiRoute(name="/authenticated/profile/security/settings")
     * @ApiParams(name="name", type="string", nullable=true, description="The new profile name")
     * @ApiParams(name="email", type="string", nullable=true, description="The new profile email")
     * @ApiParams(name="currentPassword", type="string", nullable=false, description="Your current password")
     * @ApiParams(name="newPassword", type="string", nullable=false, description="The new profile password")
     * @ApiParams(name="confirmNewPassword", type="string", nullable=false, description="The new profile password confirmation")
     */
    function handlePostRequest()
    {
        if ($this->validatePostParameters()) {
            $securitySettingsRequest = new SecuritySettingsRequest();
            $this->fillInName($securitySettingsRequest);
            $this->fillInEmail($securitySettingsRequest);
            $this->fillInCurrentPassword($securitySettingsRequest);
            $this->fillInNewPassword($securitySettingsRequest);
            $this->fillInConfirmNewPassword($securitySettingsRequest);
            echo json_encode($securitySettingsRequest);
            // TODO implement backend call with the securitysettings request object.
        }
    }

    private function fillInConfirmNewPassword($securitySettingsRequest)
    {
        if (isset($_POST['confirmNewPassword'])) {
            $securitySettingsRequest->confirmNewPassword = $_POST['confirmNewPassword'];
        }
    }

    private function fillInNewPassword($securitySettingsRequest)
    {
        if (isset($_POST['newPassword'])) {
            $securitySettingsRequest->newPassword = $_POST['newPassword'];
        }
    }

    private function fillInCurrentPassword($securitySettingsRequest)
    {
        if (isset($_POST['currentPassword'])) {
            $securitySettingsRequest->currentPassword = $_POST['currentPassword'];
        }
    }

    private function fillInEmail($securitySettingsRequest)
    {
        if (isset($_POST['email'])) {
            $securitySettingsRequest->email = $_POST['email'];
        }
    }

    private function fillInName($securitySettingsRequest)
    {
        if (isset($_POST['name'])) {
            $securitySettingsRequest->name = $_POST['name'];
        }
    }

    function validatePostParameters()
    {
        return validateCurrentPassword();
    }
}

$endpoint = new SecuritySettingsEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);