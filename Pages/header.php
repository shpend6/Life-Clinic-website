<?php
// Start the session if it hasn't been started already
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!--  -->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
</head>
<html>
<div class="clinicNameLogo">
  <div class="nameLogo">
    <p class="clinicName">Vitality Life Clinic</p>
    <img src="css/logo.png" id="logo" alt="">
  </div>
  <div class="logButtons">
    <a href="index.php"><img src="css/home.png" alt=""></a>
    <?php
    if (isset($_SESSION['active']) && $_SESSION['active']) {
      echo "<form action='..\Scripts\logout_script.php' method='post'><a href='../Scripts/logout_script.php'>Log out</a>
          </form>";
    } else {
      echo "<a href='.\login.php' style='margin-bottom: 8px';>Log In</a>";
    }
    ?>

  </div>
</div>
<nav>
  <div class="container">
    <?php
    if (isset($_SESSION['active']) && $_SESSION['active']) {
      echo "<h4 class='welcomeMessage'>Welcome " . $_SESSION['name'] . "</h4>";
    }
    ?>
    <ul class="menu">
      <li><a href="index.php">Home</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="departments.php">Departments</a></li>
      <li><a
          href="<?php echo isset($_SESSION["id"]) ? "booking_page.php" : "login.php?origin=appointments"; ?>">Appointments</a>
      </li>
    </ul>

  </div>
</nav>

</html>