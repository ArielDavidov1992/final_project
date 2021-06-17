<?php
require_once "user.php";
class User_admin extends User
{

    private $workHours;

    function __construct($ID,$FirstName,$LastName,$E_mail,$PhoneNumber,$PassWord) {
        parent::__construct($ID,$FirstName,$LastName,$E_mail,$PhoneNumber,$PassWord);
        
       
        $this->workHours=null;
        
    }


    

    public function toString()
    {
        return $this->get_FirstName()." ".$this->get_LastName();
    }
   


}
?>