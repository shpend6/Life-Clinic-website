<?php require "header.php";
echo "<a href='booking_page.php' class='back-button'>Back</a>";
echo "<h1 style='text-align:center; color:#201db1; margin-top: 50px;'>Upcoming Bookings</h1>";
if (isset($_SESSION['table'])) {
    echo $_SESSION['table'];
}

?>