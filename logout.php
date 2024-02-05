<?php
// Set cookies with an expiration time in the past to delete them
setcookie('email', '', time() - (86400 * 30), "/");
setcookie('user_name', '', time() - (86400 * 30), "/");

// Unset and destroy the corresponding session variables
session_start(); // Make sure to start the session before destroying it
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to the login page or any other desired location
echo "<script> alert('You are Successfully Logout.! '); </script>";
echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
exit();
?>
