
<?php
require "init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input( $_POST["organizationName"]);
    $logo = test_input($_POST["organizationLogo"]);
    $webSite = test_input($_POST["organizationWebSite"]);
    $rsName = test_input($_POST["recruiterName"]);
    $mail = test_input($_POST["contactMail"]);
    $mob = test_input( $_POST["contactMobile"]);
    $stream = test_input($_POST["chooseStream"]);
    $lang = test_input($_POST["languagesNeed"]);
    $numReq = test_input($_POST["noRequired"]);
    $passout = test_input($_POST["passedOut"]);

    $degree = test_input( $_POST["degree"]);
    $yoc = test_input($_POST["yearsOfExperience"]);
    $agg = test_input($_POST["aggregate"]);
    $loc = test_input($_POST["jobLocation"]);
    $ageLimit = test_input($_POST["ageLimit"]);
    $description = test_input($_POST["description"]);
    
    $sql = "insert into Jobs 
            values('$name','$logo','$webSite','$rsName','$mail','$mob','$stream','$lang',
                        '$numReq','$passout','$degree','$yoc','$agg','$loc','$ageLimit','$description');";

    if(mysqli_query($con,$sql)) echo 'successfully registered';

    else echo "Error in insertion..." .mysqli_error($con);

    mysqli_close($con);

  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>