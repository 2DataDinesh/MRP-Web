<?php
include "db_config.php";
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];
$query="insert into contact (name,email,phone,message) values ('$name','$email','$phone','$message')";
$result=mysqli_query($con,$query);
if($result){
    echo"<script>window.location.href='../thankyou.php';</script>";
}
else{
    echo"<script>alert(' Contact failed!');window.location.href='../index.php';</script>";
}
?>