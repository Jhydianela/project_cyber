<?php
session_start();
if (!isset($_SESSION['otp'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
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
    background: rgb(199, 186, 70); /* Matching yellowish background */
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

    </style>
</head>
<body>
<div class="container-box">
    <div class="register-container">
        <form action="verify_otp.php" method="POST">
            <h3>Enter OTP</h3>
            <p>Your OTP is: <strong><?php echo htmlspecialchars($_SESSION['otp']); ?></strong></p>
            <input type="text" name="otp" class="input-field" required placeholder="Enter OTP code"/>
            <input type="submit" name="submit" value="Verify OTP" class="form-btn"/>
        </form>
    </div>
</div>
</body>
</html>