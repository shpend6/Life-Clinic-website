<?php
//reuqire the db connection object
require "../../Scripts/db_conn.php";

//prepare the query to get the relevant information for the usuers from the users table in the database
$sql = "SELECT `user_id`, `first_name`, `last_name`, `email`, `password`, `username`, `address`, `phone_number`, `birth_date`, `gender`,  roles.role_name FROM `users` join roles on users.role_id = roles.role_id where users.role_id = 2";

//check if a result set is returned, if yes the if will execute
if ($result = mysqli_query($db, $sql)) {
    //check if the result set is bigger than 0
    if (mysqli_num_rows($result) > 0) {
        // echo a div to store all of the results
        echo "<div>";
        $staff_table = '<br>';
        //while there are records avialable, fetch them an present them in the unordered list structure down below
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['user_id'];
            $staff_table .= "<div id='$id'><form id='form-$id' action='./delete.php' method='POST'>";
            $staff_table .= "<input type='hidden' name='deleteUserId' id='deleteUserId' value='$id'>";
            $staff_table .= "<button type='submit' class='delete'>Delete</button>";
            $staff_table .= "<ul class='custom-list' style=' box-shadow: 0 0 5px rgba(0,0,0,0.1);'>";
            $staff_table .= "<li>" . $row['first_name'] . "</li>";
            $staff_table .= "<li>" . $row['last_name'] . "</li>";
            $staff_table .= "<li>" . $row['username'] . "</li>";
            $staff_table .= "<li>" . $row['gender'] . "</li>";
            $staff_table .= "<li>" . $row['email'] . "</li>";
            $staff_table .= "<li>" . $row['address'] . "</li>";
            $staff_table .= "<li>" . $row['birth_date'] . "</li>";
            $staff_table .= "<li>" . $row['phone_number'] . "</li>";
            $staff_table .= "<li>" . $row['role_name'] . "</li>";
            $staff_table .= "</ul></form></div>";
        }
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
//close database conn to release resrouces
$db->close();
//echo all the final result
echo $staff_table;
//close the opening div
echo "</div>";
?>