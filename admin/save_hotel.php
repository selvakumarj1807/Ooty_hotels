            <?php

            require('db.php');
            $hotel_name = $_POST["hotel_name"];
            $city = $_POST["city"];

            $district = $_POST["district"];
            $state = $_POST["state"];
            $pincode = $_POST["pincode"];

            $original_cost = $_POST["original_cost"];
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
            $res = mysqli_query($conn, "SELECT * FROM `hotels`");
            $no = mysqli_num_rows($res) + 1;

            // Updated SQL query to insert multiple images
            $sql = "INSERT INTO `hotels`(`h_id`, `hotel_name`, `hotel_address`, `image_path`, `original_cost`, `discount_cost`, `tax_amount`, `adult`, `child`, `district`, `hotel_state`, `pincode`, `phone`)
VALUES ('hotel_$no', '$hotel_name', '$city', '$image', '$original_cost', '$discount_cost', '$tax_amount', '$adult', '$child', '$district', '$state', '$pincode', '$phone')";

            if ($conn->query($sql) == TRUE) {
                echo "<script>alert('Added  Successfully!');</script>";
                echo "<script type='text/javascript'>
window.location.href = 'hotel.php';
</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }


            ?>
