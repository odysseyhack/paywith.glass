<?php

class InitializeWalletRequest
{

    var $name;

    var $surname;

    var $address;

    var $city;

    var $postalcode;

    var $country;
    
    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getPostalcode()
    {
        return $this->postalcode;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

}