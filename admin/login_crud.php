<?php 
session_start();
error_reporting(0);
include('db_config.php');

$username=$_POST['username'];
$password=$_POST['password'];
$query="select * from admin where username ='$username'";
$res=mysqli_query($con,$query);
if($row=mysqli_fetch_array($res)){
    if($row['password']==$password){
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['isAdminLogin'] = true;
      
        echo"<script>alert('login successfully');window.location.href='dashboard.php';</script>";
    }
    else{
        echo"<script>alert('Invalid password');window.location.href='./index.php';</script>";
    }
}
else{
    echo"<script>alert('Invalid Username');window.location.href='./index.php';</script>";
}
?>