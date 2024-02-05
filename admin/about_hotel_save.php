<?php
require('db.php');

$hotel_name = $_POST["hotel_name"];
$address = $_POST["address"];
$hotel_description = $_POST["hotel_description"];
$activities = $_POST["activities"];
$services = $_POST["services"];



if (isset($_POST['submit'])) {
    $countfiles = count($_FILES['image']['name']);
    $imagePaths = [];

    for ($i = 0; $i < $countfiles; $i++) {
        $filename = $_FILES['image']['name'][$i];
        $tmpFilePath = $_FILES['image']['tmp_name'][$i];

        if ($tmpFilePath != "") {
            // Move the file to a server directory
            $newFilePath = "Upload/" . $filename;
            move_uploaded_file($tmpFilePath, $newFilePath);
            $imagePaths[] = $newFilePath;
        }
    }

    // Insert hotel information with multiple image paths
    $imagePathsJson = json_encode($imagePaths); // Convert to JSON for storage

    $res = mysqli_query($conn, "SELECT * FROM `about_hotel`");
    $no = mysqli_num_rows($res) + 1;

    // Get paragraphs from the form
    $paragraphs = $_POST['hotel_description'];
	// Convert indoor_amenities array to a comma-separated string
    $activities = implode(', ', $_POST['activities']);

    // Convert outdoor_amenities array to a comma-separated string
    $services = implode(', ', $_POST['services']);


    // Validate and sanitize input as needed

    

    // Updated SQL query to insert multiple images
   /* $sql = "INSERT INTO `about_hotel`(`h_id`, `hotel_name`, `address`, `image_path`)
            VALUES ('hotel_$no', '$hotel_name', '$address', '$imagePathsJson')";*/

$sql = "INSERT INTO about_hotel (h_id, hotel_name, address, image_path, hotel_description, activities, services) VALUES (?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $no, $hotel_name, $address, $imagePathsJson, $paragraphs, $activities, $services);


    if ($stmt->execute()) {
        echo "<script>alert('Added Successfully!');</script>";
        echo "<script type='text/javascript'>
        window.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<?php
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get paragraphs from the form
    $paragraphs = $_POST['hotel_description'];
	// Convert indoor_amenities array to a comma-separated string
    $activities = implode(', ', $_POST['activities']);

    // Convert outdoor_amenities array to a comma-separated string
    $services = implode(', ', $_POST['services']);


    // Validate and sanitize input as needed

    // Database connection
    require('db.php'); // Include your database connection file

    // Insert paragraphs into the database
    $sql = "INSERT INTO about_hotel (hotel_description, activities, services) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $paragraphs, $activities, $services);

    if ($stmt->execute()) {
        echo "Paragraphs stored successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
*/
?>

