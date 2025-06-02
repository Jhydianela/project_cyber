<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   <style>
   
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {
    font-family: Arial, sans-serif;
    background: url('3.jpg') no-repeat center center/cover; 
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}


.container-box {
    background-color: rgba(90, 93, 87, 0.9); 
    padding: 50px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 450px;
    text-align: center;
    backdrop-filter: blur(5px);
}


.register-container {
    background:rgb(199, 186, 70);
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}


h3 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}


.message {
    color: red;
    font-size: 14px;
    margin-bottom: 10px;
}


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


.input-field:focus {
    
    outline: none;
    box-shadow: 0 0 8px rgba(255, 249, 126, 0.94);
}


.form-btn {
    width: 100%;
    padding: 12px;
    background-color:rgb(0, 0, 0);
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

p {
    margin-top: 15px;
    font-size: 14px;
}

a {
    text-decoration: none;
    color:rgb(15, 19, 7);
    font-weight: bold; 
}

a:hover {
    text-decoration: underline;
}
.recaptcha-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 18px 30px;
    width: 80%;
    height: 50px; 
    padding: 5px;
    transform: scale(0.85); 
}




   </style>
</head>
<body>
    <div class="container-box">
        <div class="register-container">
            <form action="connect.php" method="POST">
                <h3>Register Now</h3>

          
                <?php
                if (isset($_GET['message'])) {
                    echo "<p class='message'>" . htmlspecialchars($_GET['message']) . "</p>";
                }
                ?>

                <input type="text" name="username" class="input-field" required placeholder="Enter your name" />
                <input type="email" name="email" class="input-field" required placeholder="Enter your email" />
                <input type="password" name="password" class="input-field" required placeholder="Enter your password" />
            
                <input type="submit" name="submit" value="Register Now" class="form-btn" />

                <p>Already have an account? <a href="System.php">Login here</a></p>
            </form>
        </div>
    </div>
</body>
</html>