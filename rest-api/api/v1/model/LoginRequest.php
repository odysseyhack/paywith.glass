<?php

class LoginRequest
{

    var $username;

    var $passwordHash;

    public function __construct($username, $passwordHash)
    {
        $this->username = $username;
        $this->passwordHash = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }
}