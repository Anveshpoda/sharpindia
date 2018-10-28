
<?php
require "init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $f_name = test_input( $_POST["firstName"]);
    $l_name = test_input($_POST["lastName"]);
    $cnt_no = test_input($_POST["mobile"]);
    $type = test_input($_POST["type"]);
    $passwrd = test_input($_POST["password"]);
    $mail = test_input($_POST["email"]);

    
    $sql = "insert into userProfile values('$f_name','$l_name','$mail','$cnt_no','$type','$passwrd');";

    if(mysqli_query($con,$sql)) echo 'successfully registered';

    else echo "Error in insertion..." .mysqli_error($con);

   
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
   mysqli_close($con);

?>