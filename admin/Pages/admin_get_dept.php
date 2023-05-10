<?php
// Start session

// Get the scripts for the database connection and data cleaning
require "../../Scripts/db_conn.php";

//prepare sql statement to get all departments name
$sql = "SELECT * FROM `departments`;";

//query database
$result = mysqli_query($db, $sql);

//if a result set is returned
if (mysqli_num_rows($result) > 0) {
    // Echo a div to store all of the results
    echo "<div><table><thead><tr><th>Department Name</th></tr></thead><tbody>";
    $dept = '<br>';
    // While there are records available, fetch them and present them in the div and table row structure below
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['dept_id'];
        $dept_name = $row['dept_name'];
        //provide a script for the deletion button to delete the departments if necessary
        $dept .= "<tr><td>" . $row['dept_name'] . "</td><td>
        <form id='delete-form' action='delete_dept.php' method='post'>
            <input type='hidden' name='dept_id' value='$id'>
            <button type='submit' class='delete'>Delete</button>
        </form>";
    }
    $dept .= "</tbody></table></div>";
    echo $dept;
    echo "<h4 style='color:red; text-align: center'>Only delete departments if absolutley neccessary</h4>";
}
// To release the resources held by the database server and free up system RAM, it's crucial to close the connection. If the script is compromised, it also aids in preventing unwanted access to the database.
$db->close();
?>