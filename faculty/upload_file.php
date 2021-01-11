<?php
	session_start();
	if(!isset($_SESSION["teacher_user_name"]) || !isset($_SESSION["teacher_user_password"])){
		header("location:login_as_teacher.php");
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
				<div class="col-md-3 title">
					<h4><span class="fas fa-upload icons"></span> Upload File</h4>
				</div>
				<div class="col-md-6 welcome">
					<h4>Fill form for quiz and choose video</h4>
				</div>
				
			</div>
			<div class="row">
			<form action="upload_file.php" class="upload_file_quiz" method="post" enctype="multipart/form-data">
				<div class="col-md-4 upfile">
					<p>Select Video or File</p>
					<input type="file" name="file_video" id="myFile"  required />
					<hr>
					<p>Write Assignment if need</p>
					<textarea name="assignment_des" class="form-control" rows="8" col="100" ></textarea>
				</div>
				<div class="col-md-7 form_quiz_input">
		
					<?php
						if(isset($_POST['submit_quiz'])){
							$fname = $_POST['File_Name'];
							$course_id = $_POST['course_id'];
							
							$question = $_POST['question'];
							$answer = $_POST['answer'];

							
							
							$assignment = $_POST['assignment_des'];
							
							$vname = $_FILES["file_video"]["name"];
							$basename = pathinfo($vname)['filename'];
							$basename = $basename.rand();
							 $vtemp_name = $_FILES["file_video"]["tmp_name"];
							$extension = strtolower(pathinfo($vname,PATHINFO_EXTENSION));
							
							if($extension !="mkv" && $extension !="mp4"  && $extension !="avi" && $extension !="ogg" && $extension !="webm" && $extension !="hdv"){
               ?>
               <script>
                   alert("you did not choose video because only video are important in choose part");
               </script>
						<?php	
						}
						
						else{
							
							$basename = $basename.".".$extension;
							if(move_uploaded_file($vtemp_name,"../assets/videos/$basename")){
								$contentdate = date("m/d/Y");
								if(mysqli_query($conn,"insert into course_content_tbl(course_add_id,course_content_title,course_content_video_title,
								course_content_assignment,course_content_date)values('$course_id','$fname','$basename','$assignment','$contentdate')")){
										
										$c_c_id = "";
										
										
										$query_select = "select * from course_content_tbl order by course_content_id DESC limit 1";
							$data = mysqli_query($conn,$query_select);
							
							if(mysqli_num_rows($data)>0){
								$row = mysqli_fetch_array($data);
								$c_c_id = $row[0];
								
							}
										
										$sno = 0;
										$rsno = 0;
										foreach ($question as $value) {
											
											for($i = $sno; $i<count($answer); $i++){
												$ans1 = $answer[$i];
												$ans2 = $answer[$i+1];
												$ans3 = $answer[$i+2];
												$ans4 = $answer[$i+3];
												
												$radioname = "myradio".($rsno+1);
												$rsno++;
												$correct_ans = $_POST[$radioname];
												
											mysqli_query($conn,"insert into quiz_tbl(quiz_question,quiz_option_1,quiz_option_2,quiz_option_3,quiz_option_4,quiz_right_answer,course_content_id)values('$value','$ans1','$ans2','$ans3','$ans4','$correct_ans','$c_c_id')");
											
											$sno += 4; 
													break;
											
											}
										}
										
									}
                }
						}
						
						}
						
					?>
					
					<select name="course_id" class="form-control" required>
								<option value="" >Select Course ...</option>
								<?php
								$t_id = $_SESSION['teacher_id'];
							$query_select = "select * from add_course_tbl where teacher_id = '$t_id'";
							$data = mysqli_query($conn,$query_select);
							
							if(mysqli_num_rows($data)>0){
								

								
								while($row = mysqli_fetch_array($data)){
									
									$course_add_id = $row['add_co_id'];
									$course_add_name = $row['add_co_name'];
									
									$q_check_lecture = mysqli_fetch_array(mysqli_query($conn,"select * from add_course_tbl where add_co_id = '$course_add_id'"))["add_co_total_lecture"];
									$check_complete = 0;
									$q_check_lesson = mysqli_query($conn,"select * from course_content_tbl where course_add_id = '$course_add_id'");
									if(mysqli_num_rows($q_check_lesson)>0){
										while($row_data = mysqli_fetch_array($q_check_lesson)){
											$check_complete++;
										}
									}
									
									
									if($q_check_lecture != $check_complete){
									?>
									<option value="<?php echo $course_add_id; ?>" ><?php echo $course_add_name; ?></option>
									<?php
									}
								}
							}
								
						?>
								
							</select>
							
					
					<input placeholder="File Name" type="text" class="form-control" name="File_Name" autofocus required>
					<hr>
									<input placeholder="Question 1" type="text" class="form-control" name="question[]" required>		
					<input placeholder="Question 1_Option 1" type="text" name="answer[]" class="form-option" required> <input type="radio" value="1" name="myradio1" required>
					<input placeholder="Question 1_Option 2" type="text" name="answer[]" class="form-option" required> <input type="radio" value="2" name="myradio1" required>
					<input placeholder="Question 1_Option 3" type="text" name="answer[]" class="form-option" required> <input type="radio" value="3" name="myradio1" required>
					<input placeholder="Question 1_Option 4" type="text" name="answer[]" class="form-option" required> <input type="radio" value="4" name="myradio1" required>
					<hr>
									<input placeholder="Question 2" type="text" name="question[]" class="form-control" required>
					<input placeholder="Question 2_Option 1" type="text" name="answer[]" class="form-option" required> <input type="radio" value="1" name="myradio2" required>
					<input placeholder="Question 2_Option 2" type="text" name="answer[]" class="form-option" required> <input type="radio" value="2" name="myradio2" required>
					<input placeholder="Question 2_Option 3" type="text" name="answer[]" class="form-option" required> <input type="radio" value="3" name="myradio2" required>
					<input placeholder="Question 2_Option 4" type="text" name="answer[]" class="form-option" required> <input type="radio" value="4" name="myradio2" required>
					<hr>
									<input placeholder="Question 3" type="text" name="question[]" class="form-control" required>
					<input placeholder="Question 3_Option 1" type="text" name="answer[]" class="form-option" required> <input type="radio" value="1" name="myradio3" required>
					<input placeholder="Question 3_Option 2" type="text" name="answer[]" class="form-option" required> <input type="radio" value="2" name="myradio3" required>
					<input placeholder="Question 3_Option 3" type="text" name="answer[]" class="form-option" required> <input type="radio" value="3" name="myradio3" required>
					<input placeholder="Question 3_Option 4" type="text" name="answer[]" class="form-option" required> <input type="radio" value="4" name="myradio3" required>
					<hr>
									<input placeholder="Question 4" type="text" name="question[]" class="form-control" required>
					<input placeholder="Question 4_Option 1" type="text" name="answer[]" class="form-option" required> <input type="radio" value="1" name="myradio4" required>
					<input placeholder="Question 4_Option 2" type="text" name="answer[]" class="form-option" required> <input type="radio" value="2" name="myradio4" required>
					<input placeholder="Question 4_Option 3" type="text" name="answer[]" class="form-option" required> <input type="radio" value="3" name="myradio4" required>
					<input placeholder="Question 4_Option 4" type="text" name="answer[]" class="form-option" required> <input type="radio" value="4" name="myradio4" required>
					<hr>
									<input placeholder="Question 5" type="text" name="question[]" class="form-control" required>
					<input placeholder="Question 5_Option 1" type="text" name="answer[]" class="form-option" required> <input type="radio" value="1" name="myradio5" required>
					<input placeholder="Question 5_Option 2" type="text" name="answer[]" class="form-option" required> <input type="radio" value="2" name="myradio5" required>
					<input placeholder="Question 5_Option 3" type="text" name="answer[]" class="form-option" required> <input type="radio" value="3" name="myradio5" required>
					<input placeholder="Question 5_Option 4" type="text" name="answer[]" class="form-option" required> <input type="radio" value="4" name="myradio5" required>
					<hr>
									<input placeholder="Question 6" type="text" name="question[]" class="form-control" required>
					<input placeholder="Question 6_Option 1" type="text" name="answer[]" class="form-option" required> <input type="radio" value="1" name="myradio6" required> 
					<input placeholder="Question 6_Option 2" type="text" name="answer[]" class="form-option" required> <input type="radio" value="2" name="myradio6" required>
					<input placeholder="Question 6_Option 3" type="text" name="answer[]" class="form-option" required> <input type="radio" value="3" name="myradio6" required>
					<input placeholder="Question 6_Option 4" type="text" name="answer[]" class="form-option" required> <input type="radio" value="4" name="myradio6" required>
					<hr>
									<input placeholder="Question 7" type="text" name="question[]" class="form-control" required>
					<input placeholder="Question 7_Option 1" type="text" name="answer[]" class="form-option" required> <input type="radio" value="1" name="myradio7" required>
					<input placeholder="Question 7_Option 2" type="text" name="answer[]" class="form-option" required> <input type="radio" value="2" name="myradio7" required>
					<input placeholder="Question 7_Option 3" type="text" name="answer[]" class="form-option" required> <input type="radio" value="3" name="myradio7" required>
					<input placeholder="Question 7_Option 4" type="text" name="answer[]" class="form-option" required> <input type="radio" value="4" name="myradio7" required>
					<hr>				
					
									<input placeholder="Question 8" type="text" name="question[]" class="form-control" required>
					<input placeholder="Question 8_Option 1" type="text" name="answer[]" class="form-option" required> <input type="radio" value="1" name="myradio8" required>
					<input placeholder="Question 8_Option 2" type="text" name="answer[]" class="form-option" required> <input type="radio" value="2" name="myradio8" required>
					<input placeholder="Question 8_Option 3" type="text" name="answer[]" class="form-option" required> <input type="radio" value="3" name="myradio8" required>
					<input placeholder="Question 8_Option 4" type="text" name="answer[]" class="form-option" required> <input type="radio" value="4" name="myradio8" required>
					<hr>
									<input placeholder="Question 9" type="text" name="question[]" class="form-control" required>
					<input placeholder="Question 9_Option 1" type="text" name="answer[]" class="form-option" required> <input type="radio" value="1" name="myradio9" required>
					<input placeholder="Question 9_Option 2" type="text" name="answer[]" class="form-option" required> <input type="radio" value="2" name="myradio9" required>
					<input placeholder="Question 9_Option 3" type="text" name="answer[]" class="form-option" required> <input type="radio" value="3" name="myradio9" required>
					<input placeholder="Question 9_Option 4" type="text" name="answer[]" class="form-option" required> <input type="radio" value="4" name="myradio9" required>
					<hr>
									<input placeholder="Question 10" type="text" name="question[]" class="form-control" required>
					<input placeholder="Question 10_Option 1" type="text" name="answer[]" class="form-option" required> <input type="radio" value="1" name="myradio10" required>
					<input placeholder="Question 10_Option 2" type="text" name="answer[]" class="form-option" required> <input type="radio" value="2" name="myradio10" required>
					<input placeholder="Question 10_Option 3" type="text" name="answer[]" class="form-option" required> <input type="radio" value="3" name="myradio10" required>
					<input placeholder="Question 10_Option 4" type="text" name="answer[]" class="form-option" required> <input type="radio" value="4" name="myradio10" required>
					
					<div class="form-group text-right">
					<input class="btn btn-success" type="submit" name="submit_quiz" value="Upload">
					</div>
				</div>
				
			</form>
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