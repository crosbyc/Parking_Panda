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
				$Username = $_SESSION['username'];
				$apartmentNumber = $filesop[0];
				$residentName = $filesop[1];
				$building = $filesop[2];
				$parkingSpot = $filesop[3];
				$leasingPeriod = $filesop[4];
				$phoneNumber = $filesop[5];
				$email = $filesop[6];
				$Pets = $filesop[7];
				$Storage = $filesop[8];
				$comments = $filesop[9];
  
				$query = "INSERT INTO `resident` (`Appartment Number`, `Name`, `Building`, `Parking Spot`, `Leasing Period`, `Phone Number`, `Email Address`, `Pets`, `comments`, `userName`) VALUES ('".$apartmentNumber."', '".$residentName."', '".$building."', '".$parkingSpot."', '".$leasingPeriod."', '".$phoneNumber."', '".$email."', '".$pets."', '".$comments."', '".$Username."')";

				@mysqli_query($dbc, $query);    
			
			}
			$uploadMsg = $uploadMsg + "\n File loaded to database";
			header('Location: insertResidentInfo.php');
		}
  }

?>