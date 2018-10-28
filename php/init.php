<?php
$host = "localhost";
$user = "id7453719_sharpindia";
$password = "sharpindia";
$db = "id7453719_sharpindia";


$con = mysqli_connect($host,$user,$password,$db);
if(!$con){
	die("Error in connection " . mysqli_connect_error());
}
//else echo"<br><h3>Connection Success...</h3>";
?>
