<?php
require_once ('RestServiceBaseEndpoint.php');

class WalletWithdrawOptionsEndpoint extends RestServiceBaseEndpoint
{

    /**
     *
     * @ApiDescription(section="Wallet", description="fetch available deposit options ")
     * @ApiMethod(type="get")
     * @ApiHeaders(name="v", type="string", nullable=false, description="Vendor domain name")
     * @ApiHeaders(name="cc", type="string", nullable=false, description="Vendor country code id")
     * @ApiHeaders(name="o", type="string", nullable=false, description="User id hash")
     * @ApiRoute(name="/authenticated/wallet/withdrawoptions")
     * @ApiReturn(type="object", sample="{
     *  [
     *  'option1',
     *  'option2', 
     *  'option3'
     *  ]
     * }")
     */
    function handleGetRequest()
    {
        echo "return list of strings withdraw options";
        // TODO delegate the call to paywith.glass and return the output
    }
    
}

$endpoint = new WalletWithdrawOptionsEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);