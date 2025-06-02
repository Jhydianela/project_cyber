<?php
session_start();
session_unset(); // Clear session variables
session_destroy(); // Destroy session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
        
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: url('3.jpg') no-repeat center center/cover;
       
    }

    .container-box {
        background: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 450px;
        backdrop-filter: blur(5px); /* Modern blur effect */
    }

    .welcome-container h2 {
        color: #333;
        margin-bottom: 10px;
    }

    .welcome-container p {
        color: #555;
        font-size: 16px;
        margin-bottom: 20px;
    }

    .button-container {
        margin-top: 15px;
    }

    .form-btn {
        display: inline-block;
        text-decoration: none;
        background-color:rgb(0, 0, 0);
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        transition: 0.3s;
    }

    .form-btn:hover {
        background-color: rgba(21, 22, 21, 0.9); /* Semi-transparent white */
        opacity: 0.8; /* Slight fade effect */
    }
</style>
</head>
<body>
    <div class="container-box">
        <div class="welcome-container">
            <h2>You have successfully logged out!</h2>
            <p>Would you like to log in again or create a new account?</p>
            <a href="System.php" class="form-btn">Login</a>
            <a href="index.php" class="form-btn">Register</a>
        </div>
    </div>
</body>
</html>
