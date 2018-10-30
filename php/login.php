<?php

require "init.php";

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
$username = test_input($_POST['email']);
$password = test_input($_POST['password']);

$sql = "select * from userProfile where email='$username' and password='$password'";
 
$res = mysqli_query($con,$sql);

$check = mysqli_fetch_array($res);

if($check['password'] == $password){

//header("location: ../index.php"); 
echo "<script>top.window.location = '../index.php'</script>";

echo "<br><h3> login success </h3>";

// Store Session Data
$_SESSION['SIemail']= $username;              // Initializing Session with value of PHP Variable
$_SESSION['SIfname']= $check['firstName'];
$_SESSION['SIlname']= $check['lastName'];

echo "<br>Welcome ". $_SESSION['SIemail'] ;

}else
    echo "<br><h3> login failure </h3>";

}
  mysqli_close($con);

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


?>