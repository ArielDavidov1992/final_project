<?php
class User
{
    protected $Id;
    protected $FirstName;
    protected $LastName;
    protected $PhoneNumber;
    protected $Email;
    protected $Passwod;


    

   public function getId()
    {
        return $this->Id;
    }
    public function setId($ID)
    {
        $this->Id=$ID;
    }

   public function getFirstName()
    {
        return $this->FirstName;
    }
    public function setFirstName($newFirstName)
    {
        $this->FirstName=$newFirstName;
    }

    public function getLastName()
    {
        return $this->LastName;
    }
    public function setLastName($newLastName)
    {
        $this->LastName=$newLastName;
    }

    public function getEmail()
    {
        return $this->Email;
    }
    public function setEmail($newEmail)
    {
        $this->Email=$newEmail;
    }

    public function getPhoneNumber()
    {
        return $this->PhoneNumber;
    }
    public function setPhoneNumber($newPhoneNumber)
    {
        $this->PhoneNumber=$newPhoneNumber;
    }
    public function getPasswod(){
        return $this->Passwod;
    }

    public function setPasswod($newPassWord)
    {
        $this->Passwod=$newPassWord;
    }

}

?>