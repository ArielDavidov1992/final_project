<?php
require_once "user.php";
class Bat_sherut extends User
{
    private $GareinName;
    private $TekenName;
    private $Activities;

    function __construct($ID,$FirstName,$LastName,$E_mail,$PhoneNumber,$PassWord,$GareinName,$TekenName) {
        parent::__construct($ID,$FirstName,$LastName,$E_mail,$PhoneNumber,$PassWord);
        $this->GareinName=$GareinName;
        $this->TekenName=$TekenName;
        $this->Activities=null;
        
    }

    public function get_GareinName()
    {
        return $this->GareinName;
    }
    public function set_GareinName($newGareinName)
    {
        $this->GareinName=$newGareinName;
    }

    public function get_TekenName()
    {
        return $this->TekenName;
    }
    public function set_TekenName($newTekenName)
    {
        $this->TekenName=$newTekenName;
    }

    public function toString()
    {
        return $this->get_FirstName()." ".$this->get_LastName();
    }
   


}
?>
