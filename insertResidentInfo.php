<?php
  //  session_start();
	require('mysqli_connect.php');
    /*if(!$_SESSION['login']){
   header("location:http://sp-cfsics.metrostate.edu/~ics311sp170206/login.php");
   die;
}*/
    if (isset($_POST['Residents_Name']) && isset($_POST['Apartment_Number']) && isset($_POST['Leasing_Period']) && isset($_POST['Building']) && isset($_POST['Phone_Number']) && isset($_POST['Email']) && isset($_POST['Pets'])){
        /*
         $username = $_SESSION['username'];
         if($username == ''){
              mysqli_close($dbc);
             header('Location: http://sp-cfsics.metrostate.edu/~ics311sp170206/login.php');
         }
         */
         $residentName = $_POST['Residents_Name'];
         $apartmentNumber = $_POST['Apartment_Number'];
         $leasingPeriod = $_POST['Leasing_Period'];
         $building = $_POST['Building'];
         $parkingSpot = "TBD";
         $phoneNumber = $_POST['Phone_Number'];
         $email = $_POST['Email'];
         $Pets = $_POST['Pets'];
         $comments = $_POST['Comments'];
 
         $query = "INSERT INTO `resident` (`Appartment Number`, `Name`, `Building`, `Parking Spot`, `Leasing Period`, `Phone Number`, `Email Address`, `Pets`, `comments`) VALUES ('".$apartmentNumber."', '".$residentName."', '".$building."', '".$parkingSpot."', '".$leasingPeriod."', '".$phoneNumber."', '".$email."', '".$pets."', '".$comments."')";
         
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

    <title>Add Resident Information</title>

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
                    <li><a href="active">Add Resident Informatoin</a></li>
                    <li><a href="insertParkingInfo.php">Add Parking Information</a></li>
                    <li><a href="delete.html">Delete Parking or Resident Info</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header text-center">Add Resident Spots</h1>

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>* Indicates required field<br>
                                <h3>Residents</h3>
                                <!--form starts here-->
                                <form action="insertResidentInfo.php" method='post'>
                                    * Resident's Name: <br><input type="text" name="Residents_Name" pattern="[^\/;,*<>=+]*"><br>
                                    * Apartment Number: <br><input type="text" name="Apartment_Number" id="apartmentNumber"
                                        pattern="[^\/;,*<>=+]*"><br>
                                    * Leasing Period: <br><input type="text" name="Leasing_Period" id="leasingPeriod"><br>
                                    * Building: <br><input type="text" name="Building" id="building"
                                        pattern="[^\/;,*<>=+]*"><br>
                                    * Parking Spot: <br><input type="text" name="Parking_Spot" id="parkingSpot" pattern="[^\/;,*<>=+]*"><br>
                                    * Phone Number: <br><input type="text" name="Phone_Number" id="phoneNumber"
                                        pattern="[^\/;,*<>=+]*"><br>
                                    * Email: <br><input type="text" name="Email" id="email"
                                        pattern="[^\/;,*<>=+]*"><br>
                                        * Pets: <br><input type="text" name="Pets" id="pets"
                                        pattern="[^\/;,*<>=+]*"><br>
                                        * comments: <br><textarea rows="4" cols="50" name="Comments" id="comments" pattern="[^\/;,*<>=+]*"></textarea><br>
                                    <input type="submit" name="insert_resident_info" value="Insert"><br>
                                    <br>

                                </form>
								
								<div class="btn-group-vertical btn-space" role="group" aria-label="...">
									<input action="uploadResidentInfo.php" method='post' type="submit" value="Upload Data From File" class="btn btn-primary btn-lg" name="upload_template" >
									<input action="getResidentInfo.php" method='post' type="submit" value="Download A Template" class="btn btn-primary btn-lg" name="download_template" >
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