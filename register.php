<?php
// require once like a config file he will create
require_once "config.php";
// definr variables
 $username = $password = $confirm_password = "";
 $username_err = $password_err = $confirm_password_err = "";

 //process it
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // validate username
    if(empty(trim($_POST["username"]))){
    $username_err = "Please enter a username.";
    }else{
        $sql_stmt = "select id from users where username = ?";

        if($stmt = mysqli_prepare($link, $sql_stmt)){
            mysqli_stmt_bind_param($stmt, "s", $pa_user);

            // set it
            $pa_user = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt)){
                //store result
                mysqli_stmt_store_result($stmt);

             if(mysqli_stmt_num_rows($stmt) == 1){
                 $username_err = "Username already exist";
             }else {
                 $username = trim($_POST["username"]);
             }
             }else{
                echo "Please try again later";
            }
        }
            mysqli_stmt_close($stmt);
    }

        // Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password.";
        } elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Password must have atleast 6 characters.";
        } else{
            $password = trim($_POST["password"]);
        }

        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Please confirm password.";
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Password did not match.";
            }
        }

        // Check input errors before inserting in database
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

            // Prepare an insert statement
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                // Set parameters
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: login.php");
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($link);





    /*
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($username == "Test" && $email == "Test@gmail.com" && $password == "password" && isset($_POST['submit'])){
            $smsg = "User Created Successfully.";
             header('Location: http://localhost/ICS499_ParkingManager_Prototype/htdocs/includes/login.php'); 
             exit;
        }else{
            $fmsg ="User Registration Failed";
        }
    */
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="icon" href="../../favicon.ico">-->

  <title>Coatings Tracker</title>

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
             <!-- Email Adress: <br><input type="text" name="email" size="20" pattern="[^\/;,*<>=+]*" maxlength="40" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"><br><br> -->
               Create Password: <br><input type="password" name="password" pattern="[^\/;,*<>=+]*" size="15" maxlength="20" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"><br><br>
                Confirm Password: <br><input type="password" name="confirm password" pattern="[^\/;,*<>=+]*" size="15" maxlength="20" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"><br><br>

                <input type="submit" name="submit" value="Register"><br>
            </form>
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
