<?php
$server="localhost"; 
$username="root";   
$password=""; 
$dbname="allphdin_mrp";  

$con=mysqli_connect($server,$username,$password,$dbname);

if (mysqli_connect_errno()) {
	die('Database Connection Error'.mysqli_connect_error());
}

?>