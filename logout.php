<?php

/* Allows us to access the current session_start
   We put the user_id within _SESSION and use this to 
   pull in user_data */

session_start();

// Checking if user_id value is set
if(isset($_SESSION['user_id']))
{
    // Unsetting user_id value from _SESSION 
    unset($_SESSION['user_id']);
}

// Redirect user to login.php 
header("Location: login.php");
die;
?>
