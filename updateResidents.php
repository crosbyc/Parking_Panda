<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>Update Resident</title>

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
                    <li><a href="view.php">View Parking Information</a></li>
                    <li><a href="insertResidentInfo.php">Add Resident Informatoin</a></li>
                    <li><a href="insertParkingInfo.php">Add Parking Information</a></li>
                    <?php
                        session_start();
                        
                        if($_SESSION['isManager'] == true){
                            echo "<li><a href='RegisterAssistant.php'>Register Office Assistant</a></li>";
                        }

                    ?>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header text-center">Update Resident</h1>
<?php
require('mysqli_connect.php');

 // if (isset($_POST['category'])){

  //  $name = "Planning";
  $Username2 = $_SESSION['username'];
    $sql = "SELECT * FROM `resident`
            WHERE `userName` ='". $Username2. "'";
    $result = $dbc->query($sql);
    if (!$result = $dbc->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if
  
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
            echo '<form class="form" action="updateResident.php" method="POST">
              Appartment Number: <br> <input type="text" name="Appartment_Number" value="'.$row["Appartment Number"].'" maxlength="255" readonly> <br>
              Name: <br> <input type="text" name="Name" value="'.$row["Name"].'" maxlength="255"> <br>
              Building: <br> <input type="text" name="Building" value="'.$row["Building"].'"  maxlength="255" required> <br>

              Leasing Period: <br> <input type="text" name="Leasing_Period" value="'.$row["Leasing Period"].'"  maxlength="255"> <br>
              Phone Number: <br> <input type="text" name="Phone_Number" value="'.$row["Phone Number"].'"  maxlength="255"> <br>
              Email Address: <br> <input type="text" name="Email_Address" value="'.$row["Email Address"].'"  maxlength="255"> <br>
              Pets: <br> <input type="text" name="Pets" value="'.$row["Pets"].'"  maxlength="255"> <br>
              Comments: <br> <input type="text" name="comments" value="'.$row["comments"].'" maxlength="75"> <br> 
              <button type="submit" name="submit" class="btn btn-success btn-sm">Update Resident</button>
            </form>';

      }//end while
  }//end if



  else {
      echo "0 results";
  }//end else

?>

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


