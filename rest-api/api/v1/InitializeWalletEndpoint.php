<?php
require_once ('endpoint/RestServiceBaseEndpoint.php');
require_once ('model/InitializeWalletRequest.php');
require_once ('utility/ValidationFunctions.php');
require_once ('utility/UserValidationFunctions.php');

class InitializeWalletEndpoint extends RestServiceBaseEndpoint
{

    /**
     * @ApiDescription(section="Wallet", description="Initialize your wallet")
     * @ApiMethod(type="post")
     * @ApiHeaders(name="v", type="string", nullable=false, description="Vendor domain name")
     * @ApiHeaders(name="cc", type="string", nullable=false, description="Vendor country code id")
     * @ApiHeaders(name="o", type="string", nullable=false, description="User id hash")
     * @ApiRoute(name="/authenticated/wallet/initialize")
     * @ApiParams(name="name", type="string", nullable=false, description="Your name")
     * @ApiParams(name="surname", type="string", nullable=false, description="Your surname")
     * @ApiParams(name="address", type="string", nullable=false, description="Your street and number")
     * @ApiParams(name="city", type="string", nullable=false, description="Your city")
     * @ApiParams(name="postalcode", type="string", nullable=false, description="Your postal code")
     * @ApiParams(name="country", type="string", nullable=false, description="Your country")
     */
    function handlePostRequest()
    {
        if ($this->validatePostParameters()) {
            $initializeWalletRequest = $this->buildInitializeWalletRequest();
            echo json_encode($initializeWalletRequest);
            // TODO implement backend call with the init wallet request object.
        }
    }

    function buildInitializeWalletRequest()
    {
        $initializeWalletRequest = new InitializeWalletRequest();
        $this->fillInName($initializeWalletRequest);
        $this->fillInSurname($initializeWalletRequest);
        $this->fillInAddress($initializeWalletRequest);
        $this->fillInCity($initializeWalletRequest);
        $this->fillInPostalCode($initializeWalletRequest);
        $this->fillInCountry($initializeWalletRequest);
        return $initializeWalletRequest;
    }

    private function fillInCountry($initializeWalletRequest)
    {
        if (isset($_POST['country'])) {
            $initializeWalletRequest->country = $_POST['country'];
        }
    }

    private function fillInPostalCode($initializeWalletRequest)
    {
        if (isset($_POST['postalcode'])) {
            $initializeWalletRequest->postalcode = $_POST['postalcode'];
        }
    }

    private function fillInCity($initializeWalletRequest)
    {
        if (isset($_POST['city'])) {
            $initializeWalletRequest->city = $_POST['city'];
        }
    }

    private function fillInAddress($initializeWalletRequest)
    {
        if (isset($_POST['address'])) {
            $initializeWalletRequest->address = $_POST['address'];
        }
    }

    private function fillInSurname($initializeWalletRequest)
    {
        if (isset($_POST['surname'])) {
            $initializeWalletRequest->surname = $_POST['surname'];
        }
    }

    private function fillInName($initializeWalletRequest)
    {
        if (isset($_POST['name'])) {
            $initializeWalletRequest->name = $_POST['name'];
        }
    }

    function validatePostParameters()
    {
        return (validateName() && validateSurname() && validateAddress() && validateCity() && validatePostalcoded() && validateCountry());
    }
}

$endpoint = new InitializeWalletEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);