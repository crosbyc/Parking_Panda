<?php

session_start();

require_once "mysqli_connect.php";

unset($fmsg);

// If the values are posted, insert them into the database.
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['phoneNumber'])){
    $username = $_POST['username'];
    $email = $_SESSION['username'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $type = "Office Assistant";


    $query = "INSERT INTO `users` (Name, Password, Email, Type, `Phone Number`) VALUES ('$username', SHA1('$password'), '$email', '$type', '$phoneNumber')";
    $result = mysqli_query($dbc, $query);

    if($result){
        $smsg = "<span>User Created Successfully.</span>";
        echo $smsg;
    }else{
        $fmsg ="User Registration Failed";
    }
    mysqli_close($dbc);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Panking Panda</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
	<link rel='icon' href='img/panda.ico' type='image/x-icon'/ >
  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">

</head>

<body>
  <!--Maybe helpful docs? 
      https://www.w3schools.com/PHP/php_mysql_intro.asp
      http://stackoverflow.com/questions/15090785/redirecting-to-a-new-page-after-successful-login 
   -->
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
          <!--<li><a href="#">FAQs</a></li>-->
          <!--<li><a href="squareftcalc.php">Area Calculator</a></li>-->
        </ul>
      </div>
    </div>
  </nav>
  <!-- make this a general home page, add left nav for log in page -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li class="active"><a href="#">Register Office Assistant</a></li>
          <li><a href="login.php">Log In</a></li>
          <li><a href="index.html">Home</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header text-center">Welcome to Parking Panda</h1>
		
        <div class="row " style="margin-left:15%">
			<div class="col-sm-6">

				<div class="row main">
					<div class="main-login main-center">
						<form class="form-horizontal" method="post" action="RegisterAssistant.php">
							
							<div class="form-group">
								<label for="name" class="cols-sm-2 control-label">Your User Name</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-user" ></span></span>
										<input required type="text" class="form-control" name="username" id="name"  placeholder="Enter your User Name" pattern="[^\/;,*<>=+@]*" size="15" maxlength="30" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"/>
									</div>
								</div>

								<label for="pne" class="cols-sm-2 control-label">Phone Number</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-phone" ></span></span>
										<input required type="tel" class="form-control" name="phoneNumber" id="pne"  placeholder="Enter your Phone No" size="20" pattern="[^\/;,*<>=+]*" maxlength="40" value="<?php if(isset($_POST['phoneNumber'])) echo $_POST['phoneNumber']; ?>"/>
									</div>
								</div>


								<label for="password" class="cols-sm-2 control-label">Password</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-lock" ></span></span>
										<input required type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" pattern="[^\/;,*<>=+]*" size="15" maxlength="20" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"/>
									</div>
								</div>

								<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
								<div class="cols-sm-10">
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-lock" ></span></span>
										<input required type="password" class="form-control" name="C_password" id="confirm"  placeholder="Confirm your Password" pattern="[^\/;,*<>=+]*" size="15" maxlength="20" value="<?php if(isset($_POST['C_password'])) echo $_POST['C_password']; ?>"/>
									</div>
								</div>


							<div style="margin-top:10%">
								<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
							</div>

						</form>
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
