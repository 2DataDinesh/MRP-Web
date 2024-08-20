<?php
include "db_config.php";
$tid = $_GET['tid'];
$query = "DELETE FROM teacher WHERE tid='$tid'";
$result = mysqli_query($con, $query);
if ($result) {
    echo "<script>alert(' deleted successfully!');window.location.href='view_teacher.php';</script>";
} else {
    echo "Not deleted";
}
?>
