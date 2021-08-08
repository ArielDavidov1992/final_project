<!-- Ariel & yarden -->

<?php
require_once ("dbClass.php");

$db=new dbClass();

$result=$db->getAllBanot();



?>
<!DOCTYPE html>
<html>
	<head>
  
        
	</head>
    <link rel="stylesheet" type="text/css" href="style/AdminCss.css">

     <title id="tadbat">Add bat sherut</title>




	<body>

            <div class="topnav">     <!-- Action bar -->
            <a  href="AddBat.php">Add batsherut</a>
            <a href="searchBat.php">Search batsherut</a>
            <a href="UpdateBat.php">update batsherut</a>
            <a href="AddRacezet.php">Add Racezet</a>
            <a href="Add&searchTekenByGarin.php">Add&search Teken By Garin</a>
            <a href="sendMailToRacezt.php">send a E-mail to racezt</a>
        </div> 
		<div class="title">
			<h1>Add bat sherut</h1>
			<h2>Enter details of batsherut:</h2>
            <form id="search" method="POST" action="">
                
                <label>Name of Gareen</label> <!-- form to insert new batsherut -->
                <input name="NameGareen" type="text" class="searchBatsherut"  required/>
                 <label>Name of Teken</label> 
                 <input name="NameTeken" type="text" class="searchBatsherut"  required/>
                  <label>Id</label> 
                  <input name="Id" type="text" class="searchBatsherut"  required/>
                  <label>First Name</label> 
                  <input name="FirstName" type="text" class="searchBatsherut"  required/>
                  <label>Last Name</label> 
                  <input name="LastName" type="text" class="searchBatsherut"  required/>
                  <label>Phone Number</label> 
                  <input name="PhoneNumber" type="text" class="searchBatsherut"  required/>
                  <label>E-mail</label> 
                  <input name="Email" type="text" class="searchBatsherut"  required/>
                 
                  <input type="submit" name="Add" class="searchBatsherut" value="Add">
                  
                  
			</form>
            <table class="tabelSearch" >
                      <thead>   <!-- show all headlines of details  bnotsherut-->
                          <tr>
                              <th>Name of Gareen</th>
                              <th>Name of Teken</th>
                              <th>Id</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Phone Number</th>
                              <th>Email</th>
                              
                              
                          </tr>
                      </thead> 
                      <tbody id="Tabel_data">
                          <?php
                          require_once ("dbClass.php");
                           require_once("helpFunction.php");
                          foreach($result as $row)
                          {
                              echo //show all details  bnotsherut
                              '<tr>
                                   <td>' . $row->getNameGareen() .'</td>
                                   <td>' . $row->getNameTeken() .'</td>
                                   <td>' . $row->getId() .'</td>
                                   <td>' . $row->getFirstName() .'</td>
                                   <td>' . $row->getLastName() .'</td>
                                   <td>' . $row->getPhoneNumber() .'</td>
                                   <td>' . $row->getEmail().'</td>
                                   
                              </tr>

                              ';

                          }
                          //insert new bat sherut
                          if(isset($_POST['Id'])){
                            $db->InsertBatsherut($_POST['Id'],$_POST['FirstName'],$_POST['LastName'],$_POST['PhoneNumber'],$_POST['Email'],$_POST['NameGareen'],$_POST['NameTeken']);
                           
                            
                          }

                           
                          ?>

                      </tbody>   
                  </table>

           
				
		</div>
        
        
	</body>


</html>

    
    


