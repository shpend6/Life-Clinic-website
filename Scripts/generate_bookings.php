<?php
/* checking if the session has been already started, in other files we have included this script \
so it doesn't throw an error:IGNORING SESSION START*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'db_conn.php'; /* including the database connection file*/
$buttonId = isset($_GET['requestType']) ? $_GET['requestType'] : ''; // we get the $_GET info from the buttons
$user_id = $_SESSION['id'];
// sicne we have two buttons one for upcoming and one for previous bookings use an if statement to check
if ($buttonId == "upcoming") { // this query gets all the bookings where date and time are in the future
    $bookingsSql = "SELECT * FROM bookings 
                WHERE patient_id=$user_id AND 
                      CONCAT(booking_date, ' ', booking_time) > NOW() 
                ORDER BY booking_date, booking_time";
} else if ($buttonId == "previous") { // this query gets all the bookings where date and time are in the past
    $bookingsSql = "SELECT * FROM bookings 
                WHERE patient_id=$user_id AND 
                      CONCAT(booking_date, ' ', booking_time) < NOW() 
                ORDER BY booking_date, booking_time";
} else {
    die();
}
if ($bookingsResults = mysqli_query($db, $bookingsSql)) {
    if (mysqli_num_rows($bookingsResults) == 0) { // if there are no bookings we display to the user a message
        echo "<h1 style='text-align:center; color:#201db1 ;'>No bookings found.</h1>";
    } else {
        $bookings = array();
        while ($row = mysqli_fetch_array($bookingsResults)) { // we get all the booking information and assign it to the $bookings array
            $bookings[] = [$row['doctor_id'], $row['booking_date'], $row['booking_time'], $row['booking_reason']];
        }
        $doctors_ids = [];
        foreach ($bookings as $key => $value) {
            $doctors_ids[] = $value[0]; // we assign all doctor ids to this array to be used in query
        }

        $stringified_ids = implode(",", $doctors_ids); // we stringify the doctors ids to be used in query
        $doctor_info_sql = "SELECT users.*, medical_staff.department_id, departments.dept_name 
    FROM users INNER JOIN medical_staff ON users.user_id = medical_staff.staff_id 
    INNER JOIN departments ON medical_staff.department_id = departments.dept_id 
    WHERE users.user_id IN ($stringified_ids)";
        // in the query above we're getting all the doctor info, and departtment name for that booking
        $table = "<table id='bookings-table'><tr><th>Department</th><th>Doctor</th><th>Email</th><th>Date</th><th>Time</th></tr>";
        $doctor_results = mysqli_query($db, $doctor_info_sql);

        while ($row = mysqli_fetch_array($doctor_results)) {
            for ($i = 0; $i < count($doctors_ids); $i++) {
                if ($row['user_id'] == $doctors_ids[$i]) {
                    $table .= "<tr><td>{$row['dept_name']}</td><td>{$row['first_name']} {$row['last_name']}</td><td>{$row['email']}</td><td>{$bookings[$i][1]}</td><td>{$bookings[$i][2]}</td>";
                } // we added all the relevant booking info to the $table variable
            }
        }
        $table .= "</table>";
        $_SESSION['table'] = $table; // we create a session variable to be displayed in either the upcoming or previous page
        // based on which button was pressed we sent the client to the relevant page
        if ($buttonId == "upcoming") {
            header("Location: ../Pages/upcoming_bookings.php");
        } else if ($buttonId == "previous") {
            header("Location: ../Pages/previous_bookings.php");
        }
    }
}
;