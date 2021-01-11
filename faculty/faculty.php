<?php
	session_start();
	if(!isset($_SESSION["teacher_user_name"]) || !isset($_SESSION["teacher_user_password"])){
		header("location:login_as_teacher.php");
		
																							}
	require '../connection.php';
	
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
                    <button type="button"  class="navbar-toggle collapsed" data-toggle="collapse" data-target="#learnCS-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
								<img src="../assets/images/apple-icon-76x766.png">            

							</a>
                  </div>

              
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="learnCS-navbar-collapse-1">
                    
					<ul class="nav navbar-nav navbar-right">
						<li><a href="faculty.php" class="nav-item">Dashboard</a></li>
						 <li><a href="upload_file.php" class="nav-item">Upload File</a></li>
						 <li><a href="upload_exam.php" class="nav-item">Exam</a></li>
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
				<div class="col-md-3 col-xs-12 title">
					<h4><span class="fas fa-user-edit icons"></span> Dashboard</h4>
				</div>
				
				<div class="col-md-4 col-xs-12 welcome">
					<h4>Welcome	</h4>
					<h1>
					<?php 
					$t_name = $_SESSION["teacher_user_name"];
					$teacher_name_query = "select * from teacher_tbl where teacher_add_email = '$t_name'";
					$teacher_name = mysqli_query($conn,$teacher_name_query);
					if(mysqli_num_rows($teacher_name)>0){
						$row_name = mysqli_fetch_array($teacher_name);
						echo $row_name['teacher_add_name'];
						$teacher_id = $row_name ['teacher_add_id'];
					
					?>
					
					</h1>
					
				</div>
				<div class="col-md-5 ">
				<h3><?php $n= $row_name['teacher_add_name']; echo strtok($n, " ");?>'s Courses</h3>
					<?php 
						$query_courses_name = "select * from add_course_tbl where teacher_id = '$teacher_id'";
						$teacher_courses_name = mysqli_query($conn,$query_courses_name);
						if(mysqli_num_rows($teacher_courses_name)>0){
							
							while($row_courses = mysqli_fetch_array($teacher_courses_name)){
					?>
					
					<a href="faculty.php?t_h_id=<?php echo $row_courses["add_co_id"]; ?>">
					<input type="submit" name="faculty-special" class="btn btn-success" value="<?php echo $row_courses['add_co_name']; ?>"> </a>
					<?php	
					
								}
							}
						} 
					?>
				</div>
				
			</div>
		</div>
		<br><br>
		
		<div class="contianer">
			<div class="row">
				<div class="col-md-3 col-sm-7 col-xs-7 faculty_image">
				<?php
					$t_i_name = $row_name['teacher_image_name'];
					if($t_i_name==""){
				?>
					<img src="../assets/images/teacher.png">
					<?php
					}
					else{
					?>
					<img src="../assets/images/<?php echo $t_i_name; ?>">
					<?php
					}
					?>
					<br><br>
					<form method="post" action="faculty.php" enctype="multipart/form-data">
					Select Image <br>
					<input type="file" name="teacher_image" /> <br>
					<div class="from-group text-right">
					<input type="submit" value="Change" name="image_submit" class="btn btn-success">
					</div>
					</form>
					
					<?php
						if(isset($_POST['image_submit'])){
							$iname = $_FILES["teacher_image"]["name"];
							$basename = pathinfo($iname)['filename'];
							$basename = $basename.rand();
							 $itemp_name = $_FILES["teacher_image"]["tmp_name"];
							$extension = strtolower(pathinfo($iname,PATHINFO_EXTENSION));
							
							
							
							
							
							$teacheremail = $_SESSION['teacher_user_name'];
								$query_get_delete = "select * from teacher_tbl where teacher_add_email = '$studentemail'";
								$data_select = mysqli_query($conn,$query_get_delete);
								$data_row = mysqli_fetch_array($data_select);
								
								$data_s = $data_row['teacher_image_name'];
								
								if($data_s==""){
									if(move_uploaded_file($itemp_name,"../assets/images/$basename")){
											$q_update = "update teacher_tbl set teacher_image_name = '$basename' where teacher_add_email = '$teacheremail'";
												if(mysqli_query($conn,$q_update)){
													header("location: faculty.php");
																					}
																									}
													}
								else{
									if(unlink("../assets/images/$data_s")){
										if(move_uploaded_file($itemp_name,"../assets/images/$basename")){
											$q_update = "update teacher_tbl set teacher_image_name = '$basename' where teacher_add_email = '$teacheremail'";
												if(mysqli_query($conn,$q_update)){
														header("location: faculty.php");
																				}
																										}
																				}
									}
							
							
							
							
							
							
							
							
						}
					
					
					
					?>
				</div>
				<div class="col-md-8">
				<?php
							$course_news_id = "";
							if(isset($_GET['t_h_id'])){
								$course_news_id = $_GET['t_h_id'];
								?>
					
					<div class="News">
						
								<?php
							
							$attend = 0;
							$q_news = "select * from add_course_tbl where add_co_id = '$course_news_id'";
							$total_lecture = mysqli_fetch_array(mysqli_query($conn,$q_news))['add_co_total_lecture'];
							
								 $total_lecture;
								$q_attend = "select * from course_content_tbl where course_add_id = '$course_news_id'";
								$data_get_attend = mysqli_query($conn,$q_attend);
								if(mysqli_num_rows($data_get_attend)>0){
									
									while($row_attend = mysqli_fetch_array($data_get_attend)){
									$row_attend['course_add_id']."<br>";
									$attend++;
								}
								$remain = ($total_lecture - $attend);
								if($remain>0){
								?>
								
								<marquee>
									<?php echo " Lectures remaining: ".$remain?>
								</marquee>
								<?php
								}
								
								
								
								
								else{
									
									
									
									$q_a_c = mysqli_query($conn,"select * from exam_tbl where course_id = '$course_news_id'");
									if(mysqli_num_rows($q_a_c)>0){
									?>
									<marquee>
									<?php echo "Congratulation! You have done your Course"?>
								</marquee>
									<?php
								}
									
									
								else{
									
								?>
								
								<marquee>
									<?php echo "Congratulation! You done your Course, now you should upload the Exam!"?>
								</marquee>
								
								<?php
								
								}
								}
								}
								else {
								?>
								<marquee>
								<?php echo "You have to Upload ".$total_lecture." Lectures"; ?>
								</marquee>
								<?php
								}?>
					</div>
					<div>
					 <a href="assignment.php?course_assignment_id=<?php echo $course_news_id; ?>">Click for assignment</a>
					</div>
					<?php } ?>
					<table class="table">
						<thead>
						<tr><th>No</th> <th>Subject</th> <th>File_Name</th> <th>File_Quiz</th> <th>Assignment</th> <th>File_Date</th> <th>File_Delete</th></tr>
						</thead>
						<?php
							if(isset($_GET['t_h_id'])){
							$course_id = $_GET['t_h_id'];
							$rNo = 1;
							$qNo = 1;
							$aNo = 1;
							$q = "select * from course_content_tbl where course_add_id = '$course_id'";
							$data = mysqli_query($conn,$q);
							if(mysqli_num_rows($data)>0){
								
								while($row = mysqli_fetch_array($data)){
									
							
						?>
						<tbody >
						
						
						<tr><td><?php echo $rNo++;?></td>
						 <td>
						<?php
							$id = $row['course_add_id'];
							$query_select_subject = "select * from add_course_tbl where add_co_id='$id'";
							
							$data_subject = mysqli_query($conn,$query_select_subject);
							
							
							if(mysqli_num_rows($data_subject)>0){
								$row_subject = mysqli_fetch_array($data_subject);
								
									 echo $row_subject['add_co_name'];
									
								
							}
							?>
						</td>
						<td><?php echo $row["course_content_title"];?></td> <td>Quiz <?php echo $qNo++ ?></td> 
						<td><?php $check = $row["course_content_assignment"]; if($check== ""){echo "None";}
						else{echo "Assignment ".$aNo++;}?></td> <td><?php echo date('M d-Y',strtotime($row['course_content_date'])); ?></td>
						<td>
						<a  href="faculty.php?delete_id=<?php echo $row['course_content_id'];?> " 
							onclick="return confirm('Are you Sure to delete this')" class="btn btn-default">
							Delete
						</a>
						</td>
						</tr>
						<?php
								}
							}
							}
						?>
							
						</tbody>
						
					</table>
					
				</div>
				
			</div>
		</div>
</section>

	<!-- delete content from faculty dashboard -->
	<?php 
		if(isset($_GET['delete_id'])){
			$del_id = $_GET['delete_id'];
			$q_del = "select course_content_video_title from course_content_tbl where course_content_id = '$del_id'";
			$data_delete = mysqli_query($conn,$q_del);
			if(mysqli_num_rows($data_delete)>0){
			$video_delete = mysqli_fetch_array($data_delete);
			$video_name =	$video_delete['course_content_video_title'];
			
			if(unlink("../assets/videos/$video_name")){
				$delete_data_row = "delete from course_content_tbl where course_content_id = '$del_id'";
				if(mysqli_query($conn,$delete_data_row)){
					header("location: faculty.php");
				}
			}
		}
		}
	
	?>
	
	<!-- Bootstraps -->
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Jquery library -->
   
	
	
</body>
</html>