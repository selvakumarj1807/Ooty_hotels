<?php

require('db.php');

$full_name = $_POST["full_name"];
$email_address = $_POST["email_address"];
$mobile_number = $_POST["mobile_number"];
$nationality = $_POST["nationality"];
$date_of_birth = $_POST["date_of_birth"];
$gender = $_POST["gender"];
$address = $_POST["address"];
$password = $_POST["password"];
$cpass = $_POST["cpass"];
$email_pass = $_POST["email_pass"];

$image_default = $_POST["image_default"];

// Default value for $image
//$image = "default_image.jpg";  // You can set this to an appropriate default image path

// Check if 'image' key is set in $_FILES array
if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
    $sourcePath = $_FILES['image']['tmp_name'];
    $targetPath = "Upload/" . $_FILES['image']['name'];
    $filename = $_FILES['image']['name'];

    if (move_uploaded_file($sourcePath, $targetPath)) {
        $image = $filename;
    } else {
        echo "Error uploading image.";
        exit;
    }
} else {
    $image = $image_default; // Use default image if no new image is provided
}

// Set u_id based on the existing user with the specified email
$res = mysqli_query($conn, "SELECT `u_id` FROM `user` WHERE `email` = '$email_pass'");
if ($row = mysqli_fetch_assoc($res)) {
    $u_id = $row['u_id'];

    // Delete the old u_id
    $deleteQuery = "DELETE FROM `user` WHERE `u_id` = '$u_id'";
    if ($conn->query($deleteQuery) !== TRUE) {
        echo "Error deleting old u_id: " . $conn->error;
        exit;
    }
}

// Use a prepared statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO `user` (`u_id`, `full_name`, `email`, `password`, `cpass`, `profile_photo_path`, `mobile_number`, `nationality`, `date_of_birth`, `gender`, `address`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE
    `full_name` = VALUES(`full_name`),
    `profile_photo_path` = VALUES(`profile_photo_path`),
    `mobile_number` = VALUES(`mobile_number`),
    `nationality` = VALUES(`nationality`),
    `date_of_birth` = VALUES(`date_of_birth`),
    `gender` = VALUES(`gender`),
    `address` = VALUES(`address`)");

$stmt->bind_param("sssssssssss", $u_id, $full_name, $email_address, $password, $cpass, $image, $mobile_number, $nationality, $date_of_birth, $gender, $address);

if ($stmt->execute()) {
    echo "<script>alert('Added/Updated Successfully!');</script>";
    echo "<script type='text/javascript'>window.location.href = 'sign-in.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>