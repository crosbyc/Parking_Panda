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
		 $Storage = 9;
         $comments = $_POST['Comments'];
  
		$query = @"INSERT INTO `resident` (`Appartment Number`, `Name`, `Building`, `Parking Spot`, `Leasing Period`, `Phone Number`, `Email Address`, `Pets`, `Storage Unit`,`comments`) VALUES ('$apartmentNumber', '$residentName', '$building', '$parkingSpot', '$leasingPeriod', '$phoneNumber', '$email', '$pets',$Storage, '$comments')";
		@mysqli_query($dbc, $query);  //or die(mysqli_error($dbc));
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


                        <!--form starts here-->
                        <form action="insertResidentInfo.php" method='post'>
							<div class="row">
								<div class="form-group col-lg-10 col-md-4 col-md-4 col-lg-4">
									<label for="resident">* Resident's Name:</label>
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" ></span></span>
										<input  required class="form-control" placeholder="Resident's Name" type="text" name="Residents_Name" id="resident" pattern="[^\/;,*<>=+]*"  >
									</div>
								</div>
								<div class="form-group col-lg-10 col-lg-4 col-md-4 col-lg-4">								
									<label for="apt">* Apartment Number:</label>
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1">#</span>
										<input required class="form-control" id="apt" placeholder="Apartment Number" type="text" name="Apartment_Number" id="apartmentNumber"  pattern="[^\/;,*<>=+]*"/>
									</div>
								</div>
							</div>
										
							<div class="row">
								<div class="form-group col-lg-10 col-lg-4 col-md-4 col-lg-4">
									<label for="lpd">* Leasing Period:</label>
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" ></span></span>									
										<input  required class="form-control" id="lpd" placeholder="Leasing Period"  type="text" name="Leasing_Period" id="leasingPeriod"/>
									</div>
								</div>	
								<div class="form-group col-lg-10 col-lg-4 col-md-4 col-lg-4">
									<label for="bldg">* Building:</label> 
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-home" ></span></span>									
										<input  required class="form-control" id="bldg" placeholder="Building"  type="text" name="Building" id="building" pattern="[^\/;,*<>=+]*"/>
									</div>
								</div>
							</div>
									
							<div class="row">
								<div class="form-group col-lg-10 col-lg-4 col-md-4 col-lg-4">
									<label for="spot">* Parking Spot:</label> 
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-road" ></span></span>	
										<input  required class="form-control" id="spot" placeholder="Parking Spot" type="text" name="Parking_Spot" id="parkingSpot" pattern="[^\/;,*<>=+]*"/>
									</div>
								</div>
								<div class="form-group col-lg-10 col-lg-4 col-md-4 col-lg-4">
									<label for="phne">* Phone Number:</label>
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-earphone" ></span></span>			
										<input required class="form-control" id="phne" placeholder="Phone Number" type="tel" name="Phone_Number" id="phoneNumber"   pattern="[^\/;,*<>=+]*"/>
									</div>
								</div>
							</div>
									
							<div class="row">
								<div class="form-group col-lg-10 col-lg-4 col-md-4 col-lg-4">								
									<label for="eml">* Email:</label>
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope" ></span></span>									
										<input required class="form-control" id="eml"  placeholder="Email Address" type="email" name="Email" id="email" pattern="[^\/;,*<>=+]*">
									</div>
								</div>
								<div class="form-group col-lg-10 col-lg-4 col-md-4 col-lg-4">
									<label for="pet">* Pets: </label>
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-piggy-bank" ></span></span>									
										<input required class="form-control"  id="pet" placeholder="Number of Pets" type="text" name="Pets" id="pets" pattern="[^\/;,*<>=+]*">
									</div>
								</div>
							</div> 
							<div class="row">		    
								<div class="form-group col-lg-8 col-md-8 col-lg-8">
									<label for="comments">Comment:</label>
									<textarea class="form-control" name="Comments" rows="3"  id="comments"></textarea>
								</div>
							</div>
							<div class="row">
								<button  type="submit" class="btn btn-primary btn-lg" name="insert_resident_info">
									<span class="glyphicon glyphicon-check" aria-hidden="true"></span> Add Resident
								</button> 
							</div>
						</form>

			   
                    </div>
                </div>
				
<?php if(isset($uploadMsg)) : ?>
	<div class="alert alert-danger">
		<?=$uploadMsg?>
		<?php unset($uploadMsg); ?>
	</div>
<?php endif; ?>	
				
				<div class="row" style="margin-top:10px" style="display:inline;">
					<form	action="uploadTemplate.php" method='post' style="display:inline;">
						<button style="margin-left:25%"  type="submit"  class="btn btn-default btn-lg" name="upload_" >
						<span class="glyphicon glyphicon-export" aria-hidden="true"></span> Upload From File</button>
					</form>
					<form	action="getResidentInfo.php" method='post' style="display:inline;">
						<button  style="margin-left:5%"  type="submit" class="btn btn-default btn-lg" name="download_template" >
						<span class="glyphicon glyphicon-import" aria-hidden="true"></span> Download Template</button>
					</form>	
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