<?php

interface UserValidationFunctionsInterface
{

    public function validateEmail();

    public function validateUsername();

    public function validateName();

    public function validateSurname();

    public function validateCurrentPassword();
}