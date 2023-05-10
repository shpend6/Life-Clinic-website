<?php
require 'db_conn.php'; /* including the database connection file*/
// this file will be included in the create_bookings.php page where the user can create an appointment based on the
// departments found
// Query the database to retrieve the list of Departments
$sql = "SELECT * FROM departments";
$result = mysqli_query($db, $sql);
// creating an array to store the departments queried from the database
$departments = array();
$options = ""; // this variable will be displayed in the departments dropdown menu in the create booking


while ($row = mysqli_fetch_array($result)) { // assigning the database query result set to the $row variable
  $departments[$row['dept_id']] = $row['dept_name']; //creating a keyto value relationship between the dept id and the dept name
  $options .= "<option value='{$departments[$row['dept_id']]}'>{$departments[$row['dept_id']]}</option>"; // adding the department name to the options variable
}
// Closing the database connection
mysqli_close($db);
?>