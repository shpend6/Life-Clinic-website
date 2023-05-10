<?php
// Start a session
session_start();

// All session variables will be unset
$_SESSION = array();

// The session will be destoryed
session_destroy();

// User will be redirected to the login page
header("Location: ..\Pages\login.php");

//Current scrip will stop executing
exit();
?>