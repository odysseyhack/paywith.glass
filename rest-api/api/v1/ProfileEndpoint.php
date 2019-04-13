<?php
require_once ('RestServiceBaseEndpoint.php');
require_once ('model/ProfileRequest.php');

class ProfileEndpoint extends RestServiceBaseEndpoint
{

    /**
     *
     * @ApiDescription(section="Profile", description="fetch your user profile")
     * @ApiMethod(type="get")
     * @ApiHeaders(name="v", type="string", nullable=false, description="Vendor domain name")
     * @ApiHeaders(name="cc", type="string", nullable=false, description="Vendor country code id")
     * @ApiHeaders(name="o", type="string", nullable=false, description="User id hash")
     * @ApiRoute(name="/authenticated/profile")
     * @ApiReturn(type="object", sample="{
     *  'personalText':'string',
     *  'dob':'string',
     *  'location': 'string',
     *  'gender' : 'string',
     *  'signature' : 'string'
     * }")
     */
    function handleGetRequest()
    {
        $profile = new ProfileRequest();
        echo json_encode($profile);
        // TODO delegate the call to paywith.glass and return the output
    }

    /**
     *
     * @ApiDescription(section="Profile", description="Update your user profile")
     * @ApiMethod(type="post")
     * @ApiHeaders(name="v", type="string", nullable=false, description="Vendor domain name")
     * @ApiHeaders(name="cc", type="string", nullable=false, description="Vendor country code id")
     * @ApiHeaders(name="o", type="string", nullable=false, description="User id hash")
     * @ApiRoute(name="/authenticated/profile")
     * @ApiParams(name="personalText", type="string", nullable=true, description="Your personal profile text")
     * @ApiParams(name="dob", type="string", nullable=true, description="Your date of birth")
     * @ApiParams(name="location", type="string", nullable=true, description="Your location")
     * @ApiParams(name="gender", type="string", nullable=false, description="Your gender")
     * @ApiParams(name="signature", type="string", nullable=false, description="Your signature")
     */
    function handlePostRequest()
    {
        if ($this->validatePostParameters()) {
            $profile = new ProfileRequest();
            $this->fillInPersonalText($profile);
            $this->fillInDateOfBirth($profile);
            $this->fillInLocation($profile);
            $this->fillInGender($profile);
            $this->fillInSignature($profile);
            echo json_encode($profile);
            // TODO send profile to paywith glass
        }
    }

    private function fillInSignature($profile)
    {
        if (isset($_POST['signature'])) {
            $profile->signature = $_POST['signature'];
        }
    }

    private function fillInGender($profile)
    {
        if (isset($_POST['gender'])) {
            $profile->gender = $_POST['gender'];
        }
    }

    private function fillInLocation($profile)
    {
        if (isset($_POST['location'])) {
            $profile->location = $_POST['location'];
        }
    }

    private function fillInDateOfBirth($profile)
    {
        if (isset($_POST['dob'])) {
            $profile->dateOfBirth = $_POST['dob'];
        }
    }

    private function fillInPersonalText($profile)
    {
        if (isset($_POST['personalText'])) {
            $profile->personalText = $_POST['personalText'];
        }
    }

    /**
     * Since everything is optional we don't need to validate here.
     *
     * @return boolean
     */
    function validatePostParameters()
    {
        return true;
    }
}

$endpoint = new ProfileEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);