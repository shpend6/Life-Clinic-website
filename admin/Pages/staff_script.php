<?php
//get the script for the database connection 
require "../../Scripts/db_conn.php";
//preapre sql statment for execution, which will return the user id, user's first name, and user's last name
//the user is part of the staff
$sql = "SELECT `user_id`, `first_name`, `last_name`  FROM `users` where role_id = 0 or role_id = 1 or role_id = 3";

//get all staff from the database and put them inside of dropdown
//and remembe the choice that the user makes, this makes sure that the dropdown does not select the first option but remains at the option that user chose
$staff_table = '';
//If a result set is returned, we enter the if statment
if ($result = mysqli_query($db, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            //as long as there are rows, keep returning them
            //get the user id
            $id = $row['user_id'];
            //remeber selection
            $select = ($_POST['staff'] == $id) ? 'selected' : '';
            //write the html code to display the staff user
            $staff_table .= "<option value='$id' $select>" . $row['first_name'] . " " . $row['last_name'] . "</option>";

        }
    }
    //the errors to help us or the users debug or report a problem
    else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
//the dropdown is echoed, and this is echoed into the html page
echo $staff_table;
?>