<?php 
session_start();
error_reporting(0);
require('../db_config.php');
require('../../121245/ajax/reuse.php');
if(isset($_POST['email'])){
    $email = trim($_POST['email']);
    $whereClause = "email='".$email."'";
    $check = AlreadyRegisterCheck('teacher', $whereClause, $con);
    if($check['exists'] == true){
        echo '1';
    }else{
        echo '2';
    }
}

if(isset($_POST['mobile'])){
    $mobile = trim($_POST['mobile']);
    $whereClause = "phone='".$mobile."'";
    $check = AlreadyRegisterCheck('teacher', $whereClause, $con);
    if($check['exists'] == true){
        echo '1';
    }else{
        echo '2';
    }
}
?>