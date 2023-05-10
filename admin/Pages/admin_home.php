<?php
//require header to not write the header over and over
require "admin_header.php"
    ?>
<!DOCTYPE html>
<html lang="en">
<!-- This is the home page of the management staff  it includes
four images in a 2 x 2 grid that have below them a description text and button
to let the managemnt staff know what
-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Page</title>
    <link rel="stylesheet" href="./admin.css">
</head>

<body>
    <h1 class="headerText"> VLC Management Page</h1>
    <br><br>
    <div class="main">
        <div class='column-main'>
            <img src="../../Pages/css/patients.jpg" alt="" width="560px" height="320px">
            <div class='main-item'>
                <h3>You can delete patients here: </h3>
                <a href="./patients_page.php"><button>Patients</button></a>
            </div>
        </div>

        <div class='column-main'>
            <img src="../../Pages/css/doctors.jpg" alt="" width="560px" height="320px">
            <div class='main-item'>
                <h3>You can edit, delete staff records here: </h3>
                <a href="./staff.php"><button>Staff</button></a>
            </div>

        </div>
        <div class='column-main' style="margin-top: 4em">
            <img src="../../Pages/css/appointment.jpg" alt="" width="500px" height="320px">
            <div class='main-item'>
                <h3>See appoitnments here: </h3>
                <!-- put the link to the appointment page here -->
                <a href="admin_bookings.php"><button>Appointments</button></a>
            </div>
        </div>
        <div class='column-main' style="margin-top: 4em">
            <img src="../../Pages/css/departments.jpg" alt="" width="560px" height="320px">
            <div class='main-item'>
                <h3>You can manage departments here: </h3>
                <a href="./dept.php"><button>Departments</button></a>
            </div>
        </div>
    </div>

    <?php
    //require footer to not write the header over and over
    require "footer.php"
        ?>

</body>

</html>