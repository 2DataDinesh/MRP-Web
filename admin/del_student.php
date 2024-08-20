<?php
include "db_config.php";
$stid = $_GET['stid'];
$query = "DELETE FROM student WHERE stid='$stid'";
$result = mysqli_query($con, $query);
if ($result) {
    echo "<script>alert(' deleted successfully!');window.location.href='view_student.php';</script>";
} else {
    echo "Not deleted";
}
?>
