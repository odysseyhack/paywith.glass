<?php
require_once 'UserValidationFunctionsInterface.php';


class UserValidationFunctions implements UserValidationFunctionsInterface
{

    function validateEmail()
    {
        if (! isset($_POST['username'])) {
            header("HTTP/1.0 400 Bad request. Missing 'username' parameter");
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

    function validateName()
    {
        if (! isset($_POST['name'])) {
            header("HTTP/1.0 400 Bad request. Missing 'name' parameter");
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

    function validateCurrentPassword()
    {
        if (! isset($_POST['currentPassword'])) {
            header("HTTP/1.0 400 Bad request. Missing 'currentPassword' parameter");
            return false;
        }
        return true;
    }
}