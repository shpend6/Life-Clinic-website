<!DOCTYPE html>
<html lang="en">
<!-- this is the log in page for the user where they will give their username and password and it will be send to the
log in script: ..\Scripts\login_script.php  -->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Vitality Life Clinics</title>
</head>

<body>
  <div class="outer-container">
    <div id="login-box">
      <div class="logo-name">
        <img src="css/big-logo.png" id="logo" alt="">
        <p class="clinicName">Vitality Life Clinic</p>
      </div>
      <div id="left-side">
        <form action="..\Scripts\login_script.php<?php echo isset($_GET['origin']) ? "?origin=" . $_GET['origin'] : "" ?>"
          method="POST">
          <label for="username">Username</label>
          <input type="text" id="username" name="username">
          <br><br>
          <label for="password">Password</label>
          <input type="password" id="password" name="password">
          <br><br>
          <input type="submit" value="Log in">
        </form>
        <br><br>
        <a style='font-size: 14px;' href="register_page.php">Not a member yet? Register with us to continue</a>
        <br><br>
        <a style='font-size: 14px;' href="index.php">Continue without logging in</a>
        <?php
        // if there is an incorrect password or username, show this error message
        if (isset($_GET['error'])) {
          $errorMessage = $_GET['error'];
          echo "<p style='color: red;'>$errorMessage</p>";
        } ?>
      </div>
    </div>
  </div>
</body>

</html>