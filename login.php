<?php
/*
if (isset($_POST['username']) and isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    function Login(){
        if (empty($_POST['username'])){
            $this->HandleError("Username does not exist");
            return false;
        }

        if (empty($_POST['password'])){
            $this->HandleError("Password incorrect");
            return false;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

    }

    if ($username == "Test" && $password == "password"){
        header('Location: http://localhost/ICS499_ParkingManager_Prototype/htdocs/includes/view.html');
    }else{
        $fmsg = "Invalid Login Credentials.";
    }
}
*/
// Initialize the session
/*
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    //where do we want to direct them to after login
    exit;
}
*/
// Include config file
session_start();
require ('mysqli_connect.php');
if (isset($_POST['username']) and isset($_POST['password'])){
    $_SESSION['login'] = true;
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE Email='$username' or Name='$username' and Password=SHA1('$password')";

    
    $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

    $count = mysqli_num_rows($result);
    //If the posted values are equal to the database values, then the session will be created for the user.
    if ($count > 1){
        $_SESSION['username'] = $username;

        header('Location: view.php');
      
        //http://localhost/Parking_Panda/view.html
    }else{
      $fmsg = "Login Failed. Invalid Login Credentials.";
    }
}


/*if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}*/



?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Parking Panda</title>

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
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
          aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="index.html">Parking Panda</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li class="active"><a href="#">Log In</a></li>
          <li><a href="register.php">Register</a></li>
          <li><a href="index.html">Home</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header text-center">Welcome to Parking Panda</h1>
		</div>
        <div class="row ">
			
		<div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Sign in to continue</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="login.php" method="POST">
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img class="profile-img"
											src="img/panda.png" alt="">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Username" name="username" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="password" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<input type="submit" name="submitLogIn" class="btn btn-lg btn-primary btn-block" value="Log in">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						Don't have an account! <a href="register.php" onClick=""> Sign Up Here </a>
					</div>
                </div>
				 <?php if(isset($fmsg)) : ?>
	<div class="alert alert-danger">
		<?=$fmsg?>
		<?php unset($fmsg); ?>
	</div>
<?php endif; ?>
			</div>
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