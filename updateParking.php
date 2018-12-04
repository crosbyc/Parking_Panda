<?php
// Create connection
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>Update Parking</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
	<link rel='icon' href='img/panda.ico' type='image/x-icon'/ >
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
                    <li><a href="view.php">View Parking Information</a></li>
                    <li><a href="insertResidentInfo.php">Add Resident Informatoin</a></li>
                    <li><a href="insertParkingInfo.php">Add Parking Information</a></li>
                    <li><a href="RegisterAssistant.php">Register Office Assistant</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header text-center">Update Parking</h1>
                <!-- <table width=100% cellpadding=0 cellspacing=0>
                    <div class="row">
                        <div class="col">
                            <h3>Parking Spaces</h3>
                            <table class="table table-striped">
                                <div class="table responsive">
                                    <thead>
                                        <tr>
                                            <th>Spot Number</th>
                                            <th>Renter's Name</th>
                                            <th>Location</th>
                                            <th>Type</th>
                                            <th>Building</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody> -->
<?php
// Create connection
//session_start();
//require('mysqli_connect.php');
/*if(!$_SESSION['login']){
   header("location:http://sp-cfsics.metrostate.edu/~ics311sp170206/login.php");
   die;
}*/
//$con=mysqli_connect("mysqli_connect.php");
// Check connection
/*if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//$Username = $_SESSION['username'];
$query2 = "SELECT * FROM `resident`";
$result = mysqli_query($dbc,$query2);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


        echo '<tr>
                  <td scope="row">' . $row["Spot Number"]. '</td>
                  <td>' . $row["Location"] .'</td>
                  <td> '.$row["Type"] .'</td>
                  <td> '.$row["Resident Name"] .'</td>
                  <td> '.$row["Building"] .'</td>
                  <td> '.$row["comments"] .'</td>
                </tr>';
    }
} else {
    echo "0 results";
} 
*/
//mysqli_close($dbc);
?>
                                    <!-- </tbody>
                                </div>
                        </div> -->
                        <table width=100% cellpadding=0 cellspacing=0>
                            <div class="row">
                                <div class="col">
                                    <h3>Residents</h3>
                                    <table class="table table-striped">
                                        <div class="table responsive">
                                        <thead>
                                        <tr>
                                            <th>Apartment Numner</th>
                                            <th>Resident Name</th>
                                            <th>Building</th>
                                            <th>Parking Spot</th>
                                            <th>Leasing Period</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Pets</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
// Create connection

if(!$_SESSION['login']){
   header("location:http://sp-cfsics.metrostate.edu/~ics311sp170206/login.php");
   die;
}
//$con=mysqli_connect("mysqli_connect.php");
// Check connection
require('mysqli_connect.php');
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$Username = $_SESSION['username'];
$query2 = "SELECT * FROM `resident` WHERE `username`= '". $Username. "'";
$result = mysqli_query($dbc,$query2);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


        echo '<tr>
                  <td scope="row">' . $row["Appartment Number"]. '</td>
                  <td>' . $row["Name"] .'</td>
                  <td> '.$row["Building"] .'</td>
                  <td> '.$row["Parking Spot"] .'</td>
                  <td> '.$row["Leasing Period"] .'</td>
                  <td> '.$row["Phone Number"] .'</td>
                  <td> '.$row["Email Address"] .'</td>
                  <td> '.$row["Pets"] .'</td>
                  <td> '.$row["comments"] .'</td>
                </tr>';
    }
} else {
    echo "0 results";
} 

//mysqli_close($dbc);
?>
                                            </tbody>

                                        </div>
                                </div>
                                <table width=100% cellpadding=0 cellspacing=0>
                                    <div class="row">
                                        <div class="col">
                                            <form method="post">
                                                <input type="checkbox" name="showAvailable" value="Show"> Show Available Spots<br>
                                                <input name="submit" type="submit" value="submit" />
                                            </form>
<?php
//require('mysqli_connect.php');
if (isset($_POST['showAvailable'])){
    echo '<h3>Assign A Spot</h3>
    <table class="table table-striped">
                                <div class="table responsive">
                                    <thead>
                                        <tr>
                                            <th>Spot Number</th>
                                            <th>Renters Name</th>
                                            <th>Location</th>
                                            <th>Type</th>
                                            <th>Building</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
$toBeDetermined = "TBD";
$query2 = "SELECT * FROM `parking space` WHERE `Resident Name`= '$toBeDetermined' and `username`= '". $Username. "'";
$result = mysqli_query($dbc,$query2);
if (!$result) {
    trigger_error('Invalid query: ');
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


        echo '<tr>
                  <td scope="row">' . $row["Spot Number"]. '</td>
                  <td>' . $row["Location"] .'</td>
                  <td> '.$row["Type"] .'</td>
                  <td> '.$row["Resident Name"] .'</td>
                  <td> '.$row["Building"] .'</td>
                  <td> '.$row["comments"] .'</td>
                  <td><a class="btn btn-warning btn-sm" href="updateParkingSpot.php?id='.$row["Spot Number"].'">Update</a></td>
                </tr>';
    }
} else {
    echo '0 results';
} 
}
?>


                                    </tbody>
                                </div>
                        </div>
                                        </div>
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