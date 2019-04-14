<?php
require_once ('endpoint/RestServiceBaseEndpoint.php');
require_once ('model/Payment.php');
require_once ('utility/ValidationFunctions.php');
require_once ('utility/UserValidationFunctions.php');

class ReceivePaymentEndpoint extends RestServiceBaseEndpoint
{

    /**
     *
     * @ApiDescription(section="Payment", description="Post a new payment")
     * @ApiMethod(type="post")
     * @ApiHeaders(name="v", type="string", nullable=false, description="Vendor domain name")
     * @ApiHeaders(name="cc", type="string", nullable=false, description="Vendor country code id")
     * @ApiHeaders(name="o", type="string", nullable=false, description="User id hash")
     * @ApiRoute(name="/authenticated/payment/receive")
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
            
            $response = json_encode($paymentRequest);
            echo $response;
            return $response;
            // TODO implement backend
        }
    }

    /**
     * Validates if all the expected parameters are present on the request.
     */
    function validatePostParameters()
    {
        $validator = new ValidationFunctions();
        return ($validator->validateId() && $validator->validateMemo() && $validator->validateAmount() 
            && $validator->validateAssetCode() && $validator->validateAssetIssuer() && $validator->validateFrom());
    }
}

$endpoint = new ReceivePaymentEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);