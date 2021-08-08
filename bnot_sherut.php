
<!-- Ariel & yarden -->
<?php
require_once "user.php";
class bnot_sherut extends User
{
     protected $NameGareen;
    protected $NameTeken;
    
 
    
    
    public function getNameGareen()
    {
        return $this->NameGareen;
    }
    public function setNameGareen($newNameGareen)
    {
        $this->NameGareen=$newNameGareen;
    }

    public function getNameTeken()
    {
        return $this->NameTeken;
    }
    public function setNameTeken($newNameTeken)
    {
        $this->NameTeken=$newNameTeken;
    }
   

   
   


}
?>
