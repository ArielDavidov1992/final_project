<?php
session_start();

?>
<!DOCTYPE html>
<html lang="hi">
	<head>
    <meta charset="UTF-8">
		<title>עדכון פרטים אישיים</title>
        <link rel="stylesheet" type="text/css" href="activityCss.css">

	</head>
    


	<body>
    <div class="topnav">
        <a href="activities_report.php">דוח פעילויות</a>
        <a href="updatepersonaldataBat.php">עדכון פרטים אישיים</a>
     </div> 
		<div class="title">
			<h1>עדכון פרטים אישיים</h1>
            
            <form class="search1" method="POST" action="">
                  
                  
                  
                  <label>בחרי איזה מידע ברצונך לעדכן:</label>
                  

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

                  <label>הכניסי ערך חדש:</label>
                  <input name="val" type="text" class="searchBatsherut"  required/>
                  <input type="submit" name="btnSearch" class="searchBatsherut" value="עדכן">
</div>
            </form> 
            
                              
                        
                      
                          <?php
                          require_once ("dbClass.php");
                          $db=new dbClass();
                          if(isset($_SESSION['id'])&&isset($_POST['details'])&&isset($_POST['val'])){
                            $Bat=$db->getBatbyId($_SESSION['id']); //get the bat fron DB by id
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