<?php 
include "vendor/autoload.php";

require_once 'api/v1/ReceivePaymentEndpoint.php';
require_once 'api/v1/RegistrationInitializeEndpoint.php';
require_once 'api/v1/RegistrationSubmitEndpoint.php';
require_once 'api/v1/LoginEndpoint.php';
require_once 'api/v1/ProfileEndpoint.php';
require_once 'api/v1/SecuritySettingsEndpoint.php';
require_once 'api/v1/endpoint/NotificationSettingsEndpoint.php'; 
require_once 'api/v1/InitializeWalletEndpoint.php';
require_once 'api/v1/endpoint/WalletDepositOptionsEndpoint.php';
require_once 'api/v1/endpoint/WalletWithdrawOptionsEndpoint.php'; 
require_once 'api/v1/endpoint/WalletPaymentOptionsEndpoint.php';
use Crada\Apidoc\Builder;
use Crada\Apidoc\Exception;

$classes = array(
    '\ReceivePaymentEndpoint',
    '\RegistrationInitializeEndpoint',
    '\RegistrationSubmitEndpoint',
    '\LoginEndpoint',
    '\ProfileEndpoint',
    '\SecuritySettingsEndpoint',
    '\NotificationSettingsEndpoint',
    '\InitializeWalletEndpoint',
    '\WalletDepositOptionsEndpoint',
    '\WalletWithdrawOptionsEndpoint',
    '\WalletPaymentOptionsEndpoint'
);
$output_dir  = __DIR__.'/apidocs';
$output_file = 'api.html'; // defaults to index.html

try {
    $builder = new Builder($classes, $output_dir, 'Api Title', $output_file);
    $builder->generate();
} catch (Exception $e) {
    echo 'There was an error generating the documentation: ', $e->getMessage();
}