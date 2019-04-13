<?php
require_once '../api/v1/LoginEndpoint.php';
use PHPUnit\Framework\TestCase;
/**
 * LoginEndpoint test case.
 */
class LoginEndpointTest extends TestCase
{
    public function testHandlePostRequest() : void
    {
        $endPoint = new LoginEndpoint();
        $_POST['username'] = 'bas';
        $_POST['passwordHash'] = 'somehash';
        $this->assertJsonStringEqualsJsonString('{"username":"bas","passwordHash":"somehash"}', $endPoint->handlePostRequest());
    }
    

}

