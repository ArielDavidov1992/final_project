<?php
require_once "user.php";
class Rakezet extends User
{
    private $GareinName;
    private $workHours;

    function __construct($ID,$FirstName,$LastName,$E_mail,$PhoneNumber,$PassWord,$GareinName) {
        parent::__construct($ID,$FirstName,$LastName,$E_mail,$PhoneNumber,$PassWord);
        $this->GareinName=$GareinName;
       
        $this->workHours=null;
        
    }

    public function get_GareinName()
    {
        return $this->GareinName;
    }
    public function set_GareinName($newGareinName)
    {
        $this->GareinName=$newGareinName;
    }

    

    public function toString()
    {
        return $this->get_FirstName()." ".$this->get_LastName();
    }
   


}
?>