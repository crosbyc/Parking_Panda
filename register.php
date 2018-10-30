<?php
// require once like a config file he will create
require_once "mysqli_connect.php";
// If the values are posted, insert them into the database.
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['cpassword']) && isset($_POST['email'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
	$C_password = $_POST['cpassword'];
		
	$emailCheck = "SELECT * FROM `users` WHERE Email='$email'";
	$e_CheckRes = mysqli_query($dbc, $emailCheck);

    $query = "INSERT INTO `users` (Name, Password, Email) VALUES ('$username', SHA1('$password'), '$email')";
  	
	if ($C_password !== $password) {
		$fmsg ="Sorry! Confirmation password does not match..Try again";
	}
	else if(mysqli_num_rows($e_CheckRes) > 0){
		$fmsg ="Sorry! This email account already exist..Try another";
	}
    else if(mysqli_query($dbc, $query)){
        $smsg = "User Created Successfully.";
        header('Location: login.php');
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
  <!--<link rel="icon" href="../../favicon.ico">-->

  <title>Panking Panda</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">

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
          <li class="active"><a href="#">Register</a></li>
          <li><a href="login.php">Log In</a></li>
          <li><a href="index.html">Home</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header text-center">Welcome to Parking Panda</h1>

        <div class="row ">
          <div class="col-md-6">
            <h4>If You Do Not Have an Account - <br> Please Create One Using the Form Below:</h4>
            <!-- Write a PHP script to store new log in info in mySQL db -->
            <form action="register.php" method="post">
              Create User name: <br><input type="text" name="username" pattern="[^\/;,*<>=+]*" size="15" maxlength="30" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"><br><br>
             Email Adress: <br><input type="email" name="email" size="20" pattern="[^\/;,*<>=+]*" maxlength="40" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"><br><br>
               Create Password: <br><input type="password" name="password" pattern="[^\/;,*<>=+]*" size="15" maxlength="20" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"><br><br>
                Confirm Password: <br><input type="password" name="cpassword" pattern="[^\/;,*<>=+]*" size="15" maxlength="20" value="<?php if(isset($_POST['cpassword'])) echo $_POST['cpassword']; ?>"><br><br>

                <input type="submit" name="submit" value="Register"><br>
            </form>
			
<?php if(isset($fmsg)) : ?>
	<div class="alert alert-danger">
		<?=$fmsg?>
		<php unset($fmsg); ?>
	</div>
<?php endif; ?>
		
			
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
