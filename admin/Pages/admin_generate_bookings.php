<?php
require "../../Scripts/db_conn.php";
$buttonId = isset($_GET['requestType']) ? $_GET['requestType'] : '';
// the bookingsSql query joins 4 tables in order to generate the doctor info, booking id, patient info, as well as department name
// we have two because the admin can see both the previous and upcoming bookings
if ($buttonId == "admin-previous") {
    $bookingsSql = "SELECT b.booking_id, d.first_name AS doctor_first_name, d.last_name AS doctor_last_name, p.first_name AS patient_first_name, p.last_name AS patient_last_name, p.username, b.booking_date, b.booking_time, dept.dept_name 
FROM bookings b 
JOIN users d ON b.doctor_id = d.user_id 
JOIN medical_staff ms ON d.user_id = ms.staff_id 
JOIN departments dept ON ms.department_id = dept.dept_id 
JOIN users p ON b.patient_id = p.user_id 
WHERE CONCAT(b.booking_date, ' ', b.booking_time) < NOW() 
ORDER BY b.booking_date, b.booking_time";
} else if
($buttonId == "admin-upcoming") {
    $bookingsSql = "SELECT b.booking_id, d.first_name AS doctor_first_name, d.last_name AS doctor_last_name, p.first_name AS patient_first_name, p.last_name AS patient_last_name, p.username, b.booking_date, b.booking_time, dept.dept_name 
FROM bookings b 
JOIN users d ON b.doctor_id = d.user_id 
JOIN medical_staff ms ON d.user_id = ms.staff_id 
JOIN departments dept ON ms.department_id = dept.dept_id 
JOIN users p ON b.patient_id = p.user_id 
WHERE CONCAT(b.booking_date, ' ', b.booking_time) > NOW() 
ORDER BY b.booking_date, b.booking_time";
} else {
    die();
}

if ($bookingsResults = mysqli_query($db, $bookingsSql)) {
    if (mysqli_num_rows($bookingsResults) == 0) {
        echo "<h1 style='text-align:center; color:#201db1 ;'>No bookings found.</h1>"; // if no bookings we display to the admin
    } else {
        // we create a table variable to fill with the html for vreating the table and also the booking information
        // based on which bookings the admin wants to see we create two variables
        //the upcoming table also has a delete button to cancel booking
        if ($buttonId == "admin-previous") {
            $table = "<table id='bookings-table'><tr><th>Booking ID</th><th>Department</th><th>Doctor</th><th>Patient</th><th>Patient's username</th><th>Date</th><th>Time</th></tr>";
            while ($row = mysqli_fetch_array($bookingsResults)) {
                $table .= "<tr><td>{$row['booking_id']}</td><td>{$row['dept_name']}</td><td>{$row['doctor_first_name']} {$row['doctor_last_name']}</td><td>{$row['patient_first_name']} {$row['patient_last_name']}</td><td>{$row['username']}</td><td>{$row['booking_date']}</td><td>{$row['booking_time']}</td>";
            }
            $table .= "</table>";
            echo $table;
        } else if ($buttonId == "admin-upcoming") {
            $table = "<table id='bookings-table'><tr><th>Booking ID</th><th>Department</th><th>Doctor</th><th>Patient</th><th>Patient's username</th><th>Date</th><th>Time</th><th>Action</th></tr>";
            while ($row = mysqli_fetch_array($bookingsResults)) {
                $table .= "<tr><td>{$row['booking_id']}</td><td>{$row['dept_name']}</td><td>{$row['doctor_first_name']} {$row['doctor_last_name']}</td><td>{$row['patient_first_name']} {$row['patient_last_name']}</td><td>{$row['username']}</td><td>{$row['booking_date']}</td><td>{$row['booking_time']}</td><td><a style='text-decoration: none; color:red;' href='delete_booking.php?id={$row['booking_id']}'>Cancel</a></td>";
            }
            $table .= "</table>";
            echo $table;
        }
    }
}