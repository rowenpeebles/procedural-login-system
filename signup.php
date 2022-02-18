<?php

/* Allows us to access the current session_start 
   We put user_id within _SESSION and use this to 
   pull in user_data */

session_start();

    include("connection.php");
    include("functions.php");
    
/* Action if the user has clicked on 
   the 'post' button */

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        /* Something was posted so we can collect
           data from the POST variable */

        // Assign POST username to user_name 
        $user_name = $_POST['user_name'];

        // Assign POST password to password 
        $password = $_POST['password'];

/* Checking that both fields are not empty 
   before signing user up */

        if (!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            // Creating random user_id
            $user_id = random_num(20);

            // Save to database 
            $query = "insert into users (user_id,user_name,password) 
                values ('$user_id','$user_name','$password')";

            mysqli_query($con, $query);

            // Redirect to login         
            header("Location: login.php");
            die;  
        }
        
/* If user has failed to enter both 
   a user_name and password */

        else
        {
            echo "Please enter a username and password!";
        }
    }
?>

<!DOCTYPE html>

<html>

<head>

    <title>Signup</title>

</head>

<body style="background-color: lightgrey";>

    <style type="text/css">

    #text{
        height: 25px;
        width: 290px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
    }

    #button{
        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightgreen;
        border: none;
        border-radius: 5px; 
    }

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
    
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size:20px;margin-bottom:20px;color:black;">Register your account</div>

            <label>Username..</label>
            <input id="text" type="text" name="user_name"><br><br>
            
            <label>Password..</label>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Signup"><br><br>

            <a href="login.php">Click here to login</a><br><br>
    </div>
            

</body>
</html>
