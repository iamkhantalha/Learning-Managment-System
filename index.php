<?php
ob_start();
 session_start();
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- fonts another -->
    <title>Learning-Management-System</title>

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <link rel="stylesheet" href="assets/css/animate.css" />
    <!-- fontsawseome -->
    <link href="assets/fontawsome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />





</head>

<body>

    <!-- Header -->
    <header class="header" id="HOME">
        <!-- Navigation from bs -->
        <nav class="navbar navbar-default navbar-fixed-top">

            <div class="container-fluid">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#gandhara-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand nav-learnCS" href="index.php">
                        <img src="assets/images/apple-icon-114x114.png">

                    </a>
                </div>


                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="gandhara-navbar-collapse-1">



                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#HOME" class="nav-item">HOME</a></li>
                        <li><a href="#ABOUT" class="nav-item">About</a></li>
                        <li><a href="#COURSES" class="nav-item">Courses</a></li>
                        <li><a href="#CONTACT" class="nav-item">Contact</a></li>
                        <li><a href="#loginmodal" data-toggle="modal" data-target=".login-register-form" class="nav-item">Log In</a></li>
                        <li>
                            <!-- <a href="student/signup.php" class="nav-item">Register</a> -->




                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->


            </div><!-- /.container-fluid -->
        </nav>

        </div>
    </header>




    <!-- carousel -->
    <section class="index-section">

        <div id="themeSlider" class="carousel fade-carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#themeSlider" data-slide-to="0" class="active"></li>
                <li data-target="#themeSlider" data-slide-to="1"></li>
                <li data-target="#themeSlider" data-slide-to="2"></li>
                <li data-target="#themeSlider" data-slide-to="3"></li>
            </ol>

            <div class="carousel-inner">
                <div class="item active">
                    <div class="imgOverlay"></div>

                    <img src="assets/images/pic6.JPG" alt="image">
                    <div class="carousel-caption">
                        <a href="#ABOUT">
                            <h3 class="index-carousel-title">
                                <blink>Why LearnCS?</blink>
                            </h3>
                        </a>
                        <p>Your satisfiction is our top priority.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="imgOverlay"></div>
                    <img src="assets/images/pic4.JPG" alt="image">
                    <div class="carousel-caption">
                        <a href="#COURSES">
                            <h3 class="index-carousel-title">
                                <blink>Our Product?</blink>
                            </h3>
                        </a>
                        <p>We are Proffessional.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="imgOverlay"></div>
                    <img src="assets/images/pic5.JPG" alt="image">
                    <div class="carousel-caption">
                        <a href="#CONTACT">
                            <h3 class="index-carousel-title">
                                <blink>How to Contact Us?</blink>
                            </h3>
                        </a>
                        <p>contact for faculty member.</p>
                    </div>

                </div>
                <div class="item">
                    <div class="imgOverlay"></div>
                    <img src="assets/images/pic1.JPG" alt="image">
                    <div class="carousel-caption">
                        <a href="student/signup.php">
                            <h3 class="index-carousel-title">
                                <blink>Sign Up?</blink>
                            </h3>
                        </a>
                        <p>Learn CS from our professtionl.</p>
                    </div>
                </div>
            </div>

            <a class="left carousel-control" href="#themeSlider" data-slide="prev">
                <span class="fa fa-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#themeSlider" data-slide="next">
                <span class="fa fa-chevron-right"></span>
            </a>

            <div class="main-text ">
                <div class="col-md-offset-8 col-md-4">
                    <br>
                    <h1>
                        Learn CS online for free
                    </h1>

                </div>
            </div>
        </div>


    </section>

    <!-- Start: Welcome Section -->
    <section class="welcome-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="welcome-wrap">
                        <div class="welcome-text">
                            <h2 class="section-title">Welcome to the LearnCS</h2>
                            <span class="underline left"></span>
                            <p class="lead">We're here to provide quality learning classroom</p>
                            <p>LearnCS is a new way of learning Computer Science and related online.
                                It provides Structured Learning in an intuitive manner
                                where you learn at your own pace in your own time in a place that
                                suits you.</p>
                            <p>
                                Our target is to enable a hundred and thousands of any country people in LearnCS, so they can make a better future for themselves.We have a specialists that will guide you in some lecture where to use your skills, that you learn from them, in different dimensions on the field or off the field.so your responsibility will be to follow your leasson. Here is no constraint of age, any age of people can
                                create account then attend their lecture.
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-md-offset-2 col-md-4 image-logo">
                    <h2 class="section-title text-center">Our Logo</h2>
                    <img src="assets/images/logo.png">

                </div>
            </div>
        </div>
    </section>
    <!-- End: Welcome section -->


    <!-- Start: About section -->

    <section class="About-us" id="ABOUT">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="section-title">
                        <h2> About Us </h2>
                        <p>
                            This is a platform where a teacher have ability to teach well and want to utilize their skills for free.
                        </p>

                    </div>

                </div>

            </div>
        </div>

        <div class="about-us-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="about-side wow slideInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                            <a target="_self" href="images/about-side.jpg">
                                <img src="assets/images/pic11.jpg" alt="imgage" /></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="choose-us">
                            <h2>Why choose us?</h2>
                            <p>
                                Because our teacher will provide you that materials which other provide you for some money and time and place will be counted , but it is free of cost and you can watch your course via any internet connected device at a time and pace that suits you.
                            </p>
                            <!-- choose us items -->

                            <div class="choose-us-item1">
                                <h3><i class="fa fa-briefcase"></i>
                                    &nbsp;&nbsp;&nbsp; Our Experience</h3>
                                <p> LearnCS teachers have classroom teaching experience. All teachers are highly qualified and they are specialists in thier field.
                                </p>
                            </div>
                            <div class="choose-us-item2">
                                <h3><i class="fa fa-bullhorn"></i>
                                    &nbsp;&nbsp;&nbsp; Full Satisfaction</h3>
                                <p>

                                </p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- End: About section -->
    <!-- Start: Courses Section -->

    <section class="courses-section" id="COURSES">
        <div class="courses-title">
            <h1>Courses</h1>
            <h4>Choose any course as per your interest to become an expert</h3>
        </div>
        <div class="courses-option">
            <div class="container">
                <div class="row">
                    <h3>Currently, the Institute focuses on the following areas:</h3>
                    <?php
                    $query_select = "select * from add_course_tbl";
                    $data = mysqli_query($conn, $query_select);
                    if (mysqli_num_rows($data) > 0) {
                        while ($row = mysqli_fetch_array($data)) {
                    ?>
                            <div class="col-md-3 ">
                                <div class="panel panel-default p-0">
                                    <div class="panel-body  coursePanel">
                                        <h5><?php echo $row['add_co_name']; ?></h5>
                                        <h6><?php echo $row['add_co_description']; ?></h6>

                                    </div>
                                </div>

                            </div>
                    <?php
                        }
                    }
                    ?>



                </div>
            </div>
        </div>




    </section>


    <!-- End: Courses Section -->




    <!-- Footer -->
    <div class="before-footer">

    </div>
    <section class="footer">


        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div id="copyright">
                        <p>Copyright &copy; 2019-<a href="#">LearnCS.</a> All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-md-4 contact-us-part" id="CONTACT">
                    <h2>Contact Us</h2>
                    <i class="fab fa-whatsapp"></i><span> +923114222929</span> <br>
                    <i class="fab fa-whatsapp"></i><span> +923481900320</span> <br>
                    <i class="fas fa-envelope-square"></i> <span>lerancs2k@gmail.com</span> <br>
                    <i class="fas fa-mail-bulk"></i> <span>lerancs2k@hotmail.com</span>
                </div>
                <div class="col-md-4 footer-image">
                    <a href="index.php"><img src="assets/images/logo.png"></a>
                </div>

            </div>
        </div>
    </section>


    <!-- Login and Registeration Modal -->

    <div class="container">
        <div class="row">

            <!-- Signin & Signup -->
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target=".login-register-form">
                Login - Registration Modal
            </a>

            <!-- Login / Register Modal-->
            <div class="modal fade login-register-form" role="dialog" id="loginmodal">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                            <i class="fas fa-times"></i>
                            </button>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#login-form"><i class="fas fa-user"></i> Login </a></li>
                                <li><a data-toggle="tab" href="#registration-form"><i class="fas fa-user-plus"></i> Register </a></li>
                            </ul>
                        </div>
                        <div class="modal-body">
                            <div class="tab-content">
                                <div id="login-form" class="tab-pane fade in active">

                                    <form action=""  method="POST">
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" name="user_email" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                <label id="passLabel">Password</label>
                                <input type="password" name="user_password" class="form-control" id="user_password" placeholder="Enter password" required>
                                <div id="checkBox">
                                <input type="checkbox" onclick="checkMyPassword()"> Show Password
					<script>
					function checkMyPassword() {
										var p = document.getElementById("user_password");
                                        //var p = $('#user_password').val();

                                        if (p.type === "password") {
											p.type = "text";
										// alert(p);
										} else {
												p.type = "password";
												}
															}
					</script>
                            </div>
                        </div>
                    <div class="text-center">                   
                        <button type="submit" name="student_login" class="btn btn-primary loginBtn">Login</button>
                    </div>    
                    </form>

                                </div>
                                <div id="registration-form" class="tab-pane fade">
                                <form method="post" action="student/signup.php">
				<div class="form-group">
					<label>Full Name:</label>
					<input type="text" name="user_ac_name" class="form-control" autofocus required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="user_ac_email" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="user_ac_password" id="myInput" class="form-control psw" required>
					<input type="checkbox" onclick="checkPassword()" > Show Password
					<script>
					function checkPassword() {
										var x = document.getElementById("myInput");
										if (x.type === "password") {
											x.type = "text";
										} else {
												x.type = "password";
												}
															}
					</script>
                </div>
                <div class="form-group">
					<label>Contact No</label>
					<input type="text" name="user_ac_contact" class="form-control" required>
                </div>
                
       
				<div class="text-center form-btn">
                    <input type="hidden" name="role" value="2">
					<input  type="submit" class="btn btn-danger" name="user_submit_btn" value="Register" >
				</div>
		  </form>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php
						if(isset($_POST['student_login'])){
							$useremail = $_POST['user_email'];
							$userpassword = $_POST['user_password'];
							
							$q = "select * from admin_tbl where adm_email = '$useremail' and adm_password = '$userpassword'";
	                        $q_data = mysqli_query($conn,$q);
                            
							if(mysqli_num_rows($q_data)>0){
                               
								$row = mysqli_fetch_array($q_data);
								 $_SESSION['adminEmail'] =  $row['adm_email'];
                                 $_SESSION['userRole']       =  $row['role'];
                                 $_SESSION['sno']       =  $row['adm_id'];
                                
								//$_SESSION['student_user_password'] = $userpassword;
								header('location:checkpoint.php');
							}
						}
					
					?>

    <!-- Bootstraps -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <!-- Jquery library -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
</body>

</html>