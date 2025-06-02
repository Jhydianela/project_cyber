<?php
session_start(); // Start the session

// Check if the user is logged in (username is stored in session)
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        /* Reset default styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Body styling with background image */
body {
    font-family: Arial, sans-serif;
    background: url('3.jpg') no-repeat center center/cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Container box */
.container-box {
    background: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
    padding: 50px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 450px;
    text-align: center;
    backdrop-filter: blur(5px);
}

/* Welcome container */
.welcome-container h2 {
    color: #333;
    margin-bottom: 10px;
    font-size: 24px;
}

.welcome-container p {
    color: #555;
    font-size: 16px;
    margin-bottom: 20px;
}

/* Button styling */
.button-container {
    margin-top: 15px;
}

.form-btn {
    display: inline-block;
    text-decoration: none;
    background-color:rgb(0, 0, 0);
    color: white;
    padding: 12px 20px;
    border-radius: 5px;
    transition: 0.3s ease-in-out;
    font-size: 16px;
}

.form-btn:hover {
    background-color: rgba(21, 22, 21, 0.9);
    opacity: 0.8;
}

    </style>
</head>

</style>

<body>
    <div class="container-box">
        <div class="welcome-container">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p>You have successfully logged in.</p>
            <div class="button-container">
            <a href="logout.php" class="form-btn">Logout</a>
             </div>
        </div>
    </div>
</body>
</html>
