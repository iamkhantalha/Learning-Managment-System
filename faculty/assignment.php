<?php
	session_start();
	require '../connection.php';
	if(!isset($_SESSION["teacher_user_name"]) || !isset($_SESSION["teacher_user_password"])){
		header("location:login_as_teacher.php");
	}
	$course_assignment_id = "";
	if(isset($_GET['course_assignment_id'])){
		$course_assignment_id = $_GET['course_assignment_id'];		
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- fonts anotder -->
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
					<?php 
			$q_get_name = mysqli_fetch_array(mysqli_query($conn,"select * from add_course_tbl where add_co_id = '$course_assignment_id'"))['add_co_name'];
				
					?>
                    <h4 class="lesson_file_title"><i class="fas fa-file"></i> <span> Assignment of <?php echo $q_get_name; ?></span></h4>

                    </a>
                  </div>

              
                  <!-- Collect tde nav links, forms, and otder content for toggling -->
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
	
	<div class="col-md-offset-1 col-md-6 assignment_file">
	<?php
		$q_select = mysqli_query($conn,"select * from assignment_tbl where course_id = '$course_assignment_id'");

		
		if(mysqli_num_rows($q_select)>0){
			$data_get = mysqli_fetch_array($q_select)['content_id'];
			
					$lno = 1;
					
					?>
					<div class="teacher_watch">
					
					<h3 style="color: #449D44;text-decoration: underline"> Lecture <?php echo $lno; ?>:
					<?php
					echo $nested_q_data = mysqli_fetch_array(mysqli_query($conn,"select * from course_content_tbl where course_content_id = '$data_get'"))['course_content_title']."<br>";
					$lno++;
					?>
					</h3>
					</div>
					
								<?php
					$q_select_nest = mysqli_query($conn,"select * from assignment_tbl where content_id = '$data_get'");
					?>
					
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Roll No</th>
								<th>Student Name</th>
								<th>Assignment</th>
							</tr>
						</thead>
						<br>
					
					<?php
					
					
					
					while($data_nest = mysqli_fetch_array($q_select_nest)){
						
																	
					?>
	
					
					
					
					
					
					
						<tbody>
							<tr>
								<td><?php echo $data_nest["std_id"] ?></td>
								<td>
								<?php 
									$s_id = $data_nest["std_id"];
									echo mysqli_fetch_array(mysqli_query($conn,"select * from student_tbl where std_id = '$s_id'"))['std_name'];
								?>
								</td>
								<td>
								<?php 
								 $file = $data_nest["assignment_name"];
								 
								 
								?>
								 <a href="../assets/assignment/<?php echo $data_nest["assignment_name"]; ?>" download >
								 <?php echo $data_nest["assignment_name"];?>
								</a>
								  
								</td>
							</tr>
						</tbody>
						<?php			
								}
						?>
						
					</table>
	<?php			
			}
	?>
	
	</div>
	<div>
	
	
	
	
	</div>
	
	
	

	
	<!-- Bootstraps -->
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Jquery library -->
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/jquery.waypoints.min.js"></script>
	
</body>
</html>