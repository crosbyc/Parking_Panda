<?php
  //  session_start();
	require('mysqli_connect.php');
	 
			$filename = "ParkingInfoTemplate";  
			$sql = "Select * from `parking space`";
			//execute query 
			$result = mysqli_query($dbc,$sql) or die( mysql_error());
			$file_ending = "csv";
			//header info for browser
			header("Content-Type: application/xls");    
			header("Content-Disposition: attachment; filename=$filename.csv");  
			header("Pragma: no-cache"); 
			header("Expires: 0");

			//define separator (defines columns in excel & tabs in word)
			$sep = ","; //tabbed character
			
			//start of printing column names as names of MySQL fields
			while ($property = mysqli_fetch_field($result)) {
				echo strtoupper($property->name.$sep);
			}
			
			print("\n");    
			//end of printing column names  
  
 
     mysqli_close($dbc);
?>
