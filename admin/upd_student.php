<?php
session_start();
include "db_config.php";

// Retrieve POST data
$stid = $_POST['id'];
$name = $_POST['name'];
$dateOfBirth = $_POST['dob'];
$phone = $_POST['phone'];
$class = $_POST['class'];
$section = $_POST['section'];
$house = $_POST['house'];
$email = isset($_POST['email']) ? strtolower($_POST['email']) : ''; // Convert email to lowercase

// Validate email format
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid Email Address'); window.location.href='view_student.php';</script>";
    exit;
}

// Check if email already exists for another student
$checkQuery = "SELECT * FROM Student WHERE email = '$email' AND stid != '$stid'";
$checkResult = mysqli_query($con, $checkQuery);
if (mysqli_num_rows($checkResult) > 0) {
    echo "<script>alert('The email address or phone number you have entered is already in use.'); window.location.href='view_student.php';</script>";
    exit();
}

// Format date of birth to match database expectation
$dateOfBirth = date("d-m-Y", strtotime($dateOfBirth));
$dateOfBirth = $con->real_escape_string($dateOfBirth);

// Update student information with lowercase email
$sql = "UPDATE student SET name='$name', dob='$dateOfBirth', phone='$phone', email='$email', class='$class', section='$section', house='$house' WHERE stid='$stid'";

if ($con->query($sql) === true) {
    echo "<script>alert('Updated successfully!'); window.location.href='view_student.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

// Close database connection
$con->close();
?>
