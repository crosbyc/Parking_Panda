<?php
	require('mysqli_connect.php');
	  
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
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>
	<body>
		<h1 class="page-header text-center">Select File</h1>
	    <form action="uploadParkingTemplate.php" method="post" enctype="multipart/form-data">
		
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