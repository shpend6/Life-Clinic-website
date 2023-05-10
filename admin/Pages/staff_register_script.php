<?php
//Start session
session_start();



//get the scripts for the database connection and data cleaning
require "../../Scripts/db_conn.php";
require "../../Scripts/validate_data.php";

/*to access the code that access the database, the superglobal 
variable SERVER is used and set to only excute code if the form 
that is accessing this script is doing so by the post requesting method
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from html form
    $name = validate($_POST["name"]);
    $lastname = validate($_POST["lastname"]);
    $email = validate($_POST["email"]);
    $phonenumber = validate($_POST["phonenumber"]);
    $date = validate($_POST['birth_date']);
    $address = validate($_POST['address']);
    $username = validate($_POST["username"]);
    $password = validate($_POST["password"]);
    $gender = ($_POST["gender"]);
    $role_id = $_POST['role'];

    //prepare query to check if the chosen username exitst, if yes, it will redirect you to the staff apge
    $checkUsername = "select username from users where username = '$username'";
    $result = mysqli_query($db, $checkUsername);
    if (mysqli_num_rows($result)) {
        //if the username exists, redirect to the staff page and an error will be displayed in the search bar
        header("Location: ./staff_register.php");
        $_SESSION['user-exist'] = true;
        exit();
    }
    //if the username is not taken, insert the record into the database 
    else {
        $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `role_id`, `username`, `address`, `phone_number`, `birth_date`, `gender`) 
            VALUES ('$name', '$lastname','$email','$password', '$role_id','$username','$address','$phonenumber','$date', '$gender')";
        if ($db->query($sql) === true) {
            //set the session 'registration_successful' to true so that we know if the registration was successful for other webapages
            $_SESSION['registration_successful'] = true;
            //redirct to staff page
            header("Location: ./staff.php");
            exit();

        }
        //errors for debugging
        else {
            echo "Error: " . $sql . "<br>" . $db->error();
        }

    }
}

$db->close();
?>