<?php

//get the database connection object
require "../../Scripts/db_conn.php";


/*to access the code that access the database, the superglobal variable SERVER 
is used and set to only excute code if the form that is accessing this script 
is doing so by the post requesting method 
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get the user id through POST and assign it the SESSION id as well 
    $user_id = $_POST['staff'];
    $_SESSION['id'] = $user_id;

    //prepare sql statemtn to get a certain user based on their id
    $sql = "SELECT * FROM `users` where user_id = '$user_id'";

    //initalize the form vairable
    $form = '';
    //check if a result is being returened, if yes the if will execute
    if ($result = mysqli_query($db, $sql)) {
        //if the result set is bigger than 0, execute
        if (mysqli_num_rows($result) > 0) {
            //as long as there are records, execute
            while ($row = mysqli_fetch_array($result)) {
                //get the user id
                $id = $row['user_id'];
                //preapre phone number to be displayed in an html form by removing all non digit characters
                $phone_number = preg_replace('/\D/', '', $row['phone_number']);

                //prepare form to display all of the necessary data of the user at the designated html file: ./staff.php
                $form .= '<label for="edit-delete" style="display: inline-block; width: 100px;">Update: </label>
                <input type="radio" name="edit-delete" value="edit" style="display: inline-block; width: auto;" required>
                <label style="display: inline-block; width: 60px;">Edit</label>
                <input type="radio" name="edit-delete" value="delete" style="display: inline-block; width: auto;") required>
                <label style="display: inline-block; width: 60px;">Delete</label>';

                $form .= '<br><br><label for="name">Name</label>
                <input type="text" name="name" id="name" required value=' . $row['first_name'] . '>';

                $form .= '<br><br><label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" required value=' . $row['last_name'] . '>';

                $form .= '<br><br>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required value=' . $row['email'] . '>';

                $form .= '<br><br>
                <label for="phonenumber">Phonenumber</label>
                <input type="tel" name="phonenumber" id="phonenumber" required value=' . $phone_number . '>';

                $form .= '<br><br>
                <label for="date">Date of Birth</label>
                <input type="date" name="date" id="date" required value=' . $row['birth_date'] . '>';

                $form .= '<br><br>
                <label for="gender" style="display: inline-block; width: 100px;">Gender: </label>
                <input type="radio" name="gender" value="male" style="display: inline-block; width: auto;" ' . ($row['gender'] == 'Male' ? 'checked' : '') . '>
                <label style="display: inline-block; width: 60px;">Male</label>
                <input type="radio" name="gender" value="female" style="display: inline-block; width: auto;" ' . ($row['gender'] == 'Female' ? 'checked' : '') . '>
                <label style="display: inline-block; width: 60px;">Female</label>';


                $form .= '<br><br>
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required value="' . htmlspecialchars($row['address']) . '">';

                $form .= '<br><br>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required value=' . $row['username'] . '>';

                $form .= '<br><br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required minlength="6" value=' . $row['password'] . '>';

                $form .= "<br><br><button type='submit'>Submit</button>";

            }


        }
        //database errors for debugging pruposes
        else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }

    //echo the form and close the database connection to release the resources
    echo $form;
    $db->close();

}








?>