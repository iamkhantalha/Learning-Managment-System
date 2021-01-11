<?php
	session_start();
	require '../connection.php';
	if(!isset($_SESSION["student_user_name"]) || !isset($_SESSION["student_user_password"])){
		header("location:login.php");
	}
	$course_quiz_id = "";
	$course_id = "";
	if(isset($_GET['course_quiz_id'])){
		$course_quiz_id = $_GET['course_quiz_id'];	
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
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../assets/css/animate.css" />
         <!-- fontsawseome -->
         <link href="../assets/fontawsome/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>


</head>

<body>
	
	<section class="quiz_page">
	<div class="container">
	<?php
			if(isset($_POST['question']) && isset($_GET['course_id'])){
				?>
	<h1 class="quiz_page_title"><span class="fas fa-check-square"></span> Correct Answers.</h1>
		<div class="quiz_o">
			<div class="marge">
				<?php
				$question = $_POST['question'];
				$correct_answers = 0;
				$rsno = 0;
				foreach ($question as $value) {
					
				$radioname = "myradio".($rsno+1);
				$rsno++;
				
				
				$correct_ans = $_POST[$radioname];	

				$data = mysqli_query($conn,"select * from quiz_tbl where quiz_id='$value' and quiz_right_answer='$correct_ans'");							
				if(mysqli_num_rows($data)){
					$correct_answers++;
					
				}
				}
	
				$std_id = $_SESSION['student_id'];
				$course_id = $_GET['course_id'];
				
				$checkQ = "select * from lesson_complete_tbl where course_content_id = '$course_quiz_id' and student_id = '$std_id'";
				$selec_c_q = mysqli_query($conn,$checkQ);
				if(mysqli_num_rows($selec_c_q)==""){
					if($correct_answers>4){
						
					if(mysqli_query($conn,"insert into lesson_complete_tbl(student_id,course_content_id,course_id) values('$std_id','$course_quiz_id','$course_id')")){
						echo "You are passed!";
					}
					}
					else{
						echo "Sorry!Try next time, you are failled";
					}
				?>
						
						<h1 style="font-weight: 700;"><?php
					echo "You correct : <blink>".$correct_answers."</blink> out of 10 <br>";?> </h1>
				
				<?php
				$q_r_a = "select * from quiz_tbl where course_content_id = '$course_quiz_id'";
					$data_c = mysqli_query($conn,$q_r_a);
					$qnoa = 1;
					while($row_d = mysqli_fetch_array($data_c)){
						$qno = 1;
						$q_c_a = $row_d["quiz_right_answer"]+1;
						
						echo "Q".$qnoa.": ".$row_d["quiz_question"]."<br>"."Ans: ".$row_d[$q_c_a]."<br><br>";
						$qnoa++;
					}
					
					?>
					<div class="text-right">
						<a  style="background-color: #ff7236;color:#fff; padding: 10px;border-radius: 5px;" href="dashboard.php">Go Home</a>
						
						</div>
						<br><br>
					<?php
			
					exit();
				
				}
				
				else {
					$qnoa = 1;
					if($correct_answers>4){
							echo "You are passed";
					}
					else{
						echo "Sorry! Try next time, you are failled";
					}
					?>
					<h1 style="font-weight: 700;"><?php
					echo "You correct : <blink>".$correct_answers."</blink> out of 10 <br>";?> </h1>
					<?php
					
					$q_r_a = "select * from quiz_tbl where course_content_id = '$course_quiz_id'";
					$data_c = mysqli_query($conn,$q_r_a);
					while($row_d = mysqli_fetch_array($data_c)){	
						$q_c_a = $row_d["quiz_right_answer"]+1;
						echo "Q".$qnoa.": ".$row_d["quiz_question"]."<br>"."Ans: ".$row_d[$q_c_a]."<br><br>";
						$qnoa++;
					}

					?>
					<div class="text-right">
						<a  style="background-color: #ff7236;color:#fff; padding: 10px;border-radius: 5px;" href="dashboard.php">Go Home</a>
						
						</div>
						<br><br>
					<?php
					
					exit();
				}

			
			}
				
			?>
			</div>
			</div>
			</div>
	<h1 class="quiz_page_title"><span class="fas fa-broom"></span> Select correct option in the following question.</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-9 quiz_o">
			
			
			
			
				<form action="quiz.php?course_quiz_id=<?php echo $course_quiz_id?>&course_id=<?php echo $course_id; ?>" method="post" class="upload_file_quiz" name="myForm" onsubmit="return validateForm()">
					 
					 
					 <?php
					 $q = "select * from quiz_tbl where course_content_id = '$course_quiz_id'";
					 $data = mysqli_query($conn,$q);
					 $sno = 1;
					 if(mysqli_num_rows($data)>0){
						 while($row = mysqli_fetch_array($data)){
							 
						
					 
					 ?>
		
					<div class="form-group">
									
						<p><span><?php echo "Q".$sno.". "; ?></span> <?php echo $row['quiz_question']; ?></p>
					<input type="hidden"name="question[]" class="form-control" value="<?php echo $row['quiz_id']; ?>" > 
					<input type="radio" value="1" name="myradio<?php echo $sno; ?>" required> <input type="text" name="answer[]" disabled style="cursor:pointer;color:#888" class="form-option" value="<?php echo $row['quiz_option_1']; ?>" > <br>
					<input type="radio" value="2" name="myradio<?php echo $sno; ?>" required> <input type="text" name="answer[]" disabled style="cursor:pointer;color:#888" class="form-option"  value="<?php echo $row['quiz_option_2']; ?>" > <br>
					<input type="radio" value="3" name="myradio<?php echo $sno; ?>" required> <input type="text" name="answer[]" disabled style="cursor:pointer;color:#888" class="form-option"  value="<?php echo $row['quiz_option_3']; ?>" > <br>
					<input type="radio" value="4" name="myradio<?php echo $sno; ?>" required> <input  type="text" name="answer[]" disabled style="cursor:pointer;color:#888" class="form-option"  value="<?php echo $row['quiz_option_4']; ?>" > 
					</div>
					 <hr>
						<?php
						$sno++; }
						 
					 }
						?>
					<input type="submit" value="submit" name="submit_quiz">
					
				</form>
			</div>
		</div>
		
	</div>
	</section>

<!-- Bootstraps -->
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/sweetalert.min.js"></script>



</body>
</html>