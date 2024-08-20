<?php
session_start();
include "db_config.php";

// Retrieve POST data
$tid = $_POST['tid'];
$name = $_POST['name'];
$dateOfBirth = $_POST['dob'];
$phone = $_POST['phone'];
$tclass = $_POST['tclass'];
$tsection = $_POST['tsection'];
$email = isset($_POST['email']) ? strtolower($_POST['email']) : ''; // Convert email to lowercase

// Validate email format
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid Email Address'); window.location.href='view_teacher.php';</script>";
    exit;
}

// Check if email already exists for another teacher
$checkQuery = "SELECT * FROM teacher WHERE email = '$email' AND tid != '$tid'";
$checkResult = mysqli_query($con, $checkQuery);
if (mysqli_num_rows($checkResult) > 0) {
    echo "<script>alert('The email address or phone number you have entered is already in use.'); window.location.href='view_teacher.php';</script>";
    exit();
}

// Format date of birth to match database expectation
$dateOfBirth = date("d-m-y", strtotime($dateOfBirth));
$dateOfBirth = $con->real_escape_string($dateOfBirth);

// Update teacher information with lowercase email
$sql = "UPDATE teacher SET name='$name', dob='$dateOfBirth', phone='$phone', email='$email', tclass='$tclass', tsection='$tsection' WHERE tid='$tid'";

if ($con->query($sql) === true) {
    echo "<script>alert('Updated successfully!'); window.location.href='view_teacher.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

// Close database connection
$con->close();
?>
