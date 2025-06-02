<?php
session_start();
require 'db.php'; // Ensure this file contains a proper database connection

if (!isset($_GET['code']) || empty($_GET['code'])) {
    header("Location: index.php?message=❌ No verification code provided.");
    exit();
}

$verification_code = trim($_GET['code']);

// Ensure the database connection is active
if (!$conn) {
    die("❌ Database connection failed: " . mysqli_connect_error());
}

// Check if the user exists with the given verification code
$stmt = $conn->prepare("SELECT email, verified FROM db WHERE verification_code = ? LIMIT 1"); // Fixed table name
$stmt->bind_param("s", $verification_code);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("❌ Error retrieving data: " . mysqli_error($conn));
}

$user = $result->fetch_assoc();

if ($user) { 
    if ($user['verified'] != 1) { // Verify the account if not already verified
        $update_stmt = $conn->prepare("UPDATE db SET verified = 1 WHERE email = ?");
        $update_stmt->bind_param("s", $user['email']);
        $update_stmt->execute();
        $update_stmt->close();

        // Redirect to login page with success message
        header("Location: System.php?message=✅ Account verified successfully! Please log in.");
        exit();
    } else {
        header("Location: index.php?message=⚠️ Your account is already verified.");
        exit();
    }
} else {
    header("Location: index.php?message=❌ Invalid verification link.");
    exit();
}

// Close database connections
$stmt->close();
$conn->close();
?>
