<!DOCTYPE html>
<html lang="en">
<!-- this is the webapge for managing staff -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Managment</title>
    <link rel="stylesheet" href="./admin.css">
</head>

<body>
    <!-- include header to avoid rewriting html -->
    <?php
    include "./admin_header.php";
    // determine what session variable is set, deletion or edit, and then display a confirmation alert with javascript
    if (isset($_SESSION['deletion']) && $_SESSION['deletion']) {
        echo '<script>alert("Deletion was successful")</script>';
        unset($_SESSION['deletion']);

    } elseif (isset($_SESSION['edit']) && $_SESSION['edit']) {
        echo '<script>alert("Edit was successful")</script>';
        unset($_SESSION['edit']);

    } ?>
    <h4 class="headerText">Staff Edit and Deletion</h4>
    <br>
    <div style="text-align: center;">
        <label for="staff" style="color:blue;">Choose a staff member:</label>
        <form action="" method="POST">
            <select name="staff" id="staff">
                <!-- generate dynamically the staff from the database to dropdown menu
                this is inside of a form because we want to know what user did the management chose -->
                <?php
                require "./staff_script.php";
                ?>
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>
        <br><br>
        <!-- Anchor tag that takes you to the page to register users -->
        <a href="./staff_register.php" style="margin-right: 10px;"><button>Register Staff</button></a>
    </div>



    <div class="konti-njer">
        <!-- This is the form to update the database based on user selection -->
        <form action="./update_database_staff.php" method="POST">
            <?php require "./edit_staff_script.php" ?>
        </form>
    </div>

    <br>
    <!-- include footer to avoid rewriting html code -->
    <?php include "./footer.php" ?>
</body>

</html>