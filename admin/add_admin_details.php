<?php
include "db_config.php";

// Get input values from POST
$class = mysqli_real_escape_string($con, $_POST['class']);
$section = mysqli_real_escape_string($con, $_POST['section']);
$subject = mysqli_real_escape_string($con, $_POST['subject']);

// Check if the combination already exists
$query_check = "SELECT * FROM admin_details WHERE class='$class' AND section='$section' AND subject='$subject'";
$result_check = mysqli_query($con, $query_check);

if (mysqli_num_rows($result_check) > 0) {
    // Combination already exists
    echo "<script>alert('Entry already exists for the given Class, Section, and Subject.'); window.location.href='admin_form.php';</script>";
} else {
    // Insert the new entry
    $query_insert = "INSERT INTO admin_details (class, section, subject) VALUES ('$class', '$section', '$subject')";
    $result_insert = mysqli_query($con, $query_insert);

    if ($result_insert) {
        echo "<script>alert('Inserted successfully.'); window.location.href='admin_form.php';</script>";
    } else {
        echo "<script>alert('Insertion failed.'); window.location.href='admin_form.php';</script>";
    }
}

// Close database connection
mysqli_close($con);
?>
