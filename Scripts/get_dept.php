<?php
//Start session


//get the scripts for the database connection and data cleaning
require "db_conn.php";
$images = array(
    '.././Pages/css/rect-1.png',
    '.././Pages/css/rect-2.png',
    '.././Pages/css/rect-3.png',
    '.././Pages/css/rect-4.png',
    '.././Pages/css/rect-5.png',
    '.././Pages/css/rect-6.png',
    '.././Pages/css/rect-7.png',
    '.././Pages/css/rect-8.png',
    '.././Pages/css/rect-9.png',
    '.././Pages/css/rect-10.png',
    '.././Pages/css/rect-11.png',
    '.././Pages/css/rect-12.png',
    '.././Pages/css/rect-13.png',
    '.././Pages/css/rect-14.png',
    '.././Pages/css/rect-15.png',
    '.././Pages/css/rect-16.png',
    '.././Pages/css/rect-17.jpeg',
    '.././Pages/css/rect-18.jpeg',
    '.././Pages/css/rect-19.jpg',
    '.././Pages/css/rect-20.jpg',
    '.././Pages/css/rect-21.jpg',
    '.././Pages/css/rect-22.jpg',
    '.././Pages/css/rect-23.jpg',
    '.././Pages/css/rect-24.jpg',
    '.././Pages/css/rect-25.jpg',

);

$sql = "SELECT * FROM `departments`;";

$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // echo a div to store all of the results
    echo "<div class='card'>";
    $dept = '';
    //while there are records avialable, fetch them an present them in the unordered list structure down below
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['dept_id'];
        $dept .= "<div class='box' id='$id'>";
        $dept .= "<h2 class='title'>" . $row['dept_name'] . "</h2>";
        $dept .= "<div class='grid'>";
        for ($i = 0; $i < 4; $i++) {
            $dept .= "<img src='$images[$count]' . >";
            $count++;
        }
        $dept .= "</div></div>";
    }
}
//To release the resources held by the database server and free up system RAM, it's crucial to close the connection. If the script is compromised, it also aids in preventing unwanted access to the database.
$db->close();
echo $dept;
exit();



?>