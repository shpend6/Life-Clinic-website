<!DOCTYPE html>
<html lang="en">
<!-- A visual gimmick that will play a filling bar to denote Successful registration -->
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reigstration Successful - Sunflower Wellness Clinic</title>
</head>
<style>
  .progress-bar {
    background-color: #ddd;
    height: 20px;
    width: 100%;
    position: relative;
  }

  .progress-bar-fill {
    background-color: #4CAF50;
    height: 100%;
    transition: width 3.5s;
    width: 0;
    position: absolute;
    top: 0;
    left: 0;
  }
</style>

<script>
  function startProgressBar() {
    var progressBarFill = document.querySelector('.progress-bar-fill');
    progressBarFill.style.width = '100%';
  }

</script>

<body>
  <div class="progress-bar">
    <div class="progress-bar-fill"></div>
  </div>
  <script>
    window.onload = function () {
      startProgressBar();
    };
  </script>
  <h3>Registration Successful</h3>
  <h4>Hold on for a second</h4>

  <?php
  session_start();
  //if registration was successful then unset the session variable and go to the index page
  if (isset($_SESSION['registration_successful']) && $_SESSION['registration_successful']) {
    unset($_SESSION['registration_successful']);
    header('Refresh: 3.5; URL=index.php');
    exit;
  }

  ?>
</body>

</html>