<!-- Ariel & yarden -->
<?php
require_once ("dbClass.php");

$db=new dbClass();

$result=$db->getAllRacazot();



?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add racezet</title>
		
	</head>
    <link rel="stylesheet" type="text/css" href="style/AdminCss.css">


	<body>
    <div class="topnav">   <!-- Action bar -->
            <a  href="AddBat.php">Add batsherut</a>
            <a href="searchBat.php">Search batsherut</a>
            <a href="UpdateBat.php">update batsherut</a>
            <a href="AddRacezet.php">Add Racezet</a>
            <a href="Add&searchTekenByGarin.php">Add&search Teken By Garin</a>
            <a href="sendMailToRacezt.php">send a E-mail to racezt</a>
        </div> 
		<div class="title">
			<h1>Add new racezet</h1>
			<h2>Enter details of racezet:</h2>
            <form id="search" method="POST" action="">
                
               <!-- Form to add new racezet -->
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
            <table class="tabelSearch">
                      <thead>
                          <tr>   <!-- show all headlines of details-->
                              
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
                          foreach($result as $row)  //show all details
                          {
                              echo 
                              '<tr>   
                                  
                                   <td>' . $row->getId() .'</td>
                                   <td>' . $row->getFirstName() .'</td>
                                   <td>' . $row->getLastName() .'</td>
                                   <td>' . $row->getPhoneNumber() .'</td>
                                   <td>' . $row->getEmail().'</td>
                                   
                              </tr>

                              ';

                          }
                         // insert new Racezet
                          if(isset($_POST['Id'])&&isset($_POST['FirstName'])&&isset($_POST['LastName'])&&isset($_POST['PhoneNumber'])&&isset($_POST['Email'])){
                            $db->InsertRacezet($_POST['Id'],$_POST['FirstName'],$_POST['LastName'],$_POST['PhoneNumber'],$_POST['Email']);
                            
                          }

                           
                          ?>

                      </tbody>   
                  </table>

           
				
		</div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="title">
			<h3>Update details for a Racezet:</h3>
            
            <form id="search" method="POST" action="">  <!-- Form to update racezet-->
                  <label>Enter id of racezet:</label>
                  
                  <input name="Id" type="text" class="searchBatsherut"  required/>
                  <label>Choose which entry you want to update:</label>
                  <select name="details" id="detailsBanot">
                  
                  <option value="FirstName">First Name</option>
                  <option value="LastName">Last Name</option>
                  <option value="PhoneNumber">Phone Number</option>
                  <option value="Email">Email</option>
                  
                  <option value="Passwod">Password</option>
                  </select> 
                  <label>Enter the new value:</label>
                  <input name="val" type="text" class="searchBatsherut"  required/>
                  <input type="submit" name="btnSearch" class="searchBatsherut" value="Update">
            </form> 
            
                              
                              
                        
                      
                          <?php
                          require_once ("dbClass.php");
                          $db=new dbClass();
                          if(isset($_POST['Id'])&&isset($_POST['details'])&&isset($_POST['val'])){ //update racezet by id
                            $rac=$db->getRacezetbyId($_POST['Id']);
                            $choice="set".$_POST['details'];
                            $rac->$choice($_POST['val']); //set the new value
                            $db->UpdateRacezet($rac);
                           // show after update
                            echo '<table class="tabelSearch">
                            <thead>
                            <tr>
                            
                             <th>Id</th>
                             <th>First Name</th>
                             <th>Last Name</th>
                             <th>Phone Number</th>
                             <th>Email</th> 
                             </tr>
                             <tr>
                                  
                                   <td>' . $rac->getId() .'</td>
                                   <td>' . $rac->getFirstName() .'</td>
                                   <td>' . $rac->getLastName() .'</td>
                                   <td>' . $rac->getPhoneNumber() .'</td>
                                   <td>' . $rac->getEmail().'</td>
                             </tr>
                             </thead> 
                             </table>';
                            
                          }  
                                
                         ?>

                  
        </div>
        
        
	</body>


</html>