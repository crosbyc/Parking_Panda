<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="icon" href="../../favicon.ico">-->
    <title>View Parking Info</title>
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
                    <li class="active"><a href="#">View Parking Information</a></li>
                    <li><a href="insertResidentInfo.php">Add Resident Informatoin</a></li>
                    <li><a href="insertParkingInfo.php">Add Parking Information</a></li>
                    <!-- <li><a href='RegisterAssistant.php'>Register Office Assistant</a></li> -->
                    <?php
                        session_start();
                        require('mysqli_connect.php');
                                                
                        if($_SESSION['isManager'] == true){
                            echo "<li><a href='RegisterAssistant.php'>Register Office Assistant</a></li>";
                        }

                    ?>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header text-center">View Parking Information</h1>
                <table width=100% cellpadding=0 cellspacing=0>
                    <div class="row">
                        <div class="col">
                            <h3>Parking Spaces</h3>
                            <table class="table table-striped">
                                <div class="table responsive">
                                    <thead>
                                        <tr>
                                            <th>Spot Number</th>
                                            <th>Residents Name</th>
                                            <th>Location</th>
                                            <th>Type</th>
                                            <th>Building</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
// Create connection
//session_start();
//require('mysqli_connect.php');
//session_start();



//echo $Type;
if(!$_SESSION['login']){
   header("location:login.php");
   die;
}
//$con=mysqli_connect("mysqli_connect.php");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$Username2 = $_SESSION['username'];
$query2 = "SELECT * FROM `parking space` WHERE `userName` ='". $Username2. "'";
$result = mysqli_query($dbc,$query2);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


        echo '<tr>
                  <td scope="row">' . $row["Spot Number"].'</td>
                  <td>' . $row["Resident Name"] .'</td>
                  <td> '.$row["Location"] .'</td>
                  <td> '.$row["Type"] .'</td>
                  <td> '.$row["Building"] .'</td>
                  <td> '.$row["comments"] .'</td>';   
                  if($_SESSION['isManager'] == true){
                    echo '<td><a class="btn btn-warning btn-sm" href="updateParkingSpaces.php?id='.$row["Spot Number"].'">Update</a></td>
                    <td><a class="btn btn-danger btn-sm" href="deleteParkingSpot.php?id='.$row["Spot Number"].'">Delete</a></td>';
                }             

		echo '</tr>';
    //$query3 = "SELECT `Type` FROM `users` WHERE `username`= '$Username'";
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
                                    <h3>Residents</h3>
                                    <table class="table table-striped">
                                        <div class="table responsive">
                                        <thead>
                                        <tr>
                                            <th>Apartment Number</th>
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
//session_start();
//require('mysqli_connect.php');
/*if(!$_SESSION['login']){
   header("location:http://sp-cfsics.metrostate.edu/~ics311sp170206/login.php");
   die;
}*/
//$con=mysqli_connect("mysqli_connect.php");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$Username2 = $_SESSION['username'];
$query2 = "SELECT * FROM `resident` WHERE `userName` ='". $Username2. "'";
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
                  <td> '.$row["comments"] .'</td>';
                  ;   
                  if($_SESSION['isManager'] == true){
                    echo '<td><a class="btn btn-warning btn-sm" href="updateResidents.php?id='.$row["Appartment Number"].'">Update</a></td>
                    <td><a class="btn btn-danger btn-sm" href="deleteResident.php?id='.$row["Appartment Number"].'">Delete</a></td>';
                }             

		echo '</tr>';                  


    //               $query3 = "SELECT `type` FROM `users` WHERE `username`= '". $Username2. "'";
      
    // if($query3 == "Office Manager"){
    //     echo '<td><a class="btn btn-warning btn-sm">Update</a></td>
    //     </tr>';
    // }else{
    //     echo '</tr>';
    // }
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
												<div class="input-group">
												  <span class="input-group-addon">
													<input type="checkbox" name="showAvailable" value="Show"> Show Available Spots</input>
												  </span>
												  <button type="submit"  class="btn btn-primary btn-sm" name="submit" >
												  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Submit</button>

												</div><!-- /input-group -->
                                            </form>
<?php
if (isset($_POST['showAvailable'])){
    echo '<h3>Assign A Spot</h3>
    <table class="table table-striped">
                                <div class="table responsive">
                                    <thead>
                                        <tr>
                                            <th>Spot Number</th>
                                            <th>Location</th>
                                            <th>Type</th>
                                            <th>Renters Name</th>
                                            <th>Building</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
$toBeDetermined = "TBD";

$query2 = "SELECT * FROM `parking space` WHERE `Resident Name`= '$toBeDetermined' and `userName`= '". $Username2. "'";

$result = mysqli_query($dbc,$query2);
if (!$result) {
    trigger_error('Invalid query: ');
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
        echo 
			'<tr>
				<td scope="row">' . $row["Spot Number"]. '</td>
				<td>' . $row["Location"] .'</td>
				<td> '.$row["Type"] .'</td>
				<td> '.$row["Resident Name"] .'</td>
				<td> '.$row["Building"] .'</td>
				<td> '.$row["comments"] .'</td>
				<td>
			
					<form action="assignParking.php">
						<button type="submit"  class="btn btn-primary btn-sm" name="location" value=$row["Spot Number"]>
						<span class="glyphicon glyphicon-hand-left" aria-hidden="true"></span> Assign Parking</button>
					</form>
				</td>
			</tr>';
    }
} else {
    echo '0 results
    <br>
                <form action="assignParking.php">
                    <input type="submit" value="Assign Parking" />
                </form>';
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