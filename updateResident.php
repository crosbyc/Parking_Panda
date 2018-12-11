<?php
require('mysqli_connect.php');
session_start();

  $apartmentNumber = mysqli_real_escape_string($dbc, $_POST["Appartment_Number"]);
  $name = mysqli_real_escape_string($dbc, $_POST['Name']);
  $Building = mysqli_real_escape_string($dbc, $_POST['Building']);

  $leasingPeriod = mysqli_real_escape_string($dbc, $_POST["Leasing_Period"]);
  $phoneNumber = mysqli_real_escape_string($dbc, $_POST["Phone_Number"]);
  $emailAddress = mysqli_real_escape_string($dbc, $_POST["Email_Address"]);
  $pets = mysqli_real_escape_string($dbc, $_POST['Pets']);
  $comments = mysqli_real_escape_string($dbc, $_POST['comments']);

  $Username2 = $_SESSION['username'];

$sql = "UPDATE `resident`
        SET `Appartment Number` = '".$apartmentNumber."',
            Name = '".$name."',
            Building = '".$Building."',
            `Leasing Period` = '".$leasingPeriod."',
            `Phone Number` = '".$phoneNumber."',
            `Email Address` = '".$emailAddress."',
            Pets = '".$pets."',
            comments = '".$comments."'
            WHERE `Appartment Number`='".$apartmentNumber."' and `userName` ='". $Username2. "'";
    if(mysqli_query($dbc, $sql)){
        
        mysqli_query($dbc, $sql);
        header('location: view.php?parkingSpaceUpdated=Success');
    }else{
       echo "<span>Something Went Wrong</span>";
    }
?>
