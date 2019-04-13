<?php
require_once '../api/v1/ReceivePaymentEndpoint.php';
use PHPUnit\Framework\TestCase;
/**
 * LoginEndpoint test case.
 */
class ReceivePaymentEndpointTest extends TestCase
{
    public function testHandlePostRequest() : void
    {
        $endPoint = new ReceivePaymentEndpoint();
        $_POST['id'] = 'someid';
        $_POST['memo'] = 'memo';
        $_POST['amount'] = '12345';
        $_POST['assetCode'] = 'EQD';
        $_POST['assetIssuer'] = 'me';
        $_POST['from'] = 'someone';
        $this->assertJsonStringEqualsJsonString('{"id":"someid","memo":"memo","amount":"12345","assetCode":"EQD","assetIssuer":"me","from":"someone"}', $endPoint->handlePostRequest());
    }
    

}

