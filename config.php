<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'parkingpanda');

$dbc = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME)OR die ('Could not connect to 
MySQL: ' .mysqli_connect_error() );

//set the encoding
mysqli_set_charset($dbc, 'utf8');


