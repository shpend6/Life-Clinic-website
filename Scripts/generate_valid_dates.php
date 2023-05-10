<?php
// Generate the minimum date string for the datetime picker
$min_date = date('Y-m-d', strtotime('+1 day'));
$min_time = '08:00'; // Set the minimum time to 8:00 AM
$min_datetime = $min_date . 'T' . $min_time;

// Generate the maximum date string for the datetime picker
$max_date = date('Y-m-d', strtotime('+1 year'));
$max_time = '17:00'; // Set the maximum time to 5:00 PM
$max_datetime = $max_date . 'T17:00';


?>