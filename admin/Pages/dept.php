<!DOCTYPE html>
<html lang="en">
<!-- This is the department webapge that is used to
edit the departments !-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <?php
    include './admin_header.php';
    include './admin_get_dept.php';
    ?>

    <br>
    <div id="dept-form">
        <!-- //send form to add_dept.php to add a new department -->
        <form action="./add_dept.php" method='POST'>
            <div><label for='dept_name'>Add Department</label></div>
            <input type="text" name="dept_name" id="dept_name">
            <br><br>
            <div><button type="submit">Add</button></div>
        </form>
    </div>


    <?php include 'footer.php'; ?>
</body>

</html>