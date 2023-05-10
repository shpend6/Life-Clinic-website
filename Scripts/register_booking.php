<?php
// this script registers the booking after the user fills valid data
session_start();
require 'db_conn.php';
$doctors_arr = $_SESSION['doctor_list'];
$patient_id = $_SESSION['id']; // we get the id of the client currently logged in
$doctor_name = $_POST['doctor'];
$date = $_POST['date'];
$time = $_POST['time'];
//we get the id of the doctor picked
foreach ($doctors_arr as $key => $value) {
    if ($value == $doctor_name) {
        $doctor_id = $key;
    }
}
'<br>';
echo $doctor_id;
$sql = "INSERT INTO bookings (doctor_id, patient_id, booking_date, booking_time)
VALUES ('$doctor_id', '$patient_id', '$date', '$time');";
// we added some error handling in case database connection failure
if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (mysqli_query($db, $sql)) {
    echo "Records inserted successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
header('Location: ../Pages/booking_page.php');


?>