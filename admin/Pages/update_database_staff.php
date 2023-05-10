<?php
//Start session
session_start();
//get the script for the database connection 
require "../../Scripts/db_conn.php";
//to access the code that access the database, the superglobal variable SERVER is used and set to only excute code if the form that is accessing this script is doing so by the post requesting method 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $user_id = $_SESSION['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phonenumber'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $username = $_POST['username'];

    // if the managemnet staff selects the edit radio buttion, this is the code that will execute
    if ($_POST['edit-delete'] == 'edit') {


        // Update the user's information in the database using the variables that hold the information from the form
        $sql = "UPDATE `users` SET 
                `first_name`='$name', 
                `last_name`='$lastname', 
                `email`='$email', 
                `phone_number`='$phone_number', 
                `birth_date`='$date', 
                `gender`='$gender', 
                `address`='$address', 
                `username`='$username' WHERE `user_id`='$user_id'";

        //If a result set is returned, we enter the if statment
        if (mysqli_query($db, $sql)) {
            //set the session['edit'] to true since the managment is editing
            $_SESSION['edit'] = true;
            //redirect to staff page after successful editing of a user
            header("Location: ./staff.php");
            exit();

        }
        //script will stop executing after this point 
        else {
            echo "Error updating user information: " . mysqli_error($db);
        }
    }
    //if the radio button to delete a user is selected instead, this is what will be executed
    //we check if the variable edit-delete is set and is set to 'delete'
    //if yes, the code below will execute
    elseif (isset($_POST['edit-delete']) && $_POST['edit-delete'] = 'delete') {
        //we first need to delete the record from medical_staff, since the tables medical_staff and users are connected via the user_id
        $deleteChild = "delete from medical_staff where staff_id = $user_id";
        if (mysqli_query($db, $deleteChild)) {
            //after returning the results set, we need to delete it from the user's table
            //we use the delete sql statment to do so
            $sql = "delete from users WHERE `user_id`='$user_id'";
            if (mysqli_query($db, $sql)) {
                //after we are returned a result set, we can confirm deletion
                //hence, we set the session super global variable to true and redirect the user back to the staff page
                $_SESSION['deletion'] = true;
                header("Location: ./staff.php");
                exit();
            } //the errors to help the user or developer to debug any issues that may arise 
            else {
                echo "Error updating user information: " . mysqli_error($db);
            }

        } else {
            echo "Error updating user information: " . mysqli_error($db);
        }



    }
}

$db->close();



?>