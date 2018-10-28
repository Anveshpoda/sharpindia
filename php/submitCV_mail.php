<?php

if($_POST && isset($_FILES['resume']))
{

    //Capture POST data from HTML form and Sanitize them, 
    $sender_name    = filter_var($_POST["name"], FILTER_SANITIZE_STRING); //sender name
    $reply_to_email = filter_var($_POST["email"], FILTER_SANITIZE_STRING); //sender email used in "reply-to" header
    $subject        = "Enquery from ". $sender_name;


//    $p_fname     = $_POST['FName'];
//    $p_lname     = $_POST['LName'];
//    $p_mail      = $_POST['Email'];
//    $p_phone     = $_POST['Phone'];
//    $p_remarks   = $_POST['msg'];

   //Message of the Mail
   $message = "\n Enquiry Details...\n\n";
   $message = $message . "     Name: ".$name."\n";
  // $message = $message . "     Last Name: ".$p_lname."\n";
   $message = $message . "     Email: ".$mail."\n";
   $message = $message . "     Phone: ".$cnt_no."\n";
   $message = $message . "     Degree: ".$degree."\n";
   $message = $message . "     Aggregate: ".$aggregate."\n";
   $message = $message . "     Year of passedout: ".$passOutYr."\n";
   $message = $message . "     Preferred Location: ".$loc."\n";
   $message = $message . "     Years Of Experience: ".$yrsOfExp."\n";
   $message = $message . "     Preferred Streams: ".$streams."\n";
  // $message = $message . "     Remarks: ".$p_remarks."\n";


//    $message        = filter_var($_POST["msg"], FILTER_SANITIZE_STRING); //message

    $from_email         = 'enquiry@sharpindiags.com'; //from mail, it is mandatory with some hosts
   // $recipient_email    = 'kiran.nandamudi@gmail.com'; //recipient email (most cases it is your personal email)
   $recipient_email    = 'podaanvesh@gmail.com'; //recipient email (most cases it is your personal email) 

/*
    echo $sender_name; echo "<br />";
    echo $reply_to_email; echo "<br />";
    echo $subject; echo "<br />";
    echo $message; echo "<br />";

    echo $from_email; echo "<br />";
    echo $recipient_email; echo "<br />";
*/



    //Get uploaded file data
    $file_tmp_name    = $_FILES['resume']['tmp_name'];
    $file_name        = $_FILES['resume']['name'];
    $file_size        = $_FILES['resume']['size'];
    $file_type        = $_FILES['resume']['type'];
    $file_error       = $_FILES['resume']['error'];

    $uploadOk = 1;
    if ($file_size > 5100000) {
        echo "Sorry, your file is too large. should be below 5MB";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($file_type != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
        echo "Sorry, only PDF, doc & docx files are allowed.";
        $uploadOk = 0;
    }

    if($file_error > 0 &&  $uploadOk > 0  )
    {
        die('Upload error or No files uploaded');
    }
    //read from the uploaded file & base64_encode content for the mail
    $handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));

        $boundary = md5("sanwebe");
        //header
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From:".$from_email."\r\n"; 
        $headers .= "Reply-To: ".$reply_to_email."" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        //plain text 
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($message)); 
        
        //attachment
        $body .= "--$boundary\r\n";
        $body .="Content-Type: $file_type; name=".$file_name."\r\n";
        $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
        $body .="Content-Transfer-Encoding: base64\r\n";
        $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        $body .= $encoded_content; 
    
    $sentMail = @mail($recipient_email, $subject, $body, $headers);
    if($sentMail) //output success or failure messages
    {       
        die('Thank you for your email');
    }else{
        die('Could not send mail! Please check your PHP mail configuration.');  
    }

}

?>