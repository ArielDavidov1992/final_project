
<!-- Ariel & yarden -->
<?php
require_once ("dbClass.php");
require_once("helpFunction.php");

$db=new dbClass(); //get all garinim

$result=$db->getAllGarin();




?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add and Search tekens by garin</title>
		
	</head>
    <link rel="stylesheet" type="text/css" href="style/AdminCss.css">


	<body>
    <div class="topnav"> <!-- Action bar -->
            <a  href="AddBat.php">Add batsherut</a>
            <a href="searchBat.php">Search batsherut</a>
            <a href="UpdateBat.php">update batsherut</a>
            <a href="AddRacezet.php">Add Racezet</a>
            <a href="Add&searchTekenByGarin.php">Add and Search tekens by garin</a>
            <a href="sendMailToRacezt.php">send a E-mail to racezt</a>
        </div> 
		<div class="title">
			<h1>Search tekens by garin</h1>
			<h2>Enter name of garin:</h2>
            <form id="search" method="POST" action="Add&searchTekenByGarin.php">
                
               
                  <label>Enter garin:</label> 
                  <select name="GareinName">
                  
                   <?php
                       //get all garins

                 for($i=0;$i<count($result);$i++)
                 {
                     echo "<option value='". $result[$i]->getGareinName() ."'>" . $result[$i]->getGareinName()."</option>";  // displaying data in option menu
                 }	
                 ?>  
                 </select>
                 
                 
                  <input type="submit" name="search" class="searchBatsherut" value="search">
                  
                  
			</form>
            
                          <?php
                          require_once ("dbClass.php");
                          $db=new dbClass();
                          
                          if(isset($_POST['GareinName'])){

                           $Garin=$_POST['GareinName'];
                            $Tknim=$db->getTekensByGarin($Garin);
                            echo '<table class="tabelSearch">
                            <thead>
                            <tr>
                            <th>Name of Tekens</th>
                             
                             </thead> 
                             </table>';
                            foreach($Tknim as $row)  //show all tekens of the garin
                            {
                                echo '<table class="tabelSearch">
                               
                                
                                    <tr>
                                     
                                     <td>' . $row->getTekenName() .'</td>
                                     
                                     
                                </tr>
                                </table>
                                
                                
  
                                ';
  
                            }
                            

                        }
                          
                         
                          ?>
            
           
            <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        		
		</div>
        <br>
        <br>
        <div class="title">
			<h3>Add teken to garin</h3>   <!-- Add new teken to garin -->
			
            <form id="add" method="POST" action="Add&searchTekenByGarin.php">
                
                <input name="TekenName" type="text" class="searchBatsherut"  required/>  
                <label>Select garin:</label> 
                <select name="GareinName">
                
                 <?php
                    

               for($i=0;$i<count($result);$i++) //show all garins
               {
                   echo "<option value='". $result[$i]->getGareinName() ."'>" . $result[$i]->getGareinName()."</option>";  // displaying data in option menu
               }	
               ?>  
               </select>
               <input type="submit" name="search" class="searchBatsherut" value="Add">
                  
                  
                  </form>

            <?php 
           
            if(isset($_POST['TekenName'])){ //insert new teken to garin
               
                $db->InsertTekenToGarin($_POST['TekenName'],$_POST['GareinName']);
            }
            
            ?>
        </div>
        
	</body>


</html>