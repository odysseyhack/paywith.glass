<?php

class RegistrationRequest implements JsonSerializable
{

    var $acceptedTos;

    var $username;

    var $email;

    var $allowOtherUsersToEmailMe;

    var $passwordHash;

    var $verificationUrl;

    public static function createForInitializeRegistration($acceptedTos)
    {
        $instance = new self();
        $instance->acceptedTos = $acceptedTos;
        return $instance;
    }

    public static function createForSubmitRegistration($acceptedTos, $userName, $email, $allowOtherUsersToEmailMe, $passwordHash, $verificationUrl)
    {
        $instance = new self();
        $instance->acceptedTos = $acceptedTos;
        $instance->userName = $userName;
        $instance->email = $email;
        $instance->allowOtherUsersToEmailMe = $allowOtherUsersToEmailMe;
        $instance->passwordHash = $passwordHash;
        $instance->verificationUrl = $verificationUrl;
        return $instance;
    }

    public function __construct()
    {}

    /**
     *
     * @return mixed
     */
    public function getAcceptedTos()
    {
        return $this->acceptedTos;
    }

    /**
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     *
     * @return mixed
     */
    public function getEmailAddres()
    {
        return $this->emailAddres;
    }

    /**
     *
     * @return mixed
     */
    public function getAllowOtherUsersToEmailMe()
    {
        return $this->allowOtherUsersToEmailMe;
    }

    /**
     *
     * @return mixed
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     *
     * @return mixed
     */
    public function getVerificationUrl()
    {
        return $this->verificationUrl;
    }

    /**
     *
     * @param mixed $acceptedTos
     */
    public function setAcceptedTos($acceptedTos)
    {
        $this->acceptedTos = $acceptedTos;
    }

    /**
     *
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     *
     * @param mixed $emailAddres
     */
    public function setEmailAddres($emailAddres)
    {
        $this->emailAddres = $emailAddres;
    }

    /**
     *
     * @param mixed $allowOtherUsersToEmailMe
     */
    public function setAllowOtherUsersToEmailMe($allowOtherUsersToEmailMe)
    {
        $this->allowOtherUsersToEmailMe = $allowOtherUsersToEmailMe;
    }

    /**
     *
     * @param mixed $passwordHash
     */
    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     *
     * @param mixed $verificationUrl
     */
    public function setVerificationUrl($verificationUrl)
    {
        $this->verificationUrl = $verificationUrl;
    }

    public function jsonSerialize()
    {}
}