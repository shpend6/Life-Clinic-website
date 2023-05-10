<!DOCTYPE html>
<html lang="en">
<!-- this is the register page, the form data wil be send to ../Scripts/register_script.php which will reflect
the register to the database-->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register to Sunflower Wellness Clinic</title>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <h3 id="title-register">Welcome to Vitality Life Clinic</h3>
    <a id="back-home" href="index.php">Back home</a>
  <div class="register-container">
  <form action="../Scripts/register_script.php" method="POST">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required>

    <br><br>
    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname" required>

    <br><br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <br><br>
    <label for="phonenumber">Phone Number</label>
    <input type="tel" name="phonenumber" id="phonenumber" required>

    <br><br>
    <label for="date">Date of Birth</label>
    <input type="date" name="date" id="date" required>

    <br><br>
    <label for="gender">Gender: </label>
    <label>
      <input class="gender-radio" type="radio" name="gender" value="male">
      Male
      <input class="gender-radio" type="radio" name="gender" value="female">
      Female
    </label>

    <br><br>
    <label for="address">Address</label>
    <input type="text" name="address" id="address" required>

    <br><br>
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>

    <br><br>
    <label for="password">Password</label>
    <input type="password" minlength="6" name="password" id="password" required>

    <br><br>
    <input type="submit"></input>
  </form>
  <br><br>

  <?php
  // if there is an error in the registration, such as, same username, let the user know 
  if (isset($_GET['error'])) {
    $errorMessage = $_GET['error'];
    echo "<p style='color: red;'>$errorMessage</p>";
  } ?>
  </div>
</body>

</html>