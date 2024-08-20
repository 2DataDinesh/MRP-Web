<?php
include "db_config.php";
$id = $_GET['id'];
$query = "DELETE FROM admin_details WHERE id='$id'";
$result = mysqli_query($con, $query);
if ($result) {
    echo "<script>alert(' deleted successfully!');window.location.href='view_admin_details.php';</script>";
} else {
    echo "Not deleted";
}
?>
