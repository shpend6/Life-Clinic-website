<?php
//Start session
session_start();

//get the scripts for the database connection and data cleaning
require "db_conn.php";
require "validate_data.php";

/*to access the code that access the database, the superglobal variable SERVER 
is used and set to only excute code if the form that is accessing this script 
is doing so by the post requesting method 
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //get the form data and sanitize and clean data with validate()
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    //prepare query to select the credentials for log in, a username and password
    $sqlUsers = "select * from users where username = '$username' AND password = '$password'";

    //this line queries the database using the $sqlUsuers query
    $resultUsers = mysqli_query($db, $sqlUsers);

    //If a result set from the $resultUsers is returned, we enter the if statment
    if (mysqli_num_rows($resultUsers)) {
        //we get the first row of the result set and store it in $row
        $rowUser = mysqli_fetch_assoc($resultUsers);

        //If the returned username record and password mataches, then the if statemnet will be executed 
        if ($rowUser["username"] === $username and $rowUser['password'] === $password) {
            //get the session username by getting the returned username record and store it in the session variable
            $_SESSION['username'] = $rowUser['username'];
            //we get the session id by getting the user id of the user in the database and store it in the session variable
            $_SESSION['id'] = $rowUser['user_id'];
            //get the sesson name by getting the name of the user that was returned by the query and stored it in the session variable
            $_SESSION['name'] = $rowUser['first_name'];
            //set session['active'] to true since the user is successfully logged in, so that it can be used to determine whether the user is logged accross webpages
            $_SESSION['active'] = true;
            $_SESSION['greet'] = true;
            //get the role id from the query and store in the session variable so that we can determine what webapge to load, the client webpage, or the management webapge
            $_SESSION['role_id'] = $rowUser['role_id'];
            //if the session['role_id'] is set to 0, which is admin, the webpage for admin will be loaded, otherwise the normal webapge will be loaded
            if ($_SESSION['role_id'] == 0) {
                header('Location: ../admin/Pages/admin_home.php');
            } else {
                if (isset($_GET["origin"]) && $_GET['origin']=== "appointments") {
                    header("Location: ../Pages/booking_page.php");
                } else {
                    header("Location: ../Pages/index.php");
                }
                
            }
            //script will stop executing after this point
            exit();
        }
        //if the username or password was incorrect, an error will appear on the index page
        else {
            header("Location: ..\Pages\login.php?error=Incorrect username or password");
            exit();
        }
    } else {
        header("Location: ..\Pages\login.php?error=Incorrect username or password");
        exit();
    }
} //if the username field or the password field is wrong, an error will be displayed
elseif (empty($_POST['username'])) {
    header("Location: ..\Pages\login.php?error=Incorrect username or password");
    exit();
} elseif (empty($_POST['password'])) {
    header("Location: ..\Pages\login.php?error=Incorrect username or password");
    exit();
}
//To release the resources held by the database server and free up system RAM, it's crucial to close the connection. If the script is compromised, it also aids in preventing unwanted access to the database.
$db->close();



?>