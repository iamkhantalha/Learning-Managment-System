<?php
	session_start();
	if(!isset($_SESSION["adminEmail"]) || !isset($_SESSION["userRole"])){
		header("location:login.php");
	}
	require '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- fonts another -->
    <title>Learning-Management-System</title>
<!-- Google Fonts -->

    
<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-16x16.png">
   <!-- CSS -->
   
    
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../assets/css/animate.css" />
         <!-- fontsawseome -->
         <link href="../assets/fontawsome/css/all.css" rel="stylesheet">
		 <link rel="stylesheet" type="text/css" href="../assets/css/sweetalert.css" >
<link rel="stylesheet" type="text/css" href="../assets/css/style.css" />

    
	<!-- Bootstraps -->
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/sweetalert.min.js"></script>

    
    
</head>
<body>
		


<!-- Header -->
    <header class="header" id="HOME">
        <!-- Navigation from bs -->
     <nav class="navbar navbar-default navbar-fixed-top">

                <div class="container-fluid">

                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" style="float: left;" class="navbar-toggle collapsed"  data-toggle="collapse" data-target="#learnCS-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                                 

                    </a>
                  </div>

              
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="learnCS-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                          <li><a href="dashboard.php" class="nav-item">Dashboard</a></li>
                          <li><a href="courses.php" class="nav-item">Courses</a></li>
                         
                          <li><div class="dropdown button_dropdown_d">
								<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												Account
												
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="account.php" class="active"><i class="fas fa-user-circle"></i> &nbsp;&nbsp;General</a></li>
								<li><a href="change.php"><i class="fas fa-user-lock"></i> &nbsp;&nbsp;Security</a></li>
								
								</ul>
								</div>
							</li>
                          
                    </ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="signout.php" class="nav-item">
						<span class="fas fa-sign-in-alt"></span> Sign Out</a></li>
					</ul>
                  </div><!-- /.navbar-collapse -->


                </div><!-- /.container-fluid -->
              </nav>  
        
        </div>
    </header>
	
	<section class="dashboard-page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-3 title">
					<h4><span class="fab fa-centercode icons"></span> Dashboard</h4>
				</div>
				<div class="col-md-6 welcome">
					 
					
				<script>					
					function sweet(){
						swal("Here's the title!", "...and here's the text!");
					}
						
				</script>
					<h4>Welcome	</h4>
					<h1> <?php 
						$std_sno = $_SESSION['sno'];
						$q = "select std_name from student_tbl where admin_tbl_pkey = '$std_sno'";
						$d = mysqli_query($conn,$q);
						if(mysqli_num_rows($d)>0){
							$d_name = mysqli_fetch_array($d);
							echo $d_name['std_name'];
							
						}
					?> </h1>
				</div>
			</div>
		</div>
	
		<div class="container">
			<div class="row">
				
				<div class="col-md-offset-3 col-md-8 section-context">
					<div class="row">
						<div class="col-md-6">
						<h2>Welcome to your new learning experience of <b>LearnCS</b></h2>
						</div>
						<?php 
							$std_email_pic =$std_sno;
					
							$q_pic = "select * from student_tbl where admin_tbl_pkey = '$std_email_pic'";
							$data_select_pic = mysqli_query($conn,$q_pic);
							$row_pic = mysqli_fetch_array($data_select_pic);
							
						?>
						
						<div class="col-md-6">
							<?php 
							if($row_pic['std_image_name'] == ""){
							?>
							<img width="100%" style="border-radius: 0px" src="../assets/images/student.jpg" alt="image" > 
						<?php
						
							}
							else{
						?>
						<img width="100%"  src="../assets/images/<?php echo $row_pic['std_image_name']; ?>" alt="image" > 
						<?php
							}
						?>
						
						</div>
					</div>
					<div class="row">
						
						 
						 <div class="col-md-8">
							<h1>My Courses</h1>
							<hr>
							<?php
									$s_id =$_SESSION['sno'];
									$select = mysqli_query($conn,"select * from enroll_tbl where std_id = '$s_id'");
									if(mysqli_num_rows($select) > 0){
										while($row = mysqli_fetch_array($select)){
											$std_id = $row['std_id'];
											$course_id = $row['course_id'];
											$teacher_id = $row['teacher_id'];
											?>
											
									
							<div class="courses-title">
								
								<span class="course-name">
									<?php 
									
									$select_d_r = mysqli_query($conn,"select * from add_course_tbl where add_co_id = '$course_id'");
									if(mysqli_num_rows($select_d_r)>0){
										$data_row = mysqli_fetch_array($select_d_r);
										$std_c_i = $data_row['add_co_id'];
										echo $data_row['add_co_name']; 
									?>
								</span> <br> <br>
								<span class="progress-line">
								
								<div class="progress">
								<?php
									$complete_lesson = mysqli_num_rows(mysqli_query($conn,"select * from lesson_complete_tbl where course_id = '$course_id' and student_id = '$std_id'"));
									
									 $course_t_lec = mysqli_query($conn,"select * from course_content_tbl where course_add_id = '$course_id'");
									 if(mysqli_num_rows($course_t_lec)>0){
									 $row_lec = mysqli_fetch_array($course_t_lec);
									 $row_id = $row_lec['course_add_id'];
									 $course_out_lec = mysqli_query($conn,"select * from add_course_tbl where add_co_id = '$row_id'");
									 if(mysqli_num_rows($course_out_lec)>0){
										 $row_t_lec = mysqli_fetch_array($course_out_lec)['add_co_total_lecture'];
										 
									 $p = ($complete_lesson*90)/$row_t_lec;
									 $per = (int)$p;
								?>
								<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php 
								$std_id_get = $_SESSION["student_user_name"];
								$get_id_user = mysqli_fetch_array(mysqli_query($conn,"select * from student_tbl where std_email = '$std_id_get'"))['std_id'];
								$check_complete = mysqli_query($conn,"select * from std_course_complete_tbl where course_id = '$course_id' and std_id = '$get_id_user'");
								$high = 0;
								if(mysqli_num_rows($check_complete)>0){
									echo 100;
									$high = 100;
								}
								else{echo $per;
								$high = $per;
								} 
								?>%">
									<span  color="black"><?php echo $high; ?>%</span>
								</div>
								<?php
									}
									 }
								?>
								</div>
								
								</span> 
								<br>
								<span>
								<?php		
									$q_c_c = "select * from std_course_complete_tbl where course_id = '$std_c_i' and std_id = '$s_id'";
									$select_c = mysqli_query($conn,$q_c_c);
									if(mysqli_num_rows($select_c)>0){
										$row_c_c = mysqli_fetch_array($select_c);
										echo "<span style='text-decoration: underline;cursor: pointer;'>Obtain Marks <b>".$row_c_c['std_marks']."</b> out of <b>100</b></span>";
										
									}
								?>
								</span>
								<span class="continue-course"><a href="course_lesson.php?course_id=<?php $_SESSION['teacher_i_id']= $teacher_id;  echo $course_id; ?>">Continue</a></span>
							</div>
							
									<?php
									}
										}
									}
								?>
							
							
						
					</div>
				</div>
			</div>
		</div>
		
		
	</section>
	
	
	<section class="footer">
      
			
			
			<div class="container">
			
            <div class="row">
                <div class="col-md-8">
                    <div id="copyright">
                        <p>Copyright &copy; 2019-<a href="dashboard.php">LearnCS.</a> All Rights Reserved</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
	
	
		
    <!-- Jquery library -->
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/jquery.waypoints.min.js"></script>
	
	
</body>
</html>