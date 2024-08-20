<?php
include "db_config.php"; // Include your database connection file

// Ensure that form data is properly received and sanitize inputs
if(isset($_POST['id']) && isset($_POST['class']) && isset($_POST['section']) && isset($_POST['subject'])) {
    // Sanitize inputs to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $section = mysqli_real_escape_string($con, $_POST['section']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);

    // Check if the combination already exists for other records (excluding the current one)
    $query_check = "SELECT * FROM admin_details WHERE class='$class' AND section='$section' AND subject='$subject' AND id != '$id'";
    $result_check = mysqli_query($con, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Combination already exists for another record
        echo "<script>alert('Entry already exists for the given Class, Section, and Subject.'); window.location.href='admin_form.php';</script>";
    } else {
        // Update the existing entry
        $query_update = "UPDATE admin_details SET class='$class', section='$section', subject='$subject' WHERE id='$id'";
        $result_update = mysqli_query($con, $query_update);

        if ($result_update) {
            echo "<script>alert('Updated successfully.'); window.location.href='view_admin_details.php';</script>";
        } else {
            echo "<script>alert('Update failed.'); window.location.href='view_admin_details.php';</script>";
        }
    }
} else {
    // Handle the case where not all required POST parameters are provided
    echo "<script>alert('Incomplete data received.'); window.location.href='view_admin_details.php';</script>";
}

// Close database connection
mysqli_close($con);
?>
