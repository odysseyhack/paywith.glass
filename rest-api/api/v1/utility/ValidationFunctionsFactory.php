<?php


class ValidationFunctionsFactory implements IValidationFunctionsFactory
{

    public static function create(): ValidationFunctionsInterface
    {
        return ValidationFunctionsFactory::create();
    }
}