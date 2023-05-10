<?php

//create function validate that takes in the argument $data. This is ued to clean and sanitize data
function validate($data)
{
    //remove white space from both ends of the string
    $data = trim($data);
    //remove backslash
    $data = stripslashes($data);
    //convert special characaters to their respective html entities so that cross site attacks are not possible
    $data = htmlspecialchars($data);
    //return the string
    return $data;
}


?>