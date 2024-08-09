<?php
include_once './logic.php';

// Get the form data
$email = $_POST['username'];
$newPassword = $_POST['password'];

// Update the password
$stmt = $conn->prepare("UPDATE tbl_users SET password = ? WHERE email = ?");
$stmt->bind_param("ss", $newPassword, $email);
$stmt->execute();

// Close connections
$stmt->close();
$conn->close();

// Redirect to login page after updating the password
header("Location: login.php");
exit();
?>
