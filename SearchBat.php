
<!-- Ariel & yarden -->

<!DOCTYPE html>
<html>
	<head>
		<title>Add bat sherut</title>
		

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
			<h1>Search BatSherut:</h1>
            <h2>Enter details of batsherut:</h2>
            <form id="search" method="POST" action="">  <!-- Form to search bat serut by name -->
                  <label>First Name</label> 
                  <input name="FirstName" type="text" class="searchBatsherut"  required/>
                  <input type="submit" name="btnSearch" class="searchBatsherut" value="Search">
            </form> 
            
                              
                              
                        
                      <tbody id="Tabel_data">
                          <?php
                          require_once ("dbClass.php");
                          require_once("helpFunction.php");
                          $db=new dbClass();
                          if(isset($_POST['FirstName'])){ // show headline 
                            $result=$db->getBatbyName($_POST['FirstName']);
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
                             </thead> 
                             </table>';
                            foreach($result as $row) // show the banot details
                            {
                                echo '<table class="tabelSearch">
                               
                                
                                    <tr>
                                     <td>' . $row->getNameGareen() .'</td>
                                     <td>' . $row->getNameTeken() .'</td>
                                     <td>' . $row->getId() .'</td>
                                     <td>' . $row->getFirstName() .'</td>
                                     <td>' . $row->getLastName() .'</td>
                                     <td>' . $row->getPhoneNumber() .'</td>
                                     <td>' . $row->getEmail().'</td>
                                    
                                   </tr>
                                </table>

                            
                                
                                 ';
                                 




                                 
  
                            }
                          }
                         
                          
                         ?>
                          

                  
        </div>
        

    </body> 
</html>      
