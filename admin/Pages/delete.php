<?php
//Start session
session_start();

//require the database connection object
require "../../Scripts/db_conn.php";
/*to access the code that access the database, the superglobal variable SERVER 
is used and set to only excute code if the form that is accessing this script 
is doing so by the post requesting method 
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get the user id form POST so that the intended user can be delted from the database
    $user_id = $_POST['deleteUserId'];
    //prepare the sql statment to delete only the intended user
    $sql = "delete from users where user_id = '$user_id'";
    //query the database, in this case execute the deletion
    $resultUsers = mysqli_query($db, $sql);
    //check if any affected rows are returned, which means that deletion was successful
    if (mysqli_affected_rows($db) > 0) {
        //set deleted-patient variable to true so that we can use to send a confirmation to the managment user that the deletion was successful
        $_SESSION['deleted-patient'] = true;
        //redirect to the page that they alreaady were
        header("Location: ./patients_page.php");

    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
}

//clost database connection
mysqli_close($db);

?>