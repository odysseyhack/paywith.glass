<?php

class SecuritySettingsRequest
{

    var $name;

    var $email;

    var $currentPassword;

    var $newPassword;

    var $confirmNewPassword;

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCurrentPassword()
    {
        return $this->currentPassword;
    }

    public function getNewPassword()
    {
        return $this->newPassword;
    }

    public function getConfirmNewPassword()
    {
        return $this->confirmNewPassword;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setCurrentPassword($currentPassword)
    {
        $this->currentPassword = $currentPassword;
    }

    public function setNewPassword($newPassword)
    {
        $this->newPassword = $newPassword;
    }

    public function setConfirmNewPassword($confirmNewPassword)
    {
        $this->confirmNewPassword = $confirmNewPassword;
    }
}