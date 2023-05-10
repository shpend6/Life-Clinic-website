<?php
//start session
session_start();
//get database connection obejct
require "../../Scripts/db_conn.php";

//exceute only if request method to this script is post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // take department id from post
    $dept_id = $_POST['dept_id'];
    //delete first the connections to the table, medical_staff, which are referenced by the dept_id
    $sqlChild = "delete from medical_staff where department_id = '$dept_id'";
    //query the db
    $resultChild = mysqli_query($db, $sqlChild);
    //if a result set is returned, execute
    if (mysqli_affected_rows($db) > 0) {
        //the deltion from the original table
        $sql = "delete from departments where dept_id = '$dept_id'";
        //query the database, in this case execute the deletion
        $resultUsers = mysqli_query($db, $sql);
        //check if any affected rows are returned, which means that deletion was successful
        if (mysqli_affected_rows($db) > 0) {
            //set deleted-dept variable to true so that we can use to send a confirmation to the managment user that the deletion was successful
            $_SESSION['deleted-dept'] = true;
            //redirect to the page that they alreaady were
            header("Location: ./dept.php");

        } else {
            echo "ERROR: Could not execute $sql. " . mysqli_error($db);
        }

    }
    //delete only from original table, if there are no connection the department we are deleting 
    elseif (mysqli_affected_rows($db) == 0) {
        $sql = "delete from departments where dept_id = '$dept_id'";
        //query the database, in this case execute the deletion
        $resultUsers = mysqli_query($db, $sql);
        //check if any affected rows are returned, which means that deletion was successful
        if (mysqli_affected_rows($db) > 0) {
            //set deleted-patient variable to true so that we can use to send a confirmation to the managment user that the deletion was successful
            $_SESSION['deleted-dept'] = true;
            //redirect to the page that they alreaady were
            header("Location: ./dept.php");
        } else {
            echo "ERROR: Could not execute" . mysqli_error($db);
        }


    }
}

//clost database connection
mysqli_close($db);


?>