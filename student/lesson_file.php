<?php
	session_start();
	require '../connection.php';
	if(!isset($_SESSION["sno"]) || !isset($_SESSION["student_user_password"])){
		header("location:login.php");
	}
	$course_content_id = "";
	$course_id = "";
	if(isset($_GET['course_content_id'])){
		$course_content_id = $_GET['course_content_id'];	
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
<!-- Google Fonts -->

    
<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-16x16.png">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../assets/css/animate.css" />
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
                    </button>
                    <a class="navbar-brand" href="#">
                    <h4 class="lesson_file_title"><i class="fas fa-book-open"></i> <span>
					<?php 
						$q= "select * from course_content_tbl where course_content_id = '$course_content_id'";
						$select = mysqli_query($conn,$q);
						if(mysqli_num_rows($select)>0){
							$row = mysqli_fetch_array($select);
							echo $row['course_content_title'];
							
						
					?>
					
					</span></h4>

                    </a>
                  </div>

              
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="learnCS-navbar-collapse-1">
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="signout.php" class="nav-item">
						<span class="fas fa-sign-in-alt"></span> Sign Out</a></li>
					</ul>
					
                  </div><!-- /.navbar-collapse -->


                </div><!-- /.container-fluid -->
              </nav>  
        
        </div>
    </header>
	
	<section class="lesson_file">
		<div class="container">
			
			<div class="row">
			  <?php
					$checkA = $row['course_content_assignment'];
				if($checkA!=""){
			  ?>
				<div class="col-md-3 quiz_block">
					<h2>Assignemnt of the Lesson:</h2>
					<p><i class="fas fa-arrow-right"></i> you can visit after lesson completion process at any time</p>
					<p><i class="fas fa-arrow-right"></i> <a href="assignment.php?course_assignment_id=<?php echo $course_content_id; ?>&course_id=<?php echo $course_id; ?>">click</a> for assigment</p>
						
				</div>
				<?php
				}
				else{
				?>
					<div class="col-md-2 quiz_block">
						<blink><p class="btn btn-success">No Assignment</p></blink>
					</div>
				<?php }?>
				<div class="col-md-6 video">
					<div class="embed-responsive embed-responsive-16by9">
				
						<video class="embed-responsive-item"  controls
						 >
						<source src="../assets/videos/
						<?php 		 
							echo $row['course_content_video_title'];
						}
						
						?>" type="video/mp4">
						</video>
					
					</div>
					
				</div>
				<div class="col-md-3 quiz_block">
						<p class="quiz_statement"><i class="fas fa-quote-left"></i> After video completion it's important to attend the quiz then lesson will be completed <i class="fas fa-quote-right"></i></p>
						<h1><a href="quiz.php?course_quiz_id=<?php echo $course_content_id; ?>&course_id=<?php echo $course_id; ?>" class="quiz_button">Quiz</a></h1>
					
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
	
	<!-- Bootstraps -->
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Jquery library -->
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/jquery.waypoints.min.js"></script>
	
</body>
</html>