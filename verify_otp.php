<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = trim($_POST["otp"]);
    $email = $_SESSION['email'] ?? '';

    if ($email) {
        $stmt = mysqli_prepare($conn, "SELECT otp, otp_expiry FROM db WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $current_time = date("Y-m-d H:i:s");

            if ($entered_otp == $row['otp'] && $current_time <= $row['otp_expiry']) {
                // OTP is valid
                unset($_SESSION['otp']);
                header("Location: welcome.php"); // or your secured page
                exit();
            } else {
                header("Location: otp.php?message=❌ Invalid or expired OTP.");
                exit();
            }
        }
    }
    header("Location: login.php?message=❌ Session expired. Please login again.");
    exit();
}
?>
