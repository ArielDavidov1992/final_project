<?php
class User
{
    private $ID;
    private $FirstName;
    private $LastName;
    private $E_mail;
    private $PhoneNumber;
    private $PassWord;


    public function __construct($ID,$FirstName,$LastName,$E_mail,$PhoneNumber,$PassWord)
    {
        $this->ID=$ID;
        $this->FirstName=$FirstName;
        $this->LastName=$LastName;
        $this->E_mail=$E_mail;
        $this->PhoneNumber=$PhoneNumber;
        $this->PassWord=$PassWord;
    }

   public function get_ID()
    {
        return $this->ID;
    }
    public function set_ID($ID)
    {
        $this->ID=$ID;
    }

   public function get_FirstName()
    {
        return $this->FirstName;
    }
    public function set_FirstName($FirstName)
    {
        $this->FirstName=$FirstName;
    }

    public function get_LastName()
    {
        return $this->LastName;
    }
    public function set_LastName($LastName)
    {
        $this->LastName=$LastName;
    }

    public function get_E_mail()
    {
        return $this->E_mail;
    }
    public function set_E_mail($E_mail)
    {
        $this->E_mail=$E_mail;
    }

    public function get_PhoneNumber()
    {
        return $this->PhoneNumber;
    }
    public function set_PhonNumber($PhoneNumber)
    {
        $this->PhoneNumber=$PhoneNumber;
    }

    public function set_Password($newPassWord)
    {
        $this->PassWord=$newPassWord;
    }

}

?>