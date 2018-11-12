<?php
    session_start();
	require('mysqli_connect.php');
    if(!$_SESSION['login']){
   header("location:http://sp-cfsics.metrostate.edu/~ics311sp170206/login.php");
   die;
}
    if (isset($_POST['spot_id']) && isset($_POST['renters_name'])){
        /*
         $username = $_SESSION['username'];
         if($username == ''){
              mysqli_close($dbc);
             header('Location: http://sp-cfsics.metrostate.edu/~ics311sp170206/login.php');
         }
         */
         $spotId = $_POST['spot_id'];
         $rentersName = $_POST['renters_name'];
         
         $query = "UPDATE `parking space` SET `Resident Name`='$rentersName' WHERE `Spot Number`='$spotId'"; 
         $query2 = "UPDATE `resident` SET `Parking Spot`='$spotId' WHERE `Name`='$rentersName'";
         
         mysqli_query($dbc, $query)or die(mysqli_error($dbc));
         mysqli_query($dbc, $query2)or die(mysqli_error($dbc));
     }
     mysqli_close($dbc);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Update Parking Spot</title>

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
                    <li><a href="insertParkingInfo.php">Add Parking Information</a></li>
                    <li><a href="RegisterAssistant.php">Register Office Assistant</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header text-center">Update Parking Spot</h1>

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>* Indicates required field<br>
                                <h3>Update Spot</h3>
                                <!--form starts here-->
                                <form action="updateParkingSpot.php" method='post'>
                                    * Spot Number: <br><input type="text" name="spot_id" pattern="[^\/;,*<>=+]*"><br>
                                    * Renter's Name: <br><input type="text" name="renters_name" id="rentersName" pattern="[^\/;,*<>=+]*"><br>
                                    <input type="submit" name="updateParkingSpot" value="Update"><br>
                                </form>
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