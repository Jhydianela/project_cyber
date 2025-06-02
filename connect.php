<?php
require 'db.php'; // ✅ Load shared DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"], $_POST["email"], $_POST["password"])) {
        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        $userIP = $_SERVER['REMOTE_ADDR'];

        // ✅ Check if IP already registered 3 times today
        $check_ip_sql = "SELECT COUNT(*) FROM registration_logs WHERE ip_address = ? AND DATE(created_at) = CURDATE()";
        $stmt_ip = mysqli_prepare($conn, $check_ip_sql);
        mysqli_stmt_bind_param($stmt_ip, "s", $userIP);
        mysqli_stmt_execute($stmt_ip);
        mysqli_stmt_bind_result($stmt_ip, $count);
        mysqli_stmt_fetch($stmt_ip);
        mysqli_stmt_close($stmt_ip);

        if ($count >= 3) {
            header("Location: index.php?message=You have reached the daily registration limit from this IP.");
            exit();
        }

        // Check if email already registered
        $stmt = mysqli_prepare($conn, "SELECT email FROM db WHERE email = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            header("Location: index.php?message=This email is already registered!");
            exit();
        } else {
            // Secure password and verification code
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $verification_code = md5(uniqid($email, true));

            $stmt = mysqli_prepare($conn, "INSERT INTO db (username, email, password, verification_code, verified) VALUES (?, ?, ?, ?, 0)");
            mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashed_password, $verification_code);

            if (mysqli_stmt_execute($stmt)) {
                // ✅ Log the registration
                $log_sql = "INSERT INTO registration_logs (ip_address) VALUES (?)";
                $log_stmt = mysqli_prepare($conn, $log_sql);
                mysqli_stmt_bind_param($log_stmt, "s", $userIP);
                mysqli_stmt_execute($log_stmt);
                mysqli_stmt_close($log_stmt);

                header("Location: index.php?message=Account created. Click the login ");
                exit();
            } else {
                header("Location: index.php?message=Database Error: " . urlencode(mysqli_error($conn)));
                exit();
            }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        header("Location: index.php?message=Please fill out all fields.");
        exit();
    }
}
?>
