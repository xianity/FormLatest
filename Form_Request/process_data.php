<?php
// Retrieve the subject, grade, and unit arrays from the POST data
$subjects = $_POST['subjects']??'';
$grades = $_POST['grades']??'';
$units = $_POST['units']??'';

// Iterate over the arrays and access the corresponding values
for ($i = 0; $i < count($subjects); $i++) {
    echo $subject = $subjects[$i];
    echo $grade = $grades[$i];
    echo $unit = $units[$i];

    // Process the values as needed
    // ...
}
?>
