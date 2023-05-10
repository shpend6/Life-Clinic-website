<?php
//start a session
session_start();

//require the database conn file and data sanitization and cleaning fundtion
require "db_conn.php";
require "validate_data.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data, put it through the imported validate function
    $name = validate($_POST["name"]);
    $lastname = validate($_POST["lastname"]);
    $email = validate($_POST["email"]);
    $phonenumber = validate($_POST["phonenumber"]);
    $date = validate($_POST['date']);
    $address = validate($_POST['address']);
    $username = validate($_POST["username"]);
    $password = validate($_POST["password"]);
    //Do not need to valiidate gender, since it is a predetermined and controlled input
    $gender = ($_POST["gender"]);


    //query to get the username the user wants to register
    $checkUsername = "select username from users where username = '$username'";
    //this line queries the database using the $checkusername query query
    $result = mysqli_query($db, $checkUsername);
    //if the username exists, display error and redirect them to the registration page
    if (mysqli_num_rows($result)) {
        header("Location: ../Pages/register_page.php?error=Username already exists");
        exit();
    }
    //otherwise, the username does not exits, and the user can be registerd using a prepared query, the mysqli_query function 
    else {
        $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `role_id`, `username`, `address`, `phone_number`, `birth_date`, `gender`) 
            VALUES ('$name', '$lastname','$email','$password',2,'$username','$address','$phonenumber','$date', '$gender')";
        if ($db->query($sql) === TRUE) {
            //query was successul, set the session 'registration_sucessful' variable to true
            $_SESSION['registration_successful'] = true;
            //redirect to login
            header("Location: ../Pages/login.php");

        } //in case of error 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_connect_error();
        }

    }
}
$db->close();
?>