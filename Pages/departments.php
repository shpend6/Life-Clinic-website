<!DOCTYPE html>
<html lang="en">
<!-- This is the webpage that will display the departments of the clinic-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>


    <?php
    //include header to avoid rewriting it
    include "./header.php"
        ?>

    <h4 class="title">Doctors</h4>
    <!-- define the div that will hold all of the cards,
    which represent the name of the departments and the pictures of
    their respective doctors -->

    <?php
    // this is the scrip that will provide the department names from the database, instead of hard coding them
    include "../Scripts/get_dept.php";
    //include footer to avoid rewriting it
    include "./footer.php";
    ?>
</body>

</html>