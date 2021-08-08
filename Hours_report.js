
let date = new Date(), y = date.getFullYear(), m = date.getMonth();
let firstDay = new Date(y, m, 1);
let lastDay = new Date(y, m + 1, 0);
let Month =date.getMonth()+1;
let multiDay=["ראשון","שני","שלישי","רביעי","חמישי","שישי","שבת"]
let flag=parseInt(firstDay.getDay());

let tbl_time="<table id='tabDays'>";
			
			for(let i=firstDay.getUTCDay();i<=lastDay.getUTCDate()+1;i++)//Rows
			{
				tbl_time+="<form id=activity >"
				tbl_time+="<tr>";
				
				for(let j=1;j<=1;j++)//Columns
				{
					
                    tbl_time+="<td>"+multiDay[flag]+"</td>";
                   
					tbl_time+="<td>"+i+"/"+Month+"/"+date.getUTCFullYear()+"</td>";
                    tbl_time+="<td>" +"<input type='text' class='TimeField' name='inTime' placeholder='שעת כניסה'>" +"</td>";
                    tbl_time+="<td>" +"<input type='text' class='TimeField' name='outTime' placeholder='שעת יציאה'>" +"</td>";
                    tbl_time+="<td>" +'<select name="absence" class="TimeField">'+ '<option value="sick">מחלה</option>'+'<option value="vacation">חופשה</option>'+'<option value="sickChild">מחלת ילד</option>'+'</select>' +"</td>";
                    tbl_time+="<td>" +'<input type="file" class="myfile" name="myfile">' +"</td>";
				}
                flag++;
                if(flag==7)
                flag=0;
				
				tbl_time+="</tr>";
			}
			tbl_time+="</form>";
			tbl_time+="</table>";
			
           
			
			document.write(tbl_time); 
         