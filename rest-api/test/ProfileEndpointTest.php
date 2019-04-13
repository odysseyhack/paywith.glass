<?php
require_once '../api/v1/ProfileEndpoint.php';
use PHPUnit\Framework\TestCase;
/**
 * LoginEndpoint test case.
 */
class LoginEndpointTest extends TestCase
{
    public function testhandleGetRequest() : void
    {
        $endPoint = new RegistrationInitializeEndpoint();
        $this->assertJsonStringEqualsJsonString('{"personalText":null,"dateOfBirth":null,"location":null,"gender":null,"signature":null}', $endPoint->handleGetRequest());
    }
    

}

