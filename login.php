<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = mysqli_prepare($conn, "SELECT id, username, password FROM db WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row["password"])) {
            // Generate OTP
            $otp = rand(100000, 999999);
            $otp_expiry = date("Y-m-d H:i:s", time() + 300); // 5 mins expiry

            // Store OTP
            $update_stmt = mysqli_prepare($conn, "UPDATE db SET otp = ?, otp_expiry = ? WHERE email = ?");
            mysqli_stmt_bind_param($update_stmt, "sss", $otp, $otp_expiry, $email);
            mysqli_stmt_execute($update_stmt);
            mysqli_stmt_close($update_stmt);

            // Store info in session
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $row['username'];
            $_SESSION['otp'] = $otp;

            // Redirect to OTP input
            header("Location: otp.php");
            exit();
        } else {
            header("Location: System.php?message=❌ Invalid email or password.");
            exit();
        }
    } else {
        header("Location: System.php?message=❌ Invalid email or password.");
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
