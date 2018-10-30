<?php
    
    if (isset($_POST['email'])) {

        require_once "init.php";

       $email = $con->real_escape_string($_POST['email']);

        $sql = $con->query("SELECT email,firstName,password FROM userProfile WHERE email='$email'");

        if ($sql->num_rows > 0) {

            $row = mysqli_fetch_array($sql);

            $from_email         = 'enquiry@sharpindiags.com'; //from mail, it is mandatory with some hosts
            //     // $recipient_email    = 'kiran.nandamudi@gmail.com'; //recipient email (most cases it is your personal email)
            $recipient_email    = 'podaanvesh@gmail.com'; //recipient email (most cases it is your personal email)          
        
            $password = $row['password'];
            $to = $row['email'];
            $subject = "Your Recovered Password";
 
            $txt = " Hi,".$row['firstName']. "\r\n Your Password: ".$password."\r\n";
            $txt .= "Please use this password to login to your account \r\n ";
            $headers = "From: enquiry@sharpindiags.com" . "\r\n";
            $headers .= "Reply-To: enquiry@sharpindiags.com" . "\r\n";

            // mail($to,$subject,$txt,$headers);

            if ( mail($to,$subject,$txt,$headers))
    	        exit(json_encode(array("status" => 1, "msg" => 'Please Check Your Email Inbox!')));
    	    else
    	        exit(json_encode(array("status" => 0, "msg" => 'Something Wrong Just Happened! Please try again!')));

            
            exit(json_encode(array("status" => 1, "msg" => $row['password'] )));
            
            
            
          

	        // $con->query("UPDATE users SET token='$token', 
            //           tokenExpire=DATE_ADD(NOW(), INTERVAL 5 MINUTE)
            //           WHERE email='$email'
            // ");

	        // if ($mail->send())
    	    //     exit(json_encode(array("status" => 1, "msg" => 'Please Check Your Email Inbox!')));
    	    // else
    	    //     exit(json_encode(array("status" => 0, "msg" => 'Something Wrong Just Happened! Please try again!')));
        } else
            exit(json_encode(array("status" => 0, "msg" => 'Please Check Your Email!')));
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3"   >
                <img width="60%" src="../images/logo.png" ><br><br>
                <input class="form-control" id="email" placeholder="Your Email Address"><br>
                <input type="button" class="btn btn-primary" value="Reset Password">
                <br><br>
                <p id="response"></p>
                <script> document.getElementById("response").innerHTML = "New text!";  </script>
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var email = $("#email");

        $(document).ready(function () {
            $('.btn-primary').on('click', function () {
                if (email.val() != "") {
                    email.css('border', '1px solid green');

                    $.ajax({
                       url: '',
                       method: 'POST',
                       dataType: 'json',
                       data: {
                           email: email.val()
                       }, success: function (response) {
                            if (!response.success)
                                $("#response").html(response.msg).css('color', "red");
                            else
                                $("#response").html(response.msg).css('color', "green");
                        }
                    });
                } else
                    email.css('border', '1px solid red');
            });
        });
    </script>
</body>
</html>
