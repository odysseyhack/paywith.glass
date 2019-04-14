<?php


class UserValidationFunctionsFactory implements IUserValidationFunctionsFactory
{

    public static function create(): UserValidationFunctionsInterface
    {
        return UserValidationFunctionsFactory::create();
    }
}