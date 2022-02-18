<?php

/* Allows us to access the current session_start
   We put user_id within _SESSION and use this to
   pull in user_data */

session_start();

    include("connection.php"); 
    include("functions.php");
    
/* Calling check_login function, redirects user 
   to login.php if user not logged in already */

    $user_data = check_login($con);
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // Direct to logout 
        header("Location: logout.php");
        die;
    }
?>

<!DOCTYPE html>

<html>

<head>

    <title>Dashboard</title>

</head>

<body style="background-color: lightgrey;">
    
    <style type="text/css">

    #box{      
        background-color: #FFF;
        margin-top: 200px;
        margin-left: auto;
        margin-right: auto;
        width: 300px;
        padding: 20px;
        border: 1px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    #button{
        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightgreen;
        border: none;
        border-radius: 5px;
    }

    </style>

    <div id="box">
        
        <form method="post">
            <div style="font-size:20px;margin:10px;color:black;">
            Welcome <?php echo $user_data['user_name'];?>..<br><br>
        
            <input id="button" type="submit" value="Logout"><br><br>

</body>

</html>
