<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* Reset default styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styling with background image */
body {
    font-family: Arial, sans-serif;
    background: url('3.jpg') no-repeat center center/cover; /* Add your image path */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Container for the form wrapper */
.container-box {
    background-color: rgba(90, 93, 87, 0.9); /* Semi-transparent background */
    padding: 50px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 450px;
    text-align: center;
    backdrop-filter: blur(5px); /* Blur effect for a modern UI */
}

/* Form container */
.register-container {
    background: rgb(199, 186, 70); /* Same yellowish background */
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

/* Form title */
h3 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Message styling */
.message {
    color: black;
    font-size: 14px;
    margin-bottom: 10px;
}

/* Input field styling */
.input-field {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    transition: 0.3s ease-in-out;
}

/* Highlight effect on input focus */
.input-field:focus {
    outline: none;
    box-shadow: 0 0 8px rgba(255, 249, 126, 0.94);
}

/* Submit button styling */
.form-btn {
    width: 100%;
    padding: 12px;
    background-color: rgb(0, 0, 0);
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 18px;
    cursor: pointer;
    transition: 0.3s ease-in-out;
}

.form-btn:hover {
    background-color: rgba(23, 24, 22, 0.9);
}

/* Link styling */
p {
    margin-top: 15px;
    font-size: 14px;
}

a {
    text-decoration: none;
    color: rgb(15, 19, 7);
    font-weight: bold; /* Makes the link text bold */
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
<div class="container-box">
    <div class="register-container">
        <form action="login.php" method="POST">
            <h3>Login Now</h3>

            <!-- Show messages dynamically -->
            <?php
            if (isset($_GET['message'])) {
                echo "<p class='message'>" . htmlspecialchars($_GET['message']) . "</p>";
            }
            ?>

            <input type="email" name="email" class="input-field" required placeholder="Enter your email"/>
            <input type="password" name="password" class="input-field" required placeholder="Enter your password"/>
            
            <input type="submit" name="submit" value="Login" class="form-btn"/>
            <p>Don't have an account? <a href="index.php">Register here</a></p>
        </form>
    </div>
</div>
</body>
</html>
