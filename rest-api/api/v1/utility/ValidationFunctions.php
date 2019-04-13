<?php

function isOtherUserEmailAllowed()
{
    if (isset($_POST['allowOtherUsersToEmailMe'])) {
        return $_POST['allowOtherUsersToEmailMe'];
    }
    return 0;
}

function validateVerificationCode()
{
    if (! isset($_POST['verificationCode'])) {
        header("HTTP/1.0 400 Bad request. Missing 'verificationCode' parameter");
        return false;
    }
    return true;
}

function validateEmail()
{
    if (! isset($_POST['username'])) {
        header("HTTP/1.0 400 Bad request. Missing 'username' parameter");
        return false;
    }
    return true;
}

function validatePasswordHash()
{
    if (! isset($_POST['passwordHash'])) {
        header("HTTP/1.0 400 Bad request. Missing 'passwordHash' parameter");
        return false;
    }
    return true;
}

function validateUsername()
{
    if (! isset($_POST['username'])) {
        header("HTTP/1.0 400 Bad request. Missing 'username' parameter");
        return false;
    }
    return true;
}

function validateCountry()
{
    if (! isset($_POST['country'])) {
        header("HTTP/1.0 400 Bad request. Missing 'country' parameter");
        return false;
    }
    return true;
}

function validatePostalcoded()
{
    if (! isset($_POST['postalcode'])) {
        header("HTTP/1.0 400 Bad request. Missing 'postalcode' parameter");
        return false;
    }
    return true;
}

function validateCity()
{
    if (! isset($_POST['city'])) {
        header("HTTP/1.0 400 Bad request. Missing 'city' parameter");
        return false;
    }
    return true;
}

function validateAddress()
{
    if (! isset($_POST['address'])) {
        header("HTTP/1.0 400 Bad request. Missing 'address' parameter");
        return false;
    }
    return true;
}

function validateSurname()
{
    if (! isset($_POST['surname'])) {
        header("HTTP/1.0 400 Bad request. Missing 'surname' parameter");
        return false;
    }
    return true;
}

function validateName()
{
    if (! isset($_POST['name'])) {
        header("HTTP/1.0 400 Bad request. Missing 'name' parameter");
        return false;
    }
    return true;
}

function validateFrom()
{
    if (! isset($_POST['from'])) {
        header("HTTP/1.0 400 Bad request. Missing 'from' parameter");
        return false;
    }
    return true;
}

function validateAssetIssuer()
{
    if (! isset($_POST['assetIssuer'])) {
        header("HTTP/1.0 400 Bad request. Missing 'assetIssuer' parameter");
        return false;
    }
    return true;
}

function validateAssetCode()
{
    if (! isset($_POST['assetCode'])) {
        header("HTTP/1.0 400 Bad request. Missing 'assetCode' parameter");
        return false;
    }
    return true;
}

function validateAmount()
{
    if (! isset($_POST['amount'])) {
        header("HTTP/1.0 400 Bad request. Missing 'amount' parameter");
        return false;
    }
    return true;
}

function validateMemo()
{
    if (! isset($_POST['memo'])) {
        header("HTTP/1.0 400 Bad request. Missing 'memo' parameter");
        return false;
    }
    return true;
}

function validateId()
{
    if (! isset($_POST['id'])) {
        header("HTTP/1.0 400 Bad request. Missing 'id' parameter");
        return false;
    }
    return true;
}

function validateAcceptedToS()
{
    if (! isset($_POST['acceptedTos'])) {
        header("HTTP/1.0 400 Bad request. Missing 'acceptedTos' parameter");
        return false;
    }
    return true;
}

function validateCurrentPassword()
{
    if (! isset($_POST['currentPassword'])) {
        header("HTTP/1.0 400 Bad request. Missing 'currentPassword' parameter");
        return false;
    }
    return true;
}