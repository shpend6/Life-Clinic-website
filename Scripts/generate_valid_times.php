<?php
// in this script we generate the valid times for a specific date and a specific doctor, 
//also taking into account the client;s own existing bookings
session_start();
require 'db_conn.php';
$doctors_arr = $_SESSION['doctor_list'];
$patient_id = $_SESSION['id']; // we get the id of the client currently logged in
$startTime = strtotime("08:00");
$endTime = strtotime("17:00");
$booked_times = array();
$doctor_name = $_POST['doctor'];
$time = $_POST['date'];
if (!$doctor_name || !$time) { // if one of the doctor or dates isnt picked yet we dont show the available times
    echo "<option value=''>Pick time</option>";
    die();
}
//we get the id of the doctor picked
foreach ($doctors_arr as $key => $value) {
    if ($value == $doctor_name) {
        $doctor_id = $key;
    }
}
// we query the database to get all the bookings of the doctor picked at the date picked, and the client logged in
$sqlBookings = "SELECT * FROM bookings WHERE doctor_id=$doctor_id AND booking_date='$time' OR patient_id=$patient_id AND booking_date='$time'";
$result = mysqli_query($db, $sqlBookings);
while ($row = mysqli_fetch_array($result)) {
    $booked_times[] = substr($row['booking_time'], 0, 5); // we format and add all booked times to our array
}
$times = '<select name="time" required><option value="" placeholder="Pick time"></option>';
while ($startTime < $endTime) {
    $timeSlot = date("H:i", $startTime);
    if (!in_array($timeSlot, $booked_times)) {
        $times .= "<option value='$timeSlot'>$timeSlot</option>";
    } else {
        $times .= "<option disabled>$timeSlot (booked)</option>"; // we disable the user being able to pick the booked times
    }
    $startTime = strtotime("+1 hour", $startTime);
}
$times .= "</select>";
echo $times;

?>