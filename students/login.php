<?php
session_start();
include ('../db_config.php');
$name = $_POST['name'];
$pw = $_POST['pwd'];

// Check if the password is exactly 8 digits
if (preg_match('/^\d{8}$/', $pw)) {
  // Split the password into day, month, year
  $day = substr($pw, 0, 2);
  $month = substr($pw, 2, 2);
  $year = substr($pw, 4, 4);

  // Format the date as YYYY-MM-DD
  $dob = "$day-$month-$year";

  // Select the user from the database using the formatted date
  $select = mysqli_query($con, "SELECT * FROM student WHERE email='$name' AND dob='$dob'");


    if($row = mysqli_fetch_array($select)){
    $_SESSION['name'] = $row['name'];
    $_SESSION['id'] = $row['stid'];
    $_SESSION['login'] = true;

    echo "<script>alert('Login success');window.location.href='dashboard.php';</script>";
  } else {
    echo "<script>alert('Login Failed');window.location.href='index.php';</script>";
  }
} else {
  echo "<script>alert('Password Mismatched');window.location.href='dashboard.php';</script>";
}

?>