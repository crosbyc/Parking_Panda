<?php
    session_start();
	require('mysqli_connect.php');
    if(!$_SESSION['login']){
   header("location:http://sp-cfsics.metrostate.edu/~ics311sp170206/login.php");
   die;
}
    if (isset($_POST['spot_id']) && isset($_POST['Location']) && isset($_POST['Type']) && isset($_POST['Building']) && isset($_POST['comments'])){
        
         $username = $_SESSION['username'];

         $spotId = $_POST['spot_id'];
         $rentersName = "TBD";
         $Location = $_POST['Location'];
         $Type = $_POST['Type'];
         $Building = $_POST['Building'];
         $comments = $_POST['comments'];
 
         $query = "INSERT INTO `parking space` (`Spot Number`, `Location`, `Type`, `Resident Name`, `Building`, `comments`, `userName`) VALUES ('".$spotId."', '".$Location."', '".$Type."', '".$rentersName."', '".$Building."', '".$comments."', '".$username."')";
         
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
                    <li class="view.php"><a href="view.php">View Parking Information</a></li>
                    <li><a href="insertResidentInfo.php">Add Resident Informatoin</a></li>
                    <li class="active"><a href="#">Add Parking Information</a></li>
                    <li><a href="RegisterAssistant.php">Register Office Assistant</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header text-center">Add Parking Spots</h1>

                <div class="container">
                    <div class="row">

                        <h3>Parking Spots</h3>
                        <!--form starts here-->
                        <form action="insertParkingInfo.php" method='post'>
							<div class="row">	
								<div class="form-group col-lg-10 col-md-4 col-md-4 col-lg-4">
									<label for="spot">* Spot Number:</label>
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1">#</span>
										<input required placeholder="Parking Spot Number" class="form-control" type="text" id="spot" name="spot_id" pattern="[^\/;,*<>=+]*">
									</div>	
								</div>	
								<div class="form-group col-lg-10 col-md-4 col-md-4 col-lg-4">
									<label for="renter">Renter's Name: </label>
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" ></span></span>
										<input  value="TBD" class="form-control" id="renter" type="text" name="renters_name" id="rentersName" pattern="[^\/;,*<>=+]*">
									</div>	
								</div>										
							</div>			
							<div class="row">										
								<div class="form-group col-lg-10 col-md-4 col-md-4 col-lg-4">
									<label for="loc">* Location: </label>
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-th" ></span></span>
										<input required placeholder="Building Location" class="form-control" id="loc" type="text" name="Location" id="Loc" pattern="[^\/;,*<>=+]*"><br>
 									</div>	
								</div>                                  
								<div class="form-group col-lg-10 col-md-4 col-md-4 col-lg-4">
									<label for="typ">* Type: </label>
									<div class="input-group input-group-sm">
										<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-ok" ></span></span>
										<select class="form-control" id="typ" name="Type">
											<option value="Regular">Regular</option>
											<option value="Compact">Compact</option>
											<option value="Electric">Electric</option>
											<option value="Handicap">Handicap</option>
											<option value="Contractor">Contractor</option>
										</select>
 									</div>	
								</div>									
							</div>									
 							<div class="row">										
								<div class="form-group col-lg-10 col-md-4 col-md-4 col-lg-4">
									<label for="bld">* Building: </label> 
									<div class="input-group input-group-sm">									
										<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-home" ></span></span>
										<input required placeholder="Building Number" class="form-control" id="bld" type="text" name="Building" id="buildingLocation" pattern="[^\/;,*<>=+]*">
									</div>
								</div>										
							</div>									
							<div class="row">		    
								<div class="form-group col-lg-8 col-md-8 col-lg-8">
									<label for="comments">Comment:</label>
									<textarea rows="3" class="form-control"  name="comments" id="Comments" pattern="[^\/;,*<>=+]*"></textarea><br>
								</div>
							</div>                                    
							<div class="row" >
								<button  type="submit" class="btn btn-primary btn-lg" name="insert_parking_info">
									<span class="glyphicon glyphicon-check" aria-hidden="true"></span> Add Parking
								</button> 
							</div>									
                                   
                        </form>

						<div class="row " align="center" style="margin-top:10px" style="display:inline;">
	
								<button   type="submit"  class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal" name="upload_" >
								<span class="glyphicon glyphicon-export" aria-hidden="true"></span> Upload From A File</button>
							
							<form	action="getParkingInfo.php" method='post' style="display:inline;">	
								<button    type="submit" class="btn btn-default btn-lg" name="download_template" >
								<span class="glyphicon glyphicon-import" aria-hidden="true"></span> Download Template</button>
							</form>
						</div>
						
						<!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
						
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header" >
											<h1 class="page-header text-center">Select File</h1>
											<form action="uploadParkingTemplate.php" method="post" enctype="multipart/form-data">
											    
												<input  class="file btn btn-sm btn-default" type="file" name="fileToUpload" style="display:inline;">  
												<div class="input-group input-group-sm" style="margin-left:10%">
													<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-upload" ></span></span>
													<input class="file btn btn-sm btn-info" type="submit" name="submit" value="Upload" />
												</div>
											</form>
									</div>
									<div class="modal-body">
										<p>Select a file Containing Resident Parking Information then Click Upload Button.</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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