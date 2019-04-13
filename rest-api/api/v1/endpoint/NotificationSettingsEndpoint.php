<?php
require_once ('RestServiceBaseEndpoint.php');

class NotificationSettingsEndpoint extends RestServiceBaseEndpoint
{

    /**
     *
     * @ApiDescription(section="Profile", description="fetch your notification settings")
     * @ApiMethod(type="get")
     * @ApiHeaders(name="v", type="string", nullable=false, description="Vendor domain name")
     * @ApiHeaders(name="cc", type="string", nullable=false, description="Vendor country code id")
     * @ApiHeaders(name="o", type="string", nullable=false, description="User id hash")
     * @ApiRoute(name="/authenticated/profile/notifications/settings")
     */
    function handleGetRequest()
    {
        echo "return notification settings"; 
        // TODO delegate the call to paywith.glass and return the output
    }
}

$endpoint = new NotificationSettingsEndpoint();
$endpoint->handleRequest($_SERVER['REQUEST_METHOD']);