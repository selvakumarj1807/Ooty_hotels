<?php
require('db.php');

$email = $_POST["email"];
$current_pass = $_POST["current_pass"];
$new_pass = $_POST["new_pass"];
$confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

// Check if the current password is correct before updating
$sql_check = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$current_pass'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Current password is correct, proceed with the update
    //$hashed_new_pass = password_hash($new_pass, PASSWORD_DEFAULT); // Hash the new password

    $update_sql = "UPDATE `user` SET `password`='$confirm_pass', `cpass`='$confirm_pass' WHERE `email`='$email'";
    
    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('User Password Updated Successfully!');</script>";
        echo "<script>window.location.href = 'sign-in.php';</script>";
    } else {
        echo "<script>alert('Error updating password: " . $conn->error . "');</script>";
        echo "<script>window.location.href = 'edit_profile.php';</script>";
    }
} else {
    // Current password is incorrect
    echo "<script>alert('Current Password is invalid');</script>";
    echo "<script>window.location.href = 'edit_profile.php';</script>";
}

$conn->close();
?>
