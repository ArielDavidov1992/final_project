<html lang="hi">

    <head>
        <meta charset="UTF-8">
        
        
		
        <title>דוח שעות חודשי</title>
        <link rel="stylesheet" type="text/css" href="activityCss.css">
       
     </head>
     <body>
        
         <div class="topHeader">
            <h1>אח"י-אחדות חברת ישראל</h1>
			<h2>דוח שעות </h2>
        </div>
        <div class="topnav">
        <a href="hours_report.php">דוח שעות</a>
        <a href="">עדכון פרטים אישיים</a>
        </div>  
      
        <br>
        <table id='tabHours'> 
        <form id='hours' method='POST' action=''>
        <input name='saveDetails' type='submit' class='TimeField'  value='שמור נתונים'>
        <tr><td>יום</td><th>תאריך</td><th>שעת כניסה</td><td>שעת יציאה</td><td>היעדרות</td><td>צירוף קובץ</td></tr>
       

         
     

<?php
 session_start();
 require_once ("dbClass.php");
 require_once("helpFunction.php");
 require_once("hours_class.php");

$db=new dbClass();
$Date=date("d-m-Y"); //define the date
$firstDay=date("01-m-Y");
$firstDayInWeek=date("w",strtotime($firstDay));
$lastDay=date("t");
$temp=$db->getDatesByIdRac($_SESSION['idRacezt'],$firstDay);
if($temp==false)
{
    for($i=1;$i<=$lastDay;$i++)
 {
    $db->InsertDay($_SESSION['idRacezt'],date('d-m-Y', strtotime(date(''.$i.'-m-Y'))),0,0);
        
 }

}

$AllDays=$db-> getdaysByIdOfThisMonth($_SESSION['idRacezt'],'%-'.date('m').'-%');

$multiDay=array();
$multiDay=["ראשון","שני","שלישי","רביעי","חמישי","שישי","שבת"];
$flag=$firstDayInWeek;



for($i=1;$AllDays[$i-1]->getDate()<=$lastDay;$i++) //diseble the table
{
    
        echo 
        "<tr><td>".$multiDay[$flag]."</td>
        <td>" .date($i."-m-y"). "</td>
        <td><input type='text' class='TimeField' name='StartTime".$i."' placeholder='".$AllDays[$i-1]->getStartTime()."'></td>
        <td><input type='text' class='TimeField' name='EndTime".$i."' placeholder='".$AllDays[$i-1]->getEndTime()."'></td>
        <td><select name='absence' class='TimeField'> <option value='sick'>מחלה</option><option value='vacation'>חופשה</option><option value='sickChild'>מחלת ילד</option></select>></td>
        <td><input type='file' class='TimeField' name='myfile'></td>";
        $flag++;
        if($flag==7)
        $flag=0;
        
    
 
}
for(;$i<=$lastDay;$i++)
{
    echo 
    "<tr><td>".$multiDay[$flag]."</td>
    <td>" .date($i."-m-y"). "</td>
    <td><input type='text' class='TimeField' name='StartTime".$i."'></td>
    <td><input type='text' class='TimeField' name='EndTime".$i."'></td>
    <td><select name='absence' class='TimeField'> <option value='sick'>מחלה</option><option value='vacation'>חופשה</option><option value='sickChild'>מחלת ילד</option></select></td>
    <td><input type='file' class='TimeField' name='myfile'></td></tr>";
    $flag++;
    if($flag==7)
    $flag=0;
}
echo "</form></table>";
      




for($i=1;$i<=$lastDay;$i++) //update the data in the DB
{
    
    if(isset($_POST['StartTime'.$i])&&isset($_POST['EndTime'.$i])&& $_POST['StartTime'.$i]!=""&&$_POST['EndTime'.$i]!=""){
        
        $db->UpdateDay($_SESSION['idRacezt'],date('d-m-Y', strtotime(date(''.$i.'-m-Y'))),$_POST['StartTime'.$i],$_POST['EndTime'.$i]);
        
    }
}
    

  
    



?>
         
     </body>
</html>
