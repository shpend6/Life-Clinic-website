<?php

//we are using mysqli which is a built-in class that provides an interface to work with mysql
//localhost is the hostname
//root is the same as saying super admin user
//password, but in this case it is an empty string because we don't have a password for the database
//"life_clinic" is the name of our database

//we can now use the $db variable that holds the object everywhere in our codefiles

$db = new mysqli("localhost", "root", "", "life_clinic");

?>