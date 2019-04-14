<?php

interface ValidationFunctionsInterface
{

    public function isOtherUserEmailAllowed();

    public function validateVerificationCode();

    public function validatePasswordHash();

    public function validateCountry();

    public function validatePostalcoded();

    public function validateCity();

    public function validateAddress();

    public function validateFrom();

    public function validateAssetIssuer();

    public function validateAssetCode();

    public function validateAmount();

    public function validateMemo();

    public function validateId();

    public function validateAcceptedToS();
}