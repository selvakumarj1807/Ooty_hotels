<?php
// Assuming you have already established a database connection
require('db.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the main guest's details
    $hotel_names = $_POST["hotel_names"];
    $h_address = $_POST["address"];
    $district = $_POST["district"];
    $h_state = $_POST["state"];
    $pincode = $_POST["pincode"];
    $phone = $_POST["phone"];
    $check_in_out = $_POST["check_in_out"];
    $guests_rooms = $_POST["guests_rooms"];
    $h_image = $_POST["image"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $guest_email = $_POST["guest_email"];
    $guest_phone = $_POST["gust_phone"];
    $bokking_status = "Booked";

    // Insert main guest's details into the database
    // Example SQL query (replace with your actual table and column names)
    $res = mysqli_query($conn, "SELECT * FROM `guests` where hotel_names= '$hotel_names'");
    $no = mysqli_num_rows($res) + 1;
    $booking_id = $hotel_names . '_' . $no;

    $sql = "INSERT INTO guests (booking_id, hotel_names, h_address, district, h_state, pincode, phone, check_in_out, guests_rooms, h_image, first_name, last_name, guest_email, gust_phone, b_status) 
    VALUES ('$booking_id', '$hotel_names', '$h_address', '$district', '$h_state', '$pincode', '$phone', '$check_in_out', '$guests_rooms', '$h_image', '$first_name', '$last_name', '$guest_email', '$guest_phone', '$bokking_status')";
    // Execute the query
    mysqli_query($conn, $sql);

    // Retrieve and store additional guest details
    if (isset($_POST['guestFirstName']) && is_array($_POST['guestFirstName']) && isset($_POST['guestLastName']) && is_array($_POST['guestLastName'])) {
        $guestFirstNames = $_POST['guestFirstName'];
        $guestLastNames = $_POST['guestLastName'];

        // Iterate over each additional guest
        for ($i = 0; $i < count($guestFirstNames); $i++) {
            $guestFirstName = $guestFirstNames[$i];
            $guestLastName = $guestLastNames[$i];

            // Insert additional guest's details into the database
            // Example SQL query (replace with your actual table and column names)
            $sql = "INSERT INTO guests (booking_id, first_name, last_name) VALUES ('$booking_id', '$guestFirstName', '$guestLastName')";
            // Execute the query
            mysqli_query($conn, $sql);
        }
    }

    // Redirect or display success message
    // For example:
    // header("Location: success.php");
    // exit;

    echo "<script>alert('Booked Successfully!');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
}

?>
