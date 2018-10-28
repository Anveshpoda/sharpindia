<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Sharp india</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .modal {
            z-index: 100001 !important;
            opacity:0.5px;
        }

        .container-fluid {
            padding: 30px 50px;
        }

        .bg-grey {
            background-color: #f6f6f6;
        }

        .logo-small {
            color: #f4511e;
            font-size: 50px;
        }

        .logo {
            color: #f4511e;
            font-size: 200px;
        }

        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }

        .carousel-control.right,
        .carousel-control.left {
            background-image: none;
            color: #f4511e;
        }

        .carousel-indicators li {
            border-color: #f4511e;
        }

        .carousel-indicators li.active {
            background-color: #f4511e;
        }

        .item h4 {
            font-size: 19px;
            line-height: 1.375em;
            font-weight: 400;
            font-style: italic;
            margin: 70px 0;
        }

        .item span {
            font-style: normal;
        }

        .panel {
            border: 1px solid #f4511e;
            border-radius: 0 !important;
            transition: box-shadow 0.5s;
        }

        .panel:hover {
            box-shadow: 5px 0px 40px rgba(0, 0, 0, .2);
        }

        .panel-footer .btn:hover {
            border: 1px solid #f4511e;
            background-color: #fff !important;
            color: #f4511e;
        }

        .panel-heading {
            color: #fff !important;
            background-color: #f4511e !important;
            padding: 25px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .panel-footer {
            background-color: white !important;
        }

        .panel-footer h3 {
            font-size: 32px;
        }

        .panel-footer h4 {
            color: #aaa;
            font-size: 14px;
        }

        .panel-footer .btn {
            margin: 15px 0;
            background-color: #f4511e;
            color: #fff;
        }

        .navbar {
            margin-bottom: 0;
            /* background-color: #f4511e; */
            z-index: 9999;
            border: 0;
            font-size: 16px !important;
            line-height: 1.42857143 !important;
            border-radius: 0;
            font-family: Montserrat, sans-serif;
        }

        .navbar li a,
        .navbar .navbar-brand {
            padding: 20px 10px 0 0px;
            color: black !important;
        }

        .navbar-nav li a:hover,
        .navbar-nav li.active a {
            color: #f4511e !important;
            background-color: #fff !important;
        }

        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fff !important;
        }

        footer .glyphicon {
            font-size: 20px;
            margin-bottom: 20px;
            color: #f4511e;
        }

        .slideanim {
            visibility: hidden;
        }

        .btn-danger {
            color: #fff;
            background-color: #F77614;
            border-color: #F77614;
        }

        .slide {
            animation-name: slide;
            -webkit-animation-name: slide;
            animation-duration: 1s;
            -webkit-animation-duration: 1s;
            visibility: visible;
        }
    </style>
    <script>
        window.onscroll = function () {
            growShrinkLogo()
        };

        function growShrinkLogo() {
            var Logo = document.getElementById("Logo")
            if (document.body.scrollTop > 5 || document.documentElement.scrollTop > 5) {
                Logo.style.width = '10em';
                Logo.style.height = '3em';
            } else {
                Logo.style.width = '16em';
                Logo.style.height = '6em';
            }
        }
    </script>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#myPage">
                    <img class="mobile-show" src="images/logo.png" style="width:120px" style="visibility: hidden">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <div class="row" id="navlist">
                    <ul class="nav navbar-nav">

                        <li>
                            <a href="#submit" style="margin:25px 0 0 0">Submit resume</a>
                        </li>
                        <li>
                            <a href="#rpower" style="margin:25px 0 0 0">Request Manpower</a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/logo.png" style="width:16em;height:6em" id='Logo' class="mobile-hide">
                            </a>
                        </li>
                        <li>
                            <!--<a href="#login" data-toggle="modal" data-target="#myModal" style="margin:25px 0 0 0">-->
                            <?php
                        
                                 if (isset($_SESSION['SIfname'])) {
                                    // logged in
                                    echo '<a href="#login" data-toggle="modal" data-target="#myModal" style="margin:25px 0 0 0"><b>'.$_SESSION["SIfname"].'</b></a>';
                                  } else {
                                    // not logged in
                                    echo ' <a href="#login" data-toggle="modal" data-target="#myModal" style="margin:25px 0 0 0">Login</a>';
                                  }
                            ?>
                            <!--</a>-->
                        </li>
                        <li>
                            <a href="./templates/registration.html" style="margin:25px 0 0 0">Register</a>
                        </li>
                    </ul>
                </div>
                <div class="row" id="list">
                    <ul class="nav navbar-nav navbar-right" >
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="./templates/about.html">About us</a>
                        </li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li>
                            <a href="#careers">Careers</a>
                        </li>
                        <li>
                            <a href="./templates/employers.html">Employers</a>
                        </li>
                        <li>
                            <a href="#training">Online training</a>
                        </li>
                        <li>
                            <a href="#partners">Partners</a>
                        </li>
                        <li>
                            <a href="#blog">Blog</a>
                        </li>
                        <li>
                            <a href="./templates/contactus.html">Contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container" id="modal">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <?php
                    //  require "./templates/login.html"
                    ?>
                    <div class="modal-body">
                        <iframe scrolling="no" frameborder="0" src="./templates/login.php" width="870" height="650"></iframe>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="jumbotron text-center" id="jumbotron">
        <!-- <img src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" alt="image"/> -->
        <form>
            <div class="row">
                <div class="col-sm-4">
                    <input type="email" class="form-control" size="10" placeholder="Email Address" required>
                </div>
                <div class="col-sm-4">
                    <select class="form-control">
                        <option>select a classification</option>
                        <option>Hyderabad</option>
                        <option>Chirala</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <select class="form-control">
                        <option>select Location</option>
                        <option>Hyderabad</option>
                        <option>Chirala</option>
                    </select>
                </div>

            </div>
            <br>
            <div class="input-group-btn">
                <button type="button" class="btn btn-danger" id="button">Search Jobs</button>
            </div>
        </form>
    </div>
    <div id="statistics" class="container-fluid text-center">
        <u>
            <h2>Our statistics</h2>
        </u>
        <div class="row slideanim">
            <div class="col-sm-2">
                <span>
                    <img src="./images/visiticon.PNG" alt="icon" />
                </span>
                <u>
                    <h4>5000+ visitors every year </h4>
                </u>
            </div>
            <div class="col-lg-1">
                <span>
                    <img src="./images/clientsicon.PNG" alt="icon" />
                </span>
                <u>
                    <h4>100+ clients </h4>
                </u>
                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>
            <div class="col-sm-3">
                <span>
                    <img src="./images/tickicon.PNG" alt="icon" />
                </span>
                <u>
                    <h4>6000+ job vacancies</h4>
                </u>
                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>
            <div class="col-sm-3">
                <span>
                    <img src="./images/successicon.PNG" alt="icon" />
                </span>
                <u>
                    <h4>4000+ success stories</h4>
                </u>
                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>
            <div class="col-sm-3">
                <span>
                    <img src="./images/calicon.PNG" alt="icon" />
                </span>
                <u>
                    <h4>3+ years of excellence</h4>
                </u>
                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>

        </div>
    </div>
    <div id="trainingsessions" class="container-fluid text-center">
        <h2>Training sessions</h2>
        <div class="row slideanim">
            <div class="col-sm-2">
                <span>
                    <img src="./images/computericon.PNG" alt="icon" />
                </span>
                <h4>Computer fundamentals </h4>
            </div>
            <div class="col-sm-2">
                <span>
                    <img src="./images/globeicon.PNG" alt="icon" />
                </span>
                <h4>Govt enterence tests</h4>
                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>
            <div class="col-sm-2">
                <span>
                    <img src="./images/resumeicon.PNG" alt="icon" />
                </span>
                <h4>Resume preparation</h4>
                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>
            <div class="col-sm-2">
                <span>
                    <img src="./images/openericon.PNG" alt="icon" />
                </span>
                <h4>IT enterence tests</h4>
                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>
            <div class="col-sm-2">
                <span>
                    <img src="./images/bankingicon.PNG" alt="icon" />
                </span>
                <h4>Banking</h4>
                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>
            <div class="col-sm-2">
                <span>
                    <img src="./images/crticon.PNG" alt="icon" />
                </span>
                <h4>CRT</h4>
                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>
        </div>
    </div>
    <div id="latestjobs" class="container-fluid text-center bg-grey">

        <h2>Latest Jobs</h2>
        <div id="jobsCarousel" class="carousel slide text-center" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#jobsCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#jobsCarousel" data-slide-to="1"></li>
                <li data-target="#jobsCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <h2>
                        <img src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" alt="image" />
                    </h2>
                </div>
                <div class="item">
                    <h2>
                        <br>
                        <img src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" alt="image" />
                    </h2>
                </div>
                <div class="item">
                    <h2>
                        <br>
                        <img src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" alt="image" />
                    </h2>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#jobsCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#jobsCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <ul class="pagination" id="pagination">
            <li>
                <a href="#">1</a>
            </li>
            <li class="active">
                <a href="#">2</a>
            </li>
            <li>
                <a href="#">3</a>
            </li>
            <li>
                <a href="#">4</a>
            </li>
            <li>
                <a href="#">5</a>
            </li>
        </ul>

    </div>

    <div id="services" class="container-fluid text-center">
        <h2>We serve</h2>
        <div class="row slideanim">
            <div class="col-sm-2">
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-off logo-small"></span>
                    </a>
                    <h4>Staffing and placements</h4>
                </li>

            </div>
            <div class="col-sm-2">
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-off logo-small"></span>
                    </a>
                    <h4>E governance</h4>
                </li>


                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>
            <div class="col-sm-2">
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-off logo-small"></span>
                    </a>
                    <h4>Finishing school training</h4>
                </li>

                <!-- <h4>Finishing school training</h4> -->
                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>
            <div class="col-sm-2">
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-off logo-small"></span>
                    </a>
                    <h4>HR consulting</h4>
                </li>


                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>

            <div class="col-sm-2">
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-off logo-small"></span>
                    </a>
                    <h4>Career counseling</h4>
                </li>


                <!-- <p>Lorem ipsum dolor sit amet..</p> -->
            </div>
        </div>
    </div>



    <div id="testimonial" class="container-fluid text-center bg-grey">

        <u>
            <h2>Testimonials</h2>
        </u>
        <div class="col-md-4">
            <div id="testimonialCarousel1" class="carousel slide text-center" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#testimonialCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#testimonialCarousel1" data-slide-to="1"></li>
                    <li data-target="#testimonialCarousel1" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <h2>Corporates
                            <img src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" height="200px"
                                width="500px" alt="image" />
                        </h2>
                    </div>
                    <div class="item">
                        <h2>"One word... WOW!!"
                            <br>
                            <img src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" height="200px"
                                width="500px" alt="image" />
                        </h2>
                    </div>
                    <div class="item">
                        <h2>"Could I... BE any more happy with this company?"
                            <br>
                            <img src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" height="200px"
                                width="500px" alt="image" />
                        </h2>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#testimonialCarousel1" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#testimonialCarousel1" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-sm-4">

        </div>
        <div class="col-md-4">
            <div id="testimonialCarousel2" class="carousel slide text-center" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#testimonialCarousel2" data-slide-to="0" class="active"></li>
                    <li data-target="#testimonialCarousel2" data-slide-to="1"></li>
                    <li data-target="#testimonialCarousel2" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <h2>Students
                            <img src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" height="200px"
                                width="500px" alt="image" />
                        </h2>
                    </div>
                    <div class="item">
                        <h2>"One word... WOW!!"
                            <br>
                            <img src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" height="200px"
                                width="500px" alt="image" />
                        </h2>
                    </div>
                    <div class="item">
                        <h2>"Could I... BE any more happy with this company?"
                            <br>
                            <img src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" height="200px"
                                width="500px" alt="image" />
                        </h2>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#testimonialCarousel2" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#testimonialCarousel2" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>




    <!-- Container (Contact Section) -->
    <div id="contact" class="container-fluid bg-grey">

        <div class="row">
            <div class="col-sm-3">
                <ul>
                    <li>Home</li>
                    <li>About us</li>
                    <li>Employers</li>
                    <li>Careers</li>
                    <li>Partners</li>
                    <li>Gallery</li>
                    <li>Trainings</li>
                    <li>Privacy policy</li>
                    <li>Terms & conditions</li>
                    <li>Blog</li>
                </ul>

            </div>
            <div class="col-sm-5 slideanim">
                <div class="row">
                    <div class="col-sm-5 form-group">
                        <h3 class="text-center">CONTACT</h3>
                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        <br>
                        <input class="form-control" id="number" name="number" placeholder="Mobile Number" type="number" required>
                        <br>
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 form-group">
                        <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 form-group">
                        <button class="btn btn-info" type="submit">Send</button>
                    </div>
                </div>
                <div>
                    <i class="fa fa-linkedin"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-whatsapp"></i>
                    <i class="fa fa-facebook"></i>
                </div>
            </div>
            <div class="col-sm-4 slideanim" id="videos">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <h3>GALLERY</h3>
                        <textarea class="form-control" id="comments" name="comments" rows="5" cols="20"></textarea>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <h3>VIDEOS</h3>
                    <div class="col-sm-12 form-group">
                        <textarea class="form-control" id="comments" name="comments" rows="5"></textarea>
                        <br>
                    </div>
                </div>
                <!-- <p style="color:white">All rights reserved @sharp india global solutions</p> -->
            </div>
        </div>
    </div>


    <!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

    <footer class="container-fluid text-center" id="gotop">
        <a href="#myPage" title="To Top">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
        <p>All rights reserved @sharpindia global solutions
            <a href="https://www.sharpindia.com" title="Visit sharpindia">www.sharpindia.com</a>
        </p>
    </footer>

    <script>
        $(document).ready(function () {
            // Add smooth scrolling to all links in navbar + footer link
            $(".navbar a, footer a[href='#myPage']").on('click', function (event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 900, function () {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });

            $(window).scroll(function () {
                $(".slideanim").each(function () {
                    var pos = $(this).offset().top;

                    var winTop = $(window).scrollTop();
                    if (pos < winTop + 600) {
                        $(this).addClass("slide");
                    }
                });
            });
        })
    </script>

</body>

</html>