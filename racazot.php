<?php
//Ariel &yarden
require_once "user.php";
class racazot extends User
{
    
    

    

    public function toString()
    {
        return $this->getFirstName()." ".$this->getLastName();
    }
   }
?>