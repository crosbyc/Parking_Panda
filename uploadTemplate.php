<?php
    session_start();
	require('mysqli_connect.php');
    if(!$_SESSION['login']){
		header("location:login.php");
		die;
	}
	  
	if (isset($_REQUEST['upload_'])) 
	{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Upload</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
	<link rel='icon' href='img/panda.ico' type='image/x-icon'/ >
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

</head>
	<body>
		<h1 class="page-header text-center">Select File</h1>
	    <form action="uploadTemplate.php" method="post" enctype="multipart/form-data">
		
			<input  class="file btn btn-sm btn-default" type="file" name="fileToUpload" style="display:inline;">  
			<div class="input-group input-group-sm" style="margin-left:10%">
				<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-upload" ></span></span>
				<input class="file btn btn-sm btn-info" type="submit" name="submit" value="Upload" >
			</div>
		
        </form>

		
	</body>
</html>	
	
<?php
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

				@mysqli_query($dbc, $query);  //or die(mysqli_error($dbc));  
			
			}
			$uploadMsg = $uploadMsg + "\n File loaded to database";
			header('Location: insertResidentInfo.php');
		}
  }

?>