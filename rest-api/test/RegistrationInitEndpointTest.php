<?php
require_once '../api/v1/RegistrationInitializeEndpoint.php';
use PHPUnit\Framework\TestCase;
/**
 * LoginEndpoint test case.
 */
class RegistrationInitEndpointTest extends TestCase
{
    public function testhandleGetRequest() : void
    {
        $endPoint = new RegistrationInitializeEndpoint();
        $_POST['acceptedTos'] = 1;
        $this->assertRegexp('//',$endPoint->handlePostRequest());
    }
    

}

