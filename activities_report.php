
<html lang="hi">

    <head>
        <meta charset="UTF-8">
        
        
		
        <title>דוח פעילויות חודשי</title>
        <link rel="stylesheet" type="text/css" href="activityCss.css">
       
     </head>
     <body>
        
         <div class="topHeader">
            <h1>אח"י-אחדות חברת ישראל</h1>
			<h2>דיווח פעילויות </h2>
        </div>
        <div class="topnav">
        <a href="activities_report.php">דוח פעילויות</a>
        <a href="updatepersonaldataBat.php">עדכון פרטים אישיים</a>
        </div>  
      
        <br>
        <table id='tabActivity'> 
        <form id='adtivity' method='POST' action=''>
        <input name='saveDetails' type='submit' class='TimeField'  value='שמור נתונים'>
        <tr><td>יום</td><th>תאריך</td><th>כיתה</td><td>מקום הפעילות</td><td>נושא הפעילות</td><td>שעת התחלה</td><td>שעת סיום</td><td>מספר משתתפים</td></tr>
       

         
     

<?php
 require_once ("dbClass.php");
 require_once("helpFunction.php");
 require_once("activity_class.php");
$db=new dbClass();
$Date=date("d-m-Y"); //define the date
$firstDay=date("01-m-Y");
$firstDayInWeek=date("w",strtotime($firstDay));
$lastDay=date("t");
$temp=$db->getDatesById(41257,$firstDay);
if($temp==false)
{
    for($i=1;$i<=$lastDay;$i++)
 {
    $db->InsertActiv(41257,date('d-m-Y', strtotime(date(''.$i.'-m-Y'))),0,0,0,0,0,0);
        
 }

}

$AllActivities=$db-> getactivitiesById(41257);

$multiDay=array();
$multiDay=["ראשון","שני","שלישי","רביעי","חמישי","שישי","שבת"];
$flag=$firstDayInWeek;



for($i=1;$AllActivities[$i-1]->getDate()<=$lastDay;$i++) //diseble the table
{
    
        echo 
        "<tr><td>".$multiDay[$flag]."</td>
        <td>" .date($i."-m-y"). "</td>
        <td><input type='text' class='TimeField' name='class".$i."' placeholder='".$AllActivities[$i-1]->getClass()."'></td>
        <td><input type='text' class='TimeField' name='place".$i."' placeholder='".$AllActivities[$i-1]->getPlaceOfActivity()."'></td>
        <td><input type='text' class='TimeField' name='topic".$i."' placeholder='".$AllActivities[$i-1]->getTopicActivity()."'></td>
        <td><input type='text' class='TimeField' name='start".$i."' placeholder='".$AllActivities[$i-1]->getStartTime()."'></td>
        <td><input type='text' class='TimeField' name='end".$i."' placeholder='".$AllActivities[$i-1]->getEndTime()."'></td>
        <td><input type='text' class='TimeField' name='participants".$i."' placeholder='".$AllActivities[$i-1]->getNumberOfStudents()."'></td></tr>";
        $flag++;
        if($flag==7)
        $flag=0;
        
    
 
}
for(;$i<=$lastDay;$i++)
{
    echo 
    "<tr><td>".$multiDay[$flag]."</td>
    <td>" .date($i."-m-y"). "</td>
    <td><input type='text' class='TimeField' name='class".$i."'></td>
    <td><input type='text' class='TimeField' name='place".$i."'></td>
    <td><input type='text' class='TimeField' name='topic".$i."'></td>
    <td><input type='text' class='TimeField' name='start".$i."'></td>
    <td><input type='text' class='TimeField' name='end".$i."'></td>
    <td><input type='text' class='TimeField' name='participants".$i."'></td></tr>";
    $flag++;
    if($flag==7)
    $flag=0;
}
echo "</form></table>";
      




for($i=1;$i<=$lastDay;$i++) //update the data in the DB
{
    
    if($_POST['class'.$i]!=""){
        
        $db->UpdateActiv(41257,date('d-m-Y', strtotime(date(''.$i.'-m-Y'))),$_POST['class'.$i],$_POST['place'.$i],$_POST['topic'.$i],$_POST['participants'.$i],$_POST['start'.$i],$_POST['end'.$i]);
        
    }
}
    

  
    



?>

</body>
</html>