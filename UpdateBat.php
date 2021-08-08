<!DOCTYPE html>
<html>
	<head>
		<title>Add bat sherut</title>

	</head>
    <link rel="stylesheet" type="text/css" href="style/AdminCss.css">


	<body>
    <div class="topnav">
            <a  href="AddBat.php">Add batsherut</a>
            <a href="searchBat.php">Search batsherut</a>
            <a href="UpdateBat.php">Update batsherut</a>
            <a href="AddRacezet.php">Add Racezet</a>
            <a href="Add&searchTekenByGarin.php">Add&search Teken By Garin</a>
     </div> 
		<div class="title">
			<h1>Update details for a BatSherut:</h1>
            
            <form class="search1" method="POST" action="">
                  <label>Enter id of batsherut:</label>
                  
                  <input name="Id" type="text" id="searchBatsherutu"  required/>
                  <label>Choose which entry you want to update:</label>
                  

                  <select name="details" id="detailsBanot">
                  <option value="Id">Id</option>

                  <option value="FirstName">First Name</option>
                  <option value="LastName">Last Name</option>
                  <option value="PhoneNumber">Phone Number</option>
                  <option value="Email">Email</option>
                  <option value="NameGareen">Gareen Name</option>
                  <option value="NameTeken">Teken Name</option>
                  <option value="Passwod">Password</option>

                  </select>

                  <label>Enter the new value:</label>
                  <input name="val" type="text" class="searchBatsherut"  required/>
                  <input type="submit" name="btnSearch" class="searchBatsherut" value="Update">
</div>
            </form> 
            
                              
                        
                      
                          <?php
                          require_once ("dbClass.php");
                          $db=new dbClass();
                          if(isset($_POST['Id'])){
                            $Bat=$db->getBatbyId($_POST['Id']); //get the bat fron DB by id
                            $choice="set".$_POST['details'];
                            $Bat->$choice($_POST['val']); //set the new value
                            $db->UpdateBatsherut($Bat);
                         //creat table after the update
                            echo '<table class="tabelSearch"> 
                            <thead>
                            <tr>
                            <th>Name of Gareen</th>
                             <th>Name of Teken</th>
                             <th>Id</th>
                             <th>First Name</th>
                             <th>Last Name</th>
                             <th>Phone Number</th>
                             <th>Email</th> 
                             </tr>
                             <tr>
                                   <td>' . $Bat->getNameGareen() .'</td>
                                   <td>' . $Bat->getNameTeken() .'</td>
                                   <td>' . $Bat->getId() .'</td>
                                   <td>' . $Bat->getFirstName() .'</td>
                                   <td>' . $Bat->getLastName() .'</td>
                                   <td>' . $Bat->getPhoneNumber() .'</td>
                                   <td>' . $Bat->getEmail().'</td>
                             </tr>
                             </thead> 
                             </table>';
                            
                          }  
                                
                         ?>

                  
        </div>
    </body> 
</html>   