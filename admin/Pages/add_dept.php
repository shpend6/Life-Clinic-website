<?php
//Sesssion start
session_start();
//require the database object
require "../../Scripts/db_conn.php";
//if the request method is post from the form then exute
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //continute exectuing only if the 'dept_name' variable is set
    if (isset($_POST['dept_name'])) {
        //get the department name from the form
        $dept_name = $_POST['dept_name'];
        //create a sql statement to create a new department name
        $sql = "INSERT INTO `departments`(`dept_name`) VALUES ('$dept_name')";
        //if the query is successful
        if ($db->query($sql) === TRUE) {
            //redirect to login
            header("Location: ./dept.php");

        } //in case of error, and for debugging purposes
        else {
            echo "Error: " . $sql . "<br>" . mysqli_connect_error();
        }
    }
}

//close database connection
mysqli_close($db);


?>