<?php
  //  session_start();
	require('mysqli_connect.php');
    /*if(!$_SESSION['login']){
   header("location:http://sp-cfsics.metrostate.edu/~ics311sp170206/login.php");
   die;
}*/
    if (isset($_POST['spot_id']) && isset($_POST['Location']) && isset($_POST['Type']) && isset($_POST['Building']) && isset($_POST['comments'])){
        /*
         $username = $_SESSION['username'];
         if($username == ''){
              mysqli_close($dbc);
             header('Location: http://sp-cfsics.metrostate.edu/~ics311sp170206/login.php');
         }
         */
         $spotId = $_POST['spot_id'];
         $rentersName = "TBD";
         $Location = $_POST['Location'];
         $Type = $_POST['Type'];
         $Building = $_POST['Building'];
         $comments = $_POST['comments'];
 
         $query = "INSERT INTO `parking space` (`Spot Number`, `Location`, `Type`, `Resident Name`, `Building`, `comments`) VALUES ('".$spotId."', '".$Location."', '".$Type."', '".$rentersName."', '".$Building."', '".$comments."')";
         
         mysqli_query($dbc, $query)or die(mysqli_error($dbc));
     }
	 

	 
     mysqli_close($dbc);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Parking Information</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Parking Panda</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="view.php"><a href="view.php">View Parking Information</a></li>
                    <li><a href="insertResidentInfo.php">Add Resident Informatoin</a></li>
                    <li><a href="active">Add Parking Information</a></li>
                    <li><a href="delete.html">Delete Parking or Resident Info</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header text-center">Add Parking Spots</h1>

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>* Indicates required field<br>
                                <h3>Parking Spots</h3>
                                <!--form starts here-->
                                <form action="insertParkingInfo.php" method='post'>
                                    * Spot Number: <br><input type="text" name="spot_id" pattern="[^\/;,*<>=+]*"><br>
                                      Renter's Name: <br><input type="text" name="renters_name" id="rentersName"
                                        pattern="[^\/;,*<>=+]*"><br>
                                    * Location: <br><input type="text" name="Location" id="Loc" pattern="[^\/;,*<>=+]*"><br>
                                    * Type: <select name="Type">
                                        <option value="Regular">Regular</option>
                                        <option value="Compact">Compact</option>
                                        <option value="Electric">Electric</option>
                                        <option value="Handicap">Handicap</option>
                                        <option value="Contractor">Contractor</option>
                                    </select><br><br>
                                    * Building <br><input type="text" name="Building" id="buildingLocation" pattern="[^\/;,*<>=+]*"><br>
                                    * comments: <br><textarea rows="4" cols="50" name="comments" id="Comments" pattern="[^\/;,*<>=+]*"></textarea><br>
                                    <input type="submit" name="insert_parking_info" value="Insert"><br>
                                    <br>
                                </form>

								<div class="btn-group-vertical btn-space" role="group" aria-label="...">
								<form action="getParkingInfo.php" method='post'>
									<input action="uploadParkingInfo.php" method='post' type="submit" value="Upload Data From File" class="btn btn-primary btn-lg" name="upload_template" >
									<input action="getParkingInfo.php" method='post' type="submit" value="Download A Template" class="btn btn-primary btn-lg" name="download_template" >
								</form>
								</div>
                        </div>
                    </div>
                </div>


                <!-- Bootstrap core JavaScript
    ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script>
                    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
                </script>
                <!-- Latest compiled and minified JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                    crossorigin="anonymous"></script>
</body>

</html>