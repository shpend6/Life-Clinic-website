<!DOCTYPE html>
<html lang="en">
<!-- This is a page that takes the patients from the database and displays them in a nice way -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <link rel="stylesheet" href="admin.css">

</head>

<body>
    <?php include "admin_header.php";
    //if a patient is deleted, let the user know with a js alert
    if (isset($_SESSION['deleted-patient']) && $_SESSION['deleted-patient']) {
        echo '<script>
        alert("Patient deletion was successful")
    </script>';
        //unset so that the alert does not activate when it does not have to
        unset($_SESSION['deleted-patient']);
    }
    ?>

    <h3 class="headerText">Patients</h3>
    <ul class="custom-list" style="background-color: #201DB1; color: white">
        <li>First Name</li>
        <li>Last Name</li>
        <li>Username</li>
        <li>Gender</li>
        <li>Email</li>
        <li>Role</li>
        <li>Date of Birth</li>
        <li>Address</li>
        <li>Phone Number</li>

    </ul>
    <!-- patients.php is a sript that return all patients in a list -->
    <?php
    require "patients.php";
    require "footer.php"
        ?>

</body>

</html>