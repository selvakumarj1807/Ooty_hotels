<?php

require('db.php');

$hotel_name = $_GET["hotel_name"];
$hotel_img = $_GET["hotel_img"];
$hotel_add = $_GET["hotel_add"];
$orignal_cost = $_GET["orignal_cost"];
$discount_Cost = $_GET["discount_Cost"];
$email = $_GET["email"];

// Check if the record already exists in the wishlist
$sqlCheck = "SELECT * FROM `wishlist` WHERE `hotel_name` = '$hotel_name' AND `email` = '$email'";
$resultCheck = $conn->query($sqlCheck);

if ($resultCheck->num_rows > 0) {
    // Record already exists, you may want to update the existing record or handle it as needed
    echo "<script>alert('This item is already in your wishlist!');</script>";
} else {
    // Record does not exist, insert it
    $sql = "INSERT INTO `wishlist`(`hotel_name`, `hotel_img`, `hotel_add`, `orignal_cost`, `discount_Cost`, `email`)
    VALUES ('$hotel_name', '$hotel_img', '$hotel_add', '$orignal_cost', '$discount_Cost', '$email')";

    if ($conn->query($sql) == TRUE) {
        echo "<script>alert('Added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Redirect back to the last working page
echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";

?>
