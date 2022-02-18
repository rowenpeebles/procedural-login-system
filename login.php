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
   before logging user in */

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            // Read from database using user_name 
            $query = "select * from users where user_name = '$user_name' limit 1";

            // Saving query to 'result'
            $result = mysqli_query($con, $query);

/* Checking if the result data is correct
   and valid */

            // If result is successful
            if($result)
            {
                // If result is greater tha 1
                if($result && mysqli_num_rows($result) > 0)
                {
                    // Assigning assoc of result to user_data 
                    $user_data = mysqli_fetch_assoc($result);

/* Checking if user_data password is 
   the same as the POST pasword */

                    if($user_data['password'] === $password)
                    {
                        // Assign _SESSION the user_id 
                        $_SESSION['user_id'] = $user_data['user_id'];

                        // Direct to index page 
                        header("Location: index.php");
                        die;
                    }
                }
            }

/* If result was not successful
   display error */

            echo "Wrong username or password! Try again..";
        }

        else
        {
            echo "Wrong username or password! Try again..";
        }
    }
?>

<!DOCTYPE html>

<html>

<head>

    <title>Login</title>

</head>

<body style="background-color: lightgrey;">

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
            <div style="font-size:20px;margin-bottom:20px;color:black;">Enter your details</div>
            
            <label>Username..</label>
            <input id="text" type="text" name="user_name"><br><br>

            <label>Password..</label>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Login"><br><br> 

            <a href="signup.php">Click here to signup</a><br><br>
    </div>

</body>
</html>
