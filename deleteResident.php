<?php
require('mysqli_connect.php');
session_start();
$Username2 = $_SESSION['username'];

if (isset($_POST["Apartment_Number"])){

  $delete_id = $_POST["Apartment_Number"];

  $sql = "DELETE FROM `resident`
          WHERE `Appartment Number` = '$delete_id' and `userName` ='". $Username2. "'";

  mysqli_query($dbc, $sql);
  header('location: view.php?DeleteResident=Success');

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Delete Resident Information</title>

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
                    <li><a href="RegisterAssistant.php">Register Office Assistant</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header text-center">Delete Resident Spots</h1>

                <div class="container">
                    <div class="row">


                        <!--form starts here-->
                        <form action="deleteResident.php" method='post'>
							<div class="row">
								<div class="form-group col-lg-10 col-lg-4 col-md-4 col-lg-4">								
									<label for="apt">* Apartment Number:</label>
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1">#</span>
										<input required class="form-control" id="apt" placeholder="Apartment Number" type="text" name="Apartment_Number" id="apartmentNumber"  pattern="[^\/;,*<>=+]*"/>
									</div>
								</div>
							</div>
							<div class="row">
								<button  type="submit" class="btn btn-primary btn-lg" name="delete_resident_info">
									<span class="glyphicon glyphicon-check" aria-hidden="true"></span> Delete Resident
								</button> 
							</div>
						</form>

			   
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