<?php

/* Where server information would
   be inserted */

$dbhost = "localhost";

// Default user is root 
$dbuser = "root";

// No password for root 
$dbpass = "";

// Name of DB goes here 
$dbname = "login_sample_db";

/* If connection cannot be made, this displays error */
if (!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Failed to connect!");
}
?>
