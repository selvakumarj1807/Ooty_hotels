<?php

require('db.php');

$booking_id = $_GET["booking_id"];
$cancel_value = "Cancel";

// Check if the user has confirmed the cancellation
if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    $sql = "UPDATE `guests` SET `b_status`='$cancel_value' WHERE `booking_id`= '$booking_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                window.location.href = 'account-bookings.php';
              </script>";
    }
} else {
    // If user cancels the operation, redirect back to the bookings page
    echo "<script>
            if (window.confirm('Are you sure you want to cancel?')) {
                window.location.href = 'cancel_booking.php?booking_id=$booking_id&confirm=true';
            } else {
                window.location.href = 'account-bookings.php';
            }
          </script>";
}
?>
