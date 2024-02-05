<?php

require('db.php');
/*$fname = $_POST["fname"];
$lname = $_POST["lname"];

$phone = $_POST["phone"];*/
$email = $_POST["email"];
$password = $_POST["password"];

$cpass = $_POST["cpass"];
/*
$discount_cost = $_POST["discount_cost"];
$tax_amount = $_POST["tax_amount"];
$adult = $_POST["adult"];
$child = $_POST["child"];
$phone = $_POST["phone"];



//$img  = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 

$sourcePath = $_FILES['image']['tmp_name'];
$targetPath = "Upload/" . $_FILES['image']['name'];
$filename = $_FILES['image']['name'];
if (move_uploaded_file($sourcePath, $targetPath)) {
    $image = $filename;
}
*/
$res = mysqli_query($conn, "SELECT * FROM `user`");
$no = mysqli_num_rows($res) + 1;

// Updated SQL query to insert multiple images
$sql = "INSERT INTO `user`(`u_id`, `email`, `password`, `cpass`)
VALUES ('user_$no', '$email', '$password', '$cpass')";

$sql1 = "INSERT INTO `user_details`(`u_id`, `email`, `password`, `cpass`)
VALUES ('user_$no', '$email', '$password', '$cpass')";


if ($conn->query($sql) == TRUE && $conn->query($sql1) === TRUE) {
    echo "<script>alert('Added  Successfully!');</script>";
    echo "<script type='text/javascript'>
window.location.href = 'sign-in.php';
</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
