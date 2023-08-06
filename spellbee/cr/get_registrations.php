<?php

include "connect.php";

$sterm = $_GET['sterm'];

$result=mysql_query("SELECT rollno, name, batch, email, mobile, DATE_FORMAT(timestamp, '%D %M %Y -- %h:%i %p (%W)'), paystatus FROM registrations where rollno like '%$sterm%' or name like '%$sterm%'");

if(mysql_num_rows($result) == 0)
  {
 	echo "<tr><th>No Results Found!</th></tr>";
  }  
else
  {
    echo "<table width='100%' border='1' cellspacing='0'>";
    echo "<tr bgcolor='#DA0008' style='color:#ffffff;'><th>Roll Number</th><th>Student Name</th><th>Batch</th><th width='200px'>E-mail ID</th><th>Mobile Number</th><th>Registered On</th><th>Confirm Registration</th></tr>";
	while($row=mysql_fetch_array($result))
     {
    	echo "<tr><td align='center'>".$row[0]."</td><td align='center'>".ucwords($row[1])."</td><td>".ucwords($row[2])."</td><td>".strtolower($row[3])."</td><td>".$row[4]."</td><td>".$row[5]."</td><td align='center'>";

        if($row[6] == 0)
          {		
    		echo "<span style='color:blue;font-weight:bold;'>Registered</span>";
	      } 	
        else
          {		
    		echo "<span style='color:#DA0008;font-weight:bold;'>Already Confirmed</span>";
	      } 	
		echo "</td></tr>";
     }
    echo "</table>"; 
  }

?>