<?php
	session_start();
	require '../connection.php';
	if(!isset($_SESSION["student_user_name"]) || !isset($_SESSION["student_user_password"])){
		header("location:login.php");
	}
	$course_assignment_id = "";
	$course_id = "";
	if(isset($_GET['course_assignment_id'])){
		$course_assignment_id = $_GET['course_assignment_id'];	
		$course_id = $_GET['course_id'];	
	}
	ob_start();
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
                    <h4 class="lesson_file_title"><i class="fas fa-file"></i> <span> Assignment</span></h4>

                    </a>
                  </div>

              
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="learnCS-navbar-collapse-1">
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="login.html" class="nav-item">
						<span class="fas fa-sign-in-alt"></span> Sign Out</a></li>
					</ul>
					
                  </div><!-- /.navbar-collapse -->


                </div><!-- /.container-fluid -->
              </nav>  
        
        </div>
    </header>
	
	<section class="assignment_file">
		<div class="container">
			
			<div class="row">
			<?php
			$std_email = $_SESSION['student_user_name'];
				$get_id = mysqli_fetch_array(mysqli_query($conn,"select * from student_tbl where std_email = '$std_email'"))["std_id"];
				$q_assign = "select * from course_content_tbl where course_content_id = '$course_assignment_id'";
				$data_get = mysqli_query($conn,$q_assign);
				
				$row = mysqli_fetch_array($data_get);
			?><br><br>
				<div class="col-md-offset-1 col-md-4" >
					<span class="h2"><i class="fas fa-download"></i> Assignment</span><br><br><br><br>
					<h3>Lesson Assignment is:</h3>
					<h3><?php echo $row['course_content_assignment']; ?></h3>
					
				
				</div>
				<div class="col-md-offset-2 col-md-4 file_block">
				<?php 
					$check_assignment = "select * from assignment_tbl where content_id = '$course_assignment_id' and std_id = '$get_id'";
					$data_get = mysqli_query($conn,$check_assignment);
					if(mysqli_num_rows($data_get)>0){
						?>
						
						<h4 style="color: #444"><span class="fas fa-check" style="color: #398439; font-size: 36px;"></span> Your assignment has been submit.</h4>
						<?php
					}
					else{
				?>
					<span class="h2"><i class="fas fa-upload"></i> Upload Assignment </span><br><br><br><br>
					<form method="post" action="assignment.php?course_assignment_id=<?php echo $course_assignment_id; ?>&course_id=<?php echo $course_id; ?>" enctype="multipart/form-data">
					<label>Select your Assignment here</label>
					<input type="file" name="assignment"> <br>
					<div class="text-center">
					 <input type="submit" class="btn btn-success" name="file" value="Upload " >
					</div>
					</form>
					
					<?php
					}
					?>
					<?php 
						if(isset($_POST['file'])){
							
							$fname = $_FILES["assignment"]["name"];
							
							$basename = pathinfo($fname)['filename'];
							
							$basename = $basename.rand();
							 $ftemp_name = $_FILES["assignment"]["tmp_name"];
							$extension = strtolower(pathinfo($fname,PATHINFO_EXTENSION));
							if($extension !="doc" && $extension !="docx" && $extension !="docm" && $extension !="dochtml"){
								
							}
							else{
							$basename = $basename.".".$extension;
							if(move_uploaded_file($ftemp_name,"../assets/assignment/$basename")){
								
								
								$stdID = $_SESSION['student_user_name'];
								$q_ID = "select * from student_tbl where std_email = '$stdID'";
								$data_get = mysqli_fetch_array(mysqli_query($conn,$q_ID))['std_id'];
					
								
								
								$contentdate = date("m/d/Y");
								$q_insert = "insert into assignment_tbl(course_id,content_id,assignment_name,assignment_date,std_id) values('$course_id','$course_assignment_id','$basename','$contentdate','$data_get')";
								
								if(mysqli_query($conn,$q_insert)){
									
									
									header("location: dashboard.php");
								}
							}
						}
						}
						?>
					
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