<?php
/* checking if the session has been already started, in other files we have included this script \
so it doesn't throw an error:IGNORING SESSION START*/
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include 'generate_departments.php';
require 'db_conn.php';

$department = $_POST['department'];
if ($department == "") {
  die();
}

// we include the generate department file so that we dont query the database twice
$included_files = get_included_files();
if (in_array('generate_departments.php', $included_files)) {
  echo 'myfile.php was included';
  foreach ($departments as $key => $value) {
    if ($value == $department) { // we find the key  (id) whose value matches our department name sent by the request
      $department_id = $key; // and we assign it to the department name
    }
  }
} else {
  // in case file wasn't included we query the database
  $sql = "SELECT dept_id FROM departments WHERE dept_name = '$department'";
  $result = mysqli_query($db, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $department_id = $row['dept_id'];
  }
}

// we query the database to get all doctor information 
// first we get the staff ids whose dept_id in the medical staff matches our dept_id
//  then we query the users table if the user_id is in the staff_ids
// and their role_id is 1 which means they 
$sqlDoctors = 'SELECT u.*
FROM users u
INNER JOIN medical_staff s ON u.user_id = s.staff_id
WHERE s.department_id = ' . $department_id . ' AND u.role_id=1;
';

$doctor_name_ids = [];
$result = mysqli_query($db, $sqlDoctors);
$_SESSION['sql_doctor_results'] = $result;
print_r($result);
$doctors = "<option value=''>Select Doctors</option>";
while ($row = mysqli_fetch_array($result)) { // we assign all the doctor info to the $doctors variable which we eco at the end
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $doctor_id = $row['user_id'];
  $doctors .= "<option value='$first_name $last_name'>$first_name $last_name</option>";
  $name = $row['first_name'] . " " . $row['last_name'];
  $doctor_name_ids[$row['user_id']] = $name;
}
$_SESSION['doctor_list'] = $doctor_name_ids;
// Step 5: Close the database connection and return the options for the Doctors dropdown input box
mysqli_close($db);
echo $doctors;

?>