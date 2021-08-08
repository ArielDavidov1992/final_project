let date = new Date(), y = date.getFullYear(), m = date.getMonth();
let firstDay = new Date(y, m, 1);
let lastDay = new Date(y, m + 1, 0);
let Month =date.getMonth()+1;
let multiDay=["ראשון","שני","שלישי","רביעי","חמישי","שישי","שבת"]
let flag=parseInt(firstDay.getDay());

let tbl_activity="<table id='tabActivity'>";
	tbl_activity+="<form id='adtivity' method='POST' action=''>";	
	tbl_activity+="<tr>"+"<th>יום</th>"+"<th>תאריך</th>"+"<th>כיתה</th>"+"<th>מקום הפעילות</th>"+"<th>נושא הפעילות</th>"+"<th>שעת התחלה</th>"+
	"<th>שעת סיום</th>"+"<th>מספר משתתפים</th>"+"</tr>";	
			for(let i=firstDay.getUTCDay();i<=lastDay.getUTCDate()+1;i++)//Rows
			{
				tbl_activity+="<tr>";
				
				for(let j=1;j<=1;j++)//Columns
				{
                    tbl_activity+="<td>"+multiDay[flag]+"</td>";
                   
					tbl_activity+="<td>"+i+"/"+Month+"/"+date.getUTCFullYear()+"</td>";
                    tbl_activity+="<td>" +"<input type='text' class='TimeField' name="+"class"+i+" placeholder='כיתה'>" +"</td>";
                    tbl_activity+="<td>" +"<input type='text' class='TimeField' name='place' placeholder='מקום הפעילות'>" +"</td>";
                    tbl_activity+="<td>" +"<input type='text' class='TimeField' name='topic' placeholder='נושא הפעילות'>" +"</td>";
                    tbl_activity+="<td>" +"<input type='text' class='TimeField' name='start' placeholder='שעת התחלה'>" +"</td>";
					tbl_activity+="<td>" +"<input type='text' class='TimeField' name='end' placeholder='שעת סיום'>" +"</td>";
					tbl_activity+="<td>" +"<input type='text' class='TimeField' name='participants' placeholder='מספר משתתפים'>" +"</td>";
					
				}
                flag++;
                if(flag==7)
                flag=0;
				
				tbl_activity+="</tr>";
			}
			
			tbl_activity+="<input name='saveDetails' type='submit' class='TimeField'  value='שמור נתונים'>";
			tbl_activity+="</form>";
			tbl_activity+="</table>";
            
			
			document.write(tbl_activity); 