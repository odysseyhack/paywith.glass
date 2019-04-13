<?php
require_once ('RestServiceBaseEndpoint.php');
require_once ('model/Payment.php');

class ReceivePaymentEndpoint extends RestServiceBaseEndpoint
{

    /**
     *
     * @ApiDescription(section="Payment", description="Post a new payment")
     * @ApiMethod(type="post")
     * @ApiHeaders(name="v", type="string", nullable=false, description="Vendor domain name")
     * @ApiHeaders(name="cc", type="string", nullable=false, description="Vendor country code id")
     * @ApiHeaders(name="o", type="string", nullable=false, description="User id hash")
     * @ApiRoute(name="/payment/receive")
     * @ApiParams(name="id", type="string", nullable=false, description="paymentId")
     * @ApiParams(name="amount", type="double", nullable=false, description="The amount to transfer")
     * @ApiParams(name="memo", type="string", nullable=false, description="destination account")
     * @ApiParams(name="assetCode", type="string", nullable=false, description="The asset code")
     * @ApiParams(name="assetIssuer", type="integer", nullable=true, description="The asset issuer")
     * @ApiParams(name="from", type="integer", nullable=true, description="The sender")
     */
    function handlePostRequest()
    {
        $isValid = $this->validatePostParameters();

        if ($isValid) {
            $paymentRequest = new Payment($_POST['id'], $_POST['memo'], $_POST['amount'], $_POST['assetCode'], $_POST['assetIssuer'], $_POST['from']);
            // post this request to the paywithglass core system.
        }
    }

    /**
     * Validates if all the expected parameters are present on the request.
     */
    function validatePostParameters()
    {
        if (! isset($_POST['id'])) {
            header("HTTP/1.0 400 Bad request. Missing 'id' parameter");
            return false;
        } else if (! isset($_POST['memo'])) {
            header("HTTP/1.0 400 Bad request. Missing 'memo' parameter");
            return false;
        } else if (! isset($_POST['amount'])) {
            header("HTTP/1.0 400 Bad request. Missing 'amount' parameter");
            return false;
        } else if (! isset($_POST['assetCode'])) {
            header("HTTP/1.0 400 Bad request. Missing 'assetCode' parameter");
            return false;
        } else if (! isset($_POST['assetIssuer'])) {
            header("HTTP/1.0 400 Bad request. Missing 'assetIssuer' parameter");
            return false;
        } else if (! isset($_POST['from'])) {
            header("HTTP/1.0 400 Bad request. Missing 'from' parameter");
            return false;
        }
        return true;
    }
}

$endpoint = new ReceivePaymentEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);