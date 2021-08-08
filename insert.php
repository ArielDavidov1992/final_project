<?php
require_once ("dbClass.php");
$db=new dbClass();
$banot=$db->InsertBatsherut($_POST['Id'],$_POST['FirstName'],$_POST['LastName'],$_POST['PhoneNumber'],$_POST['Email'],$_POST['NameGareen'],$_POST['NameTeken']);
$output=$db->getAllBanot();

echo json_encode($output);
 

?>