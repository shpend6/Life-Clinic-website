<?php
// require the header
require 'admin_header.php';
// if the booking_deletion session variable was set and is ture
if ((isset($_SESSION["booking_deletion"])) && ($_SESSION["booking_deletion"] == true)) {
    // the booking was deleted and alert the user
    echo "<script>alert('Booking deleted successfully.')</script>";
    // and unset the session variable
    unset($_SESSION["booking_deletion"]);
}
// otherwise the booking was not successful, alert the user duly, and unsert the vraible
else if ((isset($_SESSION["booking_deletion"])) && ($_SESSION["booking_deletion"] == false)) {
    echo "<script>alert('Booking was not deleted successfully.')</script>";
    unset($_SESSION["booking_deletion"]);
}
?>

<div class="bookings-buttons">
    <a href="?requestType=admin-previous" id="admin-previous">Show Previous Appointments</a>
    <a href="?requestType=admin-upcoming" id="admin-upcoming">Show Upcoming Appointments</a>
</div>
<div id="booking-table">
    <!-- if the varaible request type is set, include the scrip to genereate bookings -->
    <?php
    if (isset($_GET['requestType'])) {
        include('admin_generate_bookings.php');
    }
    ?>
</div>