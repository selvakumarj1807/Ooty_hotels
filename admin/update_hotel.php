<?php
require('db.php');

$id = $_POST['id'];
$hotel_name = $_POST["hotel_name"];
$address = $_POST["city"];

$pincode = $_POST["pincode"];

$district = $_POST["district"];
$hotel_state = $_POST["state"];

$original_cost = $_POST["original_cost"];
$discount_cost = $_POST["discount_cost"];

$tax_amount = $_POST["tax_amount"];

$adult = $_POST["adult"];
$child = $_POST["child"];
$phone = $_POST["phone"];



//$image=$_POST['image'];



//image1


if ($_FILES['image']['tmp_name'] != '') {
   $sourcePath1 = $_FILES['image']['tmp_name'];
   $targetPath1 = "Upload/" . $_FILES['image']['name'];
   $filename1 = $_FILES['image']['name'];
   if (move_uploaded_file($sourcePath1, $targetPath1)) {
      $image = $filename1;
   }
   $sql = "UPDATE `hotels` SET `hotel_name`='{$hotel_name}',`hotel_address`='{$address}',`image_path`='{$image}',`original_cost`='{$original_cost}',`discount_cost`='{$discount_cost}'
 ,`tax_amount`='{$tax_amount}',`adult`='{$adult}',`child`='{$child}',`pincode`='{$pincode}',`district`='{$district}',`hotel_state`='{$hotel_state}',`phone`='{$phone}' WHERE `id`='$id'";
}
if ($_FILES['image']['tmp_name'] == '') {
   $sourcePath1 = $_FILES['image']['tmp_name'];
   $targetPath1 = "Upload/" . $_FILES['image']['name'];
   $filename1 = $_FILES['image']['name'];
   if (move_uploaded_file($sourcePath1, $targetPath1)) {
      $image = $filename1;
   }
   $sql = "UPDATE `hotels` SET  `hotel_name`='{$hotel_name}'
WHERE `id`='$id'";
}




if ($conn->query($sql) == TRUE) {
   echo "<script>alert('Updated Successfully!');</script>";
   echo "<script type='text/javascript'>

window.location.href = 'hotel.php';
</script>";
}
if ($conn->$connect_error) {


   echo "Error: " . $sql . "<br>" . $conn->error;
}
