<?php

 //Will need this in the future
// Inialize session
session_start();

// Delete certain session
unset($_SESSION['username']);
// Delete all session variables
session_destroy();

// Jump to login page
header('Location: login.php');


?>