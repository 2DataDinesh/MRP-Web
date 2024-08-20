<?php
// get_sections.php

if (isset($_POST['class'])) {
    include "db_config.php";

    $class = mysqli_real_escape_string($con, $_POST['class']);

    $query = "SELECT DISTINCT section FROM admin_details WHERE class = '$class'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<option value="">Select Section</option>'; // Initial option
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['section'] . '">' . $row['section'] . '</option>';
        }
    } else {
        echo '<option value="">No Sections Found</option>';
    }

    mysqli_close($con);
} else {
    echo '<option value="">Select Class First</option>';
}
?>
