<!DOCTYPE html>
<html lang="en">
<!-- A number of input areas on the form, including the new employee's name, last name, email address, phone number, date of birth, gender, address, role, username, and password, are used to collect information about them. The <label> element is used to label the input fields, and CSS is used to style them.

When a user clicks the "Submit" button, the form is sent via the POST method to the staff_register_script.php script. -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New Staff</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <?php
    session_start();
    // let the user know if the user exits when the register staff
    if (isset($_SESSION['user-exist']) && $_SESSION['user-exist']) {
        echo "
    <script>alert('Username exists')</script>";
    // unset after alerting the user
        unset($_SESSION['user-exist']);
    }
    ?>
    <h4 class="headerText">Register New Staff</h4>
    <a href="./staff.php">Back to Staff</a>
    <!-- style the form -->
    <div class="konti-njer">
        <form action="./staff_register_script.php" method="POST">
            <label for=" name">Name</label>
            <input type="text" name="name" id="name" required>

            <br><br>
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" required>

            <br><br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <br><br>
            <label for="phonenumber">Phonenumber</label>
            <input type="tel" name="phonenumber" id="phonenumber" required>

            <br><br>
            <label for="date">Date of Birth</label>
            <input type="date" name="date" id="date" required>

            <br><br>

            <label for="gender" style="display: inline-block; width: 100px;">Gender: </label>
            <label>
                <input type="radio" name="gender" value="Male"
                    style="display: inline-block; width: auto; margin-top: 20px;">Male
                <input type="radio" name="gender" value="Female" style="display: inline-block; width: auto;">Female
            </label>

            <br><br>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" required>

            <br><br>
            <label for="role" style="display: inline-block; width: 100px;">Role: </label>
            <label>
                <input type="radio" name="role" value="1" style="display: inline-block; width: auto; margin-top: 20px;">
                Doctor
                <input type="radio" name="role" value="3" style="display: inline-block; width: auto;">
                Nurse
            </label>

            <br><br>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>

            <br><br>
            <label for="password">Password</label>
            <input type="password" minlength="6" name="password" id="password" required>

            <br><br>
            <button type="submit">Submit</button>

        </form>
    </div>

    <?php
    include "footer.php";
    ?>
</body>

</html>