<!DOCTYPE html>
<html>
	<head>
		<title>Send E-mail to racezet</title>
		

	</head>
    <link rel="stylesheet" type="text/css" href="style/AdminCss.css">


	<body>
    <div class="topnav"> <!-- Action bar -->
            <a  href="AddBat.php">Add batsherut</a>
            <a href="searchBat.php">Search batsherut</a>
            <a href="UpdateBat.php">update batsherut</a>
            <a href="AddRacezet.php">Add Racezet</a>
            <a href="Add&searchTekenByGarin.php">Add&search Teken By Garin</a>
            <a href="sendMailToRacezt.php">send a E-mail to racezt</a>
     </div> 
		<div class="title">  <!-- form to send email for racezet by full name -->
			<h1>Enter a racezet full name:</h1>
            <h2>Enter sunject and the body of E-mail:</h2>
            <form id="search" method="POST" action="">
                  <label>First Name:</label> 
                  <input name="FirstName" type="text" class="searchBatsherut"  required/>
                  <label>Last Name:</label>
                  <input name="LastName" type="text" class="searchBatsherut"  required/>
                  <br>
                  <label>sunject of the message:</label>
                  <input name="sunject" type="text" class="searchBatsherut"  required/>
                  <label>body of the message:</label>
                  <input name="bodyM" type="text" class="searchBatsherut"  required/>

                  <input type="submit" name="btnSearch" class="searchBatsherut" value="Send">
            </form> 
            
                              
                              
                        
                      <tbody id="Tabel_data">
                          <?php
                          require_once ("dbClass.php");
                          require_once("helpFunction.php");
                          $db=new dbClass();
                         
                            
                            if(isset($_POST['sunject'])&&isset($_POST['bodyM'])&&isset($_POST['FirstName'])&&isset($_POST['LastName'])){
                                $result=$db->getRacezetbyFullName($_POST['FirstName'],$_POST['LastName']);
                                $to = $result->getEmail(); // write here TO address instead somebody@to_mail
                                $subject = $_POST['sunject'];
                                $message = $_POST['bodyM'];
                                // send email and save file txt of the message
                                $headers = 'From: achi@gmail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                               if (mail($to, $subject, $message, $headers)){
                                   echo "the email send!";
                                   writeToFile($message,$result->getFirstName().$result->getLastName().date("Y-m-d"));
                               }
                               else
                               echo "the email does not send ";
                                
                                
                              }
                            
                          
                          
                         ?>
                          

                  
        </div>
        

    </body> 
</html>  