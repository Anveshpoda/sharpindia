
<?php
require "init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input( $_POST["name"]);
    $cnt_no = test_input($_POST["mobile"]);
    $degree = test_input($_POST["degree"]);
    $aggregate = test_input($_POST["aggregate"]);
    $mail = test_input($_POST["email"]);
    $passOutYr = test_input( $_POST["passedOutYear"]);
    $loc = test_input($_POST["preferredLocation"]);
    $yrsOfExp = test_input($_POST["yearsOfExperience"]);
    $streams = test_input($_POST["preferredStreams"]);
    $langs = test_input($_POST["languagesKnown"]);

    $resume = $_POST['resume'];

  


    // $sql ="SELECT Id FROM submitResume ORDER BY Id ASC";
		
		// $res = mysqli_query($con,$sql);
		
		// $id = 0;
		
		// while($row = mysqli_fetch_array($res)){
		// 		$id = $row['id'];
		// }
    
    
    $file_type = $_FILES['resume']['type']; 

		$path = "uploads/$cnt_no.$file_type";
		
		$actualpath = "http://sharpindia.anveshpoda.tech/$path";


    
    $sql = "INSERT INTO submitResume VALUES(0,'$mail','$cnt_no','$name','$degree','$aggregate','$passOutYr','$loc','$yrsOfExp','$streams','$langs','$actualpath');";
  
    if(mysqli_query($con,$sql)){
			file_put_contents($path,base64_decode($image));
			echo "Successfully Uploaded";
    }
    
    include "submitCV_mail.php"

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