<?php

class ProfileRequest { 
    var $personalText; 
    
    var $dateOfBirth;
    
    var $location;
    
    var $gender; 
    
    var $signature;
    
    /**
     * @return mixed
     */
    public function getPersonalText()
    {
        return $this->personalText;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param mixed $personalText
     */
    public function setPersonalText($personalText)
    {
        $this->personalText = $personalText;
    }

    /**
     * @param mixed $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @param mixed $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

}