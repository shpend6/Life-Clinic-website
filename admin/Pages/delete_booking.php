<?php require "../../Scripts/db_conn.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];
} else {
    die();
}
$sql = "DELETE FROM bookings where booking_id = $booking_id";
if (mysqli_query($db, $sql)) {
    $_SESSION['booking_deletion'] = true;
    header("Location: admin_bookings.php");
} else {
    $_SESSION['booking_deletion'] = false;
    header("Location: admin_bookings.php");
}

?>