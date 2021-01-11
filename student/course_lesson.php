<?php
	session_start();
	require '../connection.php';
	if(!isset($_SESSION["adminEmail"]) || !isset($_SESSION["sno"])){
		header("location:login.php");
	}
	$course_id = "";
	if(isset($_GET['course_id'])){
		$course_id = $_GET['course_id'];
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- fonts another -->
    <title>Learning-Management-System</title>

    
<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-16x16.png">

    <!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../assets/css/sweetalert.min.css" >
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" >
  
         <!-- fontsawseome -->
         <link href="../assets/fontawsome/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css" />

    

    
    
</head>
<body>


<!-- Header -->
    <header class="header" id="HOME">
        <!-- Navigation from bs -->
     <nav class="navbar navbar-default navbar-fixed-top">

                <div class="container-fluid">

                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" style="float:left;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#learnCS-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
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
					<h4><span class="fas fa-swatchbook icons"></span> Lessons</h4>
				</div>
				<div class="col-md-6 welcome">
					
					<h1>Course Lessons</h1>
					<p>You can attend a lecture anytime from anywhere</p>
				</div>
				<?php 
					
					$find_std_id = $_SESSION["sno"];
					$q_find_id = mysqli_fetch_array(mysqli_query($conn,"select * from student_tbl where admin_tbl_pkey = '$find_std_id'"))['std_id'];
					
					$find = 0;
					
					$q_check = mysqli_query($conn,"select * from lesson_complete_tbl where student_id = '$q_find_id'");
					if(mysqli_num_rows($q_check)>0){
						
						while($row_find = mysqli_fetch_array($q_check)){
							
							 $find++;
						}
						$total_lesson = mysqli_fetch_array(mysqli_query($conn,"select * from add_course_tbl where add_co_id = '$course_id'"))["add_co_total_lecture"];
						$find = $total_lesson - $find;
						
					}
				   
				
				if($find == -2){
					
					$select_exam = mysqli_query($conn,"select * from exam_tbl where course_id = '$course_id'");
					if(mysqli_num_rows($select_exam)>0){
						$check_exam = mysqli_query($conn,"select * from std_course_complete_tbl where course_id = '$course_id' and std_id = '$q_find_id'");
					if(mysqli_num_rows($check_exam)==0){
				?>
				<div class="col-md-3 exam_button" >
					
					<a href="exam.php?course_id=<?php echo $course_id; ?>"><input class="btn btn-success" style="font-size: 25px;font-weight: 600" type="submit" name="exam_start" value="Exam">
					
					</a>
					
				</div>
				<?php
					}
					}
				}
				?>
				
				
				
				
				
				
			</div>
		</div>
		
		<div class="container tutor-image">
			<div class="row">
				<?php
					$t_id = $_SESSION['teacher_i_id'];
					
					$q_img = "select * from teacher_tbl where teacher_add_id = '$t_id'";
					
					$select = mysqli_query($conn,$q_img);
					if(mysqli_num_rows($select)>0){
						$row_img = mysqli_fetch_array($select);
						$check_img = $row_img['teacher_image_name'];
						if($check_img ==""){
					
				?>
				<div class="col-md-3">
					<img src="../assets/images/teacher.png"> <br>
					
				</div>
						<?php 
						}else{
						?>
				<div class="col-md-3">
					<img src="../assets/images/<?php echo $row_img['teacher_image_name']; ?>"> <br>
					
				</div>
					<?php } }?>
				<div class="col-md-9">
					
						<div class="lesson-course">
							<ol type="1">
								<?php
									$s_id = $_SESSION['sno'];
									$query_select = "select * from course_content_tbl where course_add_id = '$course_id'";
									$data = mysqli_query($conn,$query_select);
							
									if(mysqli_num_rows($data)>0){
										while($row = mysqli_fetch_array($data)){
										?>
											<li class="lesson-course-title">
											
									<div class="col-md-6 special_overflow">
										<span class="course-title-name "><?php echo $row['course_content_title'].""; ?></span>
									</div>
									<div class="col-md-4 text-right">
										<a  href="lesson_file.php?course_content_id=<?php echo $row['course_content_id']; ?>&course_id=<?php echo $course_id; ?>" target="blank" class="view-lecture">Start Lesson</a>
										
									</div>		
									
									<div class="col-md-2 text-left">
									<?php
										$course_content_id = $row['course_content_id'];
										if(mysqli_num_rows(mysqli_query($conn,"select * from lesson_complete_tbl where course_content_id = '$course_content_id' and student_id = '$s_id'"))>0){
											
											?>
										<span class="fas fa-check" style="color: #4CAF50"></span>	
												<?php
										}
									?>
										
									</div>
									
									
								</li>
								
										<?php
								}
							}
								
						?>
								
								
								
							</ol>
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
                        <p>Copyright &copy; 2019-<a href="#">LearnCS.</a> All Rights Reserved</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
	
	
	<script>
											$( "#target" ).click(function() {
													swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});
																				});
											
											
										</script>
	<!-- Bootstraps -->
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
		
    <!-- Jquery library -->
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/jquery.waypoints.min.js"></script>
	
</body>
</html>