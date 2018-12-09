<?php
    session_start();
	require('mysqli_connect.php');
    if(!$_SESSION['login']){
		header("location:login.php");
		die;
	}  

	if (isset($_REQUEST['submit'])) 
	{
		$target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        
		$uploadOk = 1;
		
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $uploadMsg = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
              $uploadMsg =  "Sorry, there was an error uploading your file.";
              }
			  
		$handle = fopen($target_file, "r");
		if ($target_file == NULL) {
			header('Location: login.php');
		}
		else 
		{
			fgets($handle);  // read one line for nothing (skip header)
			while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
			{
				$username = $_SESSION['username'];
				$spotId = $filesop[0];
				$Location = $filesop[1];
				$Type = $filesop[2];
				$rentersName = $filesop[3];
				$Building = $filesop[4];
				$comments = $filesop[5];
				
				$query = "INSERT INTO `parking space` (`Spot Number`, `Location`, `Type`, `Resident Name`, `Building`, `comments`, `userName`) VALUES ('".$spotId."', '".$Location."', '".$Type."', '".$rentersName."', '".$Building."', '".$comments."', '".$username."')";
				@mysqli_query($dbc, $query);  //or die(mysqli_error($dbc));  
			
			}
			$uploadMsg = $uploadMsg + "\n File loaded to database";
			header('Location: insertParkingInfo.php');
		}
  }

?>

