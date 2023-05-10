<?php
//require the header and 
require "header.php";
echo "<a href='booking_page.php' class='back-button'>Back</a>";
echo "<h1 style='text-align:center; color:#201db1; margin-top: 50px;'>Upcoming Bookings</h1>";
//if the session variable table is set echo the table that includes the upcoming bookings
if (isset($_SESSION['table'])) {
    echo $_SESSION['table'];
}
?>