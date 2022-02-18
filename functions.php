<?php

/* A function to check if the user is 
   already logged in, if not, user 
   is redirected to login.php */

function check_login($con)
{
    // Checking if user_id value is set and is legit 
    if (isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];

        // Sending query to DB
        $query = "select * from users where user_id = $id limit 1";

        // Read from DB 
        $result = mysqli_query($con,$query);

        // Is the result positive?
        if ($result && mysqli_num_rows($result) > 0)
        {
            // Assigning assoc of result to user_data 
            $user_data = mysqli_fetch_assoc($result);
            return $user_data; 
        }
    }

    // Redirect to login page
    header("Location: login.php");
    die;
}

/* A function to generate a random 
   number for user_id */

function random_num($length)
{
    $text = "";
    
    // Making sure length is never < 5
    if ($length < 5)
    {
        $length = 5;
    }
    
/* Creating new length variable 'len'
   assigning it random value between 
   '4' and 'length' */

    $len = rand(4,$length);

    for ($i = 0; $i < $len; $i++)
    {
        /* Each iteration adds a randum number
           between 0 & 9 to 'text' */

        $text .= rand(0,9);
    } 
    
    // Returning random number
    return $text;
}
?>
