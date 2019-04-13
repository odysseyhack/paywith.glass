<?php
require_once ('RestServiceBaseEndpoint.php');
require_once ('model/InitializeWalletRequest.php');

class InitializeWalletEndpoint extends RestServiceBaseEndpoint
{

    /**
     *
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
            $initializeWalletRequest = new InitializeWalletRequest();
            if (isset($_POST['name'])) {
                $initializeWalletRequest->name = $_POST['name'];
            }
            if (isset($_POST['surname'])) {
                $initializeWalletRequest->surname = $_POST['surname'];
            }
            if (isset($_POST['address'])) {
                $initializeWalletRequest->address = $_POST['address'];
            }
            if (isset($_POST['city'])) {
                $initializeWalletRequest->city = $_POST['city'];
            }
            if (isset($_POST['postalcode'])) {
                $initializeWalletRequest->postalcode = $_POST['postalcode'];
            }
            if (isset($_POST['country'])) {
                $initializeWalletRequest->country = $_POST['country'];
            }
            echo json_encode($initializeWalletRequest);
            // TODO implement backend call with the init wallet  request object.
        }
    }

    function validatePostParameters()
    {
        if (! isset($_POST['name'])) {
            header("HTTP/1.0 400 Bad request. Missing 'name' parameter");
            return false;
        }
        if (! isset($_POST['surname'])) {
            header("HTTP/1.0 400 Bad request. Missing 'surname' parameter");
            return false;
        }
        if (! isset($_POST['address'])) {
            header("HTTP/1.0 400 Bad request. Missing 'address' parameter");
            return false;
        }
        if (! isset($_POST['city'])) {
            header("HTTP/1.0 400 Bad request. Missing 'city' parameter");
            return false;
        }
        if (! isset($_POST['postalcode'])) {
            header("HTTP/1.0 400 Bad request. Missing 'postalcode' parameter");
            return false;
        }
        if (! isset($_POST['country'])) {
            header("HTTP/1.0 400 Bad request. Missing 'country' parameter");
            return false;
        }
        return true;
    }
}

$endpoint = new InitializeWalletEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);