<?php
//start session
session_start();
//the session variable active is set to true when the log in is successful determined from the login_script.php
if (isset($_SESSION['active']) && $_SESSION['active']) {
  if ($_SESSION['role_id'] != 0) {
    header("Location: ../../Pages/login.php");
  }
  //we will greet the user once and unset that session variable so that it does not greet the user multiple times
  if (isset($_SESSION['greet']) && $_SESSION['greet']) {
    echo '<script>alert("Log in successful")</script>';
    unset($_SESSION['greet']);

  }
}
//if the user is logged in, do not give them access to this webpage, send them to log in 
else {
  header('Location: ../../Pages/login.php');
  exit();
}

//if they are registering for the first time, greet them with an alert to confirm registration, as determined by the registration script
if (isset($_SESSION['registration_successful']) && $_SESSION['registration_successful']) {
  echo '<script>alert("registration successful")</script>';
  unset($_SESSION['registration_successful']);
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patients</title>
  <link rel="stylesheet" href="admin.css">

</head>
<!-- Write the header of the website here and include in the other webpages, so that it does not need to be rewritten
  everytiem -->
<div class="clinicNameLogo">
  <div>
    <p class="clinicName">Vitality Life Clinic</p>
    <img src="../../Pages/css/logo.png" alt="" width="20px" height="20px">
  </div>
  <div class='top-right'>

    <a href="./admin_home.php" style='padding-right:15px'><img src="../../Pages/css/home.png" alt="" width="20px"
        height="20px"></a>

    <a href="../../Scripts/logout_script.php">

      Log out
    </a>
  </div>
</div>

<header>
  <nav>
    <div class="container">
      <div class="welcome-text">
        <?php
        //greet the user at the left part of the screen with their name
        if (isset($_SESSION['active']) && $_SESSION['active']) {
          echo "<h4>Welcome " . $_SESSION['name'] . "</h4>";
        }
        ?>
      </div>
      <ul class="menu">
        <li><a href="admin_home.php">Home</a></li>
        <li><a href="patients_page.php">Patients</a></li>
        <li><a href="dept.php">Departments</a></li>
        <li><a href="admin_bookings.php">Appointments</a></li>
        <li><a href="staff.php">Staff</a></li>
      </ul>
    </div>
</header>