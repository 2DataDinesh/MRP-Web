<?php
include "db_config.php";
$email=$_POST['email'];
$query="insert into newsletter(email) values ('$email')";
$result=mysqli_query($con,$query);
if($result){
    echo"<script>window.location.href='../thankyou.php';</script>";
}
else{
    echo"<script>alert('Try Again, Not Received');window.location.href='../index.php';</script>";
}
?>