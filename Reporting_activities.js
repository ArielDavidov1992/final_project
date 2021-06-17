let date = new Date(), y = date.getFullYear(), m = date.getMonth();
let firstDay = new Date(y, m, 1);
let lastDay = new Date(y, m + 1, 0);
let Month =date.getMonth()+1;
let multiDay=["ראשון","שני","שלישי","רביעי","חמישי","שישי","שבת"]
let flag=parseInt(firstDay.getDay());
let form_table="<form>";
let tbl_activity="<table id='tabActivity'>";
			
			for(let i=firstDay.getUTCDay();i<=lastDay.getUTCDate()+1;i++)//Rows
			{
				tbl_activity+="<tr>";
				
				for(let j=1;j<=1;j++)//Columns
				{
                    tbl_activity+="<td>"+multiDay[flag]+"</td>";
                   
					tbl_activity+="<td>"+i+"/"+Month+"/"+date.getUTCFullYear()+"</td>";
                    tbl_activity+="<td>" +"<input type='text' class='TimeField' name='inTime' placeholder='כיתה'>" +"</td>";
                    tbl_activity+="<td>" +"<input type='text' class='TimeField' name='outTime' placeholder='מקום הפעילות'>" +"</td>";
                    tbl_activity+="<td>" +"<input type='text' class='TimeField' name='outTime' placeholder='נושא הפעילות'>" +"</td>";
                    tbl_activity+="<td>" +"<input type='text' class='TimeField' name='outTime' placeholder='שעת התחלה'>" +"</td>";
					tbl_activity+="<td>" +"<input type='text' class='TimeField' name='outTime' placeholder='שעת סיום'>" +"</td>";
					tbl_activity+="<td>" +"<input type='text' class='TimeField' name='outTime' placeholder='מספר משתתפים'>" +"</td>";
				}
                flag++;
                if(flag==7)
                flag=0;
				
				tbl_activity+="</tr>";
			}
			tbl_activity+="</table>";
            form_table+="</form>";
			
			document.write(tbl_activity); 