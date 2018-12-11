<?php
require('mysqli_connect.php');
session_start();

  $spotNumber = mysqli_real_escape_string($dbc, $_POST["Spot_Number"]);
 
  $location = mysqli_real_escape_string($dbc, $_POST['Location']);
  $type = mysqli_real_escape_string($dbc, $_POST['Type']);
  $building = mysqli_real_escape_string($dbc, $_POST['Building']);
  $comments = mysqli_real_escape_string($dbc, $_POST['comments']);
  $Username2 = $_SESSION['username'];

$sql = "UPDATE `parking space`
        SET `Spot Number` = '".$spotNumber."',
            Location = '".$location."',
            Type = '".$type."',
            Building = '".$building."',
            comments = '".$comments."'
            WHERE `Spot Number`='".$spotNumber."' and `userName` ='". $Username2. "'";
    if(mysqli_query($dbc, $sql)){
        
        mysqli_query($dbc, $sql);
        header('location: view.php?parkingSpaceUpdated=Success');
    }else{
       echo "<span>Something Went Wrong</span>";
    }
?>
