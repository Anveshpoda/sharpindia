<?php
require "../php/login.php";
?>
<!DOCTYPE html>
<html lang="zxx">
<!-- Head -->

<head>
    <title>sharpindia</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
        <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="../css/login.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <!-- //fonts -->
    <link rel="stylesheet" href="../css/font-awesome.css" type="text/css" media="all">
    <!-- //Font-Awesome-File-Links -->
	
	<!-- Google fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- Google fonts -->

</head>
<!-- //Head -->
<!-- Body -->

<body>
    <div class="content-w3ls" id="content">
        <div class="content-bottom">
			<h2>Login Here</h2>
            <form action="" method="post">
                <div class="field-group">
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input name="email" id="text1" type="email" value="" placeholder="Email" required>
                    </div>
                </div>
                <div class="field-group">
                    <div class="wthree-field">
                    <span class="fa fa-lock" aria-hidden="true"></span>
                        <input name="password" id="myInput" type="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="field-group">
                    <div class="check">
                        <label class="checkbox w3l">
                            <input type="checkbox" onclick="myFunction()">
                            <i> </i>show password</label>
                    </div>
                    <!-- script for show password -->
                    <script>
                        function myFunction() {
                            var x = document.getElementById("myInput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                    <!-- //script for show password -->
                </div>
                <div class="wthree-field">
                    <input id="saveForm" name="saveForm" type="submit" value="sign in" />
                </div>
                <ul class="list-login">
                    <li class="switch-agileits">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                            keep signed in
                        </label>
                    </li>
                    <li>
                        <a href="../php/forgetPass.php" class="text-right">forgot password?</a>
                    </li>
                    <li class="clearfix"></li>
                </ul>
            </form>
        </div>
    </div>
</body>
<!-- //Body -->
</html>
