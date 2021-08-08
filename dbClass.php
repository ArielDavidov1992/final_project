<!-- Ariel & yarden -->
<?php
require_once ("bnot_sherut.php");
require_once ("meneger.php");
require_once("garein.php");
require_once("teken.php");
require_once("racazot.php");
class dbClass
{
private $host;
private $db;
private $charset;
private $user;
private $pass;
private $opt = array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
private $connection;

public function __construct(string $host= "localhost", string $db = "achi",string $charset = "utf8", string $user = "root",string $pass = "")
{
$this->host = $host;
$this->db = $db;
$this->charset = $charset;
$this->user = $user;
$this->pass = $pass;
}

private function connect()
{
   $dns = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
   $this->connection = new PDO($dns, $this->user, $this->pass, $this->opt);
}

public function disconnect()
{
     $this->connection = null;
}


// functin to get all details of bnot sherut
public function getAllBanot()
{
   $this->connect();
   $BnotArray = array();
   $result = $this->connection->query("SELECT * FROM bnot_sherut");
   while($row = $result->fetchObject('bnot_sherut')) 
   {
         $BnotArray[] = $row;
       
   }
  $this->disconnect();
  return $BnotArray;
}

// function that get details by name

public function getBatbyName(string $Name)
{
   $this->connect();
   $BnotArray = array();
   $statement = $this->connection->prepare("SELECT * FROM bnot_sherut WHERE  FirstName = :FirstName");
   $statement->execute([':FirstName'=>$Name]);
   while($row = $statement->fetchObject('bnot_sherut')) 
   {
         $BnotArray[] = $row;
       
   }
  $this->disconnect();
  return $BnotArray;
}
//function that get details by Id
public function getBatbyId(int $Id)
{
   $this->connect();
   $BnotArray = array();
   $statement = $this->connection->prepare("SELECT * FROM bnot_sherut WHERE  Id = :Id");
   $statement->execute([':Id'=>$Id]);
   $Bat = $statement->fetchObject('bnot_sherut');
   $this->disconnect();
  return $Bat;
}

// function to insert data to batsrut
public function InsertBatsherut($Id,$FirstName,$LastName,$NumberPhone,$Email,$NameGareen,$NameTeken)
{
   $this->connect();
   $statement = $this->connection->prepare("INSERT INTO bnot_sherut (FirstName, LastName, PhoneNumber, Email, NameGareen, NameTeken, Id) 
   VALUES (:FirstName,:LastName,:NumberPhone,:Email,:NameGareen,:NameTeken,:Id)");
   $statement->execute([':FirstName'=>$FirstName,':LastName'=>$LastName,'NumberPhone'=>$NumberPhone,':Email'=>$Email,
   ':NameGareen'=>$NameGareen,':NameTeken'=>$NameTeken,'Id'=>$Id]);

 $this->disconnect();
}
// function to update data to batsrut
public function UpdateBatsherut(bnot_sherut $bat)
{
   $this->connect();
   $statement = $this->connection->prepare("UPDATE bnot_sherut SET Id=:Id,FirstName=:FirstName,LastName=:LastName,
   PhoneNumber=:PhoneNumber,Email=:Email,NameGareen=:NameGareen,NameTeken=:NameTeken,Passwod=:Passwod WHERE Id = :id");
   $statement->execute([':Id'=>$bat->getId(),':FirstName'=>$bat->getFirstName(),":LastName"=>$bat->getLastName(),
   ':PhoneNumber'=>$bat->getPhoneNumber(),':Email'=>$bat->getEmail(),':NameGareen'=>$bat->getNameGareen(),':NameTeken'=>$bat->getNameTeken(),':Passwod'=>$bat->getPasswod(),':id'=>$bat->getID()]);


 $this->disconnect();
}




// function to get password admin
public function getPassByIdAdmin(int $id)
{
   $this->connect();
   
    $statement = $this->connection->prepare("SELECT * FROM meneger WHERE Id = :id");
    $statement->execute([':id'=>$id]);
   if($result = $statement->fetchObject('meneger'))
   {
      $this->disconnect();
    return $result->getPasswod();
   }
   else
   return null;
   
}
// function to get password racezet
public function getPassByIdRacezet(int $id)
{
   $this->connect();
   
    $statement = $this->connection->prepare("SELECT * FROM racazot WHERE Id = :id");
    $statement->execute([':id'=>$id]);
    if($result = $statement->fetchObject('racazot'))
    {
      $this->disconnect();
    
      return $result->getPasswod();
    }
    else
    return null;
    
    
}
// function to get password bat Sherut
public function getPassByIdBatSherut(int $id)
{
   $this->connect();
   
    $statement = $this->connection->prepare("SELECT * FROM bnot_sherut WHERE Id = :id");
    $statement->execute([':id'=>$id]);
    if($result = $statement->fetchObject('bnot_sherut'))
    {
      $this->disconnect();
    
      return $result->getPasswod();
    }
    else 
    return null;
    
   
}
// function to update password admin
public function UpdateAdminPassword($id,$newPasswod)
{
   $encodedPass=password_hash($newPasswod,PASSWORD_DEFAULT);
   $this->connect();
   $statement = $this->connection->prepare("UPDATE meneger SET Passwod = :newPasswod WHERE Id = :id");
   $statement->execute([':newPasswod'=>$encodedPass,':id'=>$id]);


 $this->disconnect();
}
// function to update password racezet
public function UpdateRaceztPassword($id,$newPasswod)
{
   $encodedPass=password_hash($newPasswod,PASSWORD_DEFAULT);
   $this->connect();
   $statement = $this->connection->prepare("UPDATE racazot SET Passwod = :newPasswod WHERE Id = :id");
   $statement->execute([':newPasswod'=>$encodedPass,':id'=>$id]);


 $this->disconnect();
}
// function to update password racezet
public function UpdateBatSherutPassword($id,$newPasswod)
{
   $encodedPass=password_hash($newPasswod,PASSWORD_DEFAULT);
   $this->connect();
   $statement = $this->connection->prepare("UPDATE bnot_sherut SET Passwod = :newPasswod WHERE Id = :id");
   $statement->execute([':newPasswod'=>$encodedPass,':id'=>$id]);


 $this->disconnect();
}
// function to get All garins
public function getAllGarin()
{
   $this->connect();
   $grinArray = array();
   $result = $this->connection->query("SELECT * FROM garein");
   while($row = $result->fetchObject('garein')) 
   {
         $grinArray[] = $row;
       
   }
  $this->disconnect();
  return $grinArray;
}


// function to get tekens by garin
public function getTekensByGarin(string $garin)
{
   $this->connect();
   $tekenArray = array();
   $statement = $this->connection->prepare("SELECT * FROM teken WHERE  GareinName = :GareinName");
   $statement->execute([':GareinName'=>$garin]);
   while($row = $statement->fetchObject('teken')) 
   {
         $tekenArray[] = $row;
       
   }
  $this->disconnect();
  
  return $tekenArray;
}
// function to insert new racezt
public function InsertRacezet($Id,$FirstName,$LastName,$NumberPhone,$Email)
{
   $this->connect();
   $statement = $this->connection->prepare("INSERT INTO racazot (FirstName, LastName, PhoneNumber, Email, Id) 
   VALUES (:FirstName,:LastName,:NumberPhone,:Email,:Id)");
   $statement->execute([':FirstName'=>$FirstName,':LastName'=>$LastName,'NumberPhone'=>$NumberPhone,':Email'=>$Email,
   'Id'=>$Id]);

 $this->disconnect();
}
// function to get all racazot
public function getAllRacazot()
{
   $this->connect();
   $RaczotArray = array();
   $result = $this->connection->query("SELECT * FROM racazot");
   while($row = $result->fetchObject('racazot')) 
   {
         $RaczotArray[] = $row;
       
   }
  $this->disconnect();
  return $RaczotArray;
}
// function to insert new teken to garin
public function InsertTekenToGarin($TekenName,$GareinName)
{
   $this->connect();
   $statement = $this->connection->prepare("INSERT INTO teken (TekenName,GareinName) 
   VALUES (:TekenName,:GareinName)");
   $statement->execute([':TekenName'=>$TekenName,':GareinName'=>$GareinName]);

 $this->disconnect();
}
// function to update racezet data
public function UpdateRacezet(racazot $rac)
{
   $this->connect();
   $statement = $this->connection->prepare("UPDATE racazot SET Id=:Id,FirstName=:FirstName,LastName=:LastName,
   PhoneNumber=:PhoneNumber,Email=:Email,Passwod=:Passwod WHERE Id = :id");
   $statement->execute([':Id'=>$rac->getId(),':FirstName'=>$rac->getFirstName(),":LastName"=>$rac->getLastName(),
   ':PhoneNumber'=>$rac->getPhoneNumber(),':Email'=>$rac->getEmail(),':Passwod'=>$rac->getPasswod(),':id'=>$rac->getId()]);


 $this->disconnect();
}
// function to get racezet by id
public function getRacezetbyId(int $Id)
{
   $this->connect();
   $RaczotArray = array();
   $statement = $this->connection->prepare("SELECT * FROM racazot WHERE  Id = :Id");
   $statement->execute([':Id'=>$Id]);
   $Rac = $statement->fetchObject('racazot');
   $this->disconnect();
  return $Rac;
}
//function to get racezet by full name
public function getRacezetbyFullName(string $FirstName,string $LastName)
{
   $this->connect();
   
   $statement = $this->connection->prepare("SELECT * FROM racazot WHERE FirstName= :FirstName  AND LastName= :LastName");
   $statement->execute([':FirstName'=>$FirstName,':LastName'=>$LastName]);
   $Rac = $statement->fetchObject('racazot');
   $this->disconnect();
  return $Rac;
}




}

?>