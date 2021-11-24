<?php

//Ariel &yarden
require_once ("dbClass.php");
if(isset($_POST['Id'])){
    checkPassword((int)$_POST['Id'],$_POST['PassWord']);
}
function writeToFile($data,$fileName) //function to  write File 
{
	
    $file = fopen("sendFiles\\".$fileName,"a");
    if($file != false)
    {
	fputs($file, $data."\n");
        fclose($file);
    }
}
function checkPassword(int $Id,string $Pass) //function to check password
{
    
     $db= new dbClass();
  if($incriptPass=$db->getPassByIdAdmin((int)$Id)) 
   {
     
    if(password_verify((string)$Pass,$incriptPass))    
    {
        echo "The pessword is good"."<br>";
        header('Location: AddBat.php');
    }
    else
    echo "The password Incorrect";

   }
   if($incriptPass=$db->getPassByIdRacezet((int)$Id))
   {
    if(password_verify((trim($Pass)),$incriptPass))    
    {
        echo "The pessword is good"."<br>";
        session_start();
        $_SESSION['idRacezt'] = $Id;
        header('Location: hours_report.php');
    }
    else
    echo "The password Incorrect";
   }
   if($incriptPass=$db->getPassByIdBatSherut((int)$Id))
   {
    if(password_verify((string)$Pass,$incriptPass))    
    {
        echo "The pessword is good"."<br>";
      
        $_SESSION['id'] = $Id;
        header('Location: activities_report.php');
    }
    else
    echo "The password Incorrect";
   }
   
    
     


}





?>


