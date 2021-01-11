<?php
	session_start();
	require '../connection.php';
	/**if(!isset($_SESSION["student_user_name"]) || !isset($_SESSION["student_user_password"])){
		header("location:login.php");
	}*/
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
	
	
	<section class="quiz_page">
	<div class="container quiz_o">
	
	<?php
			if(isset($_POST['question']) && isset($_GET['course_id'])){
				
				
				$question = $_POST['question'];
				$correct_answers = 0;
				$rsno = 0;
				foreach ($question as $value) {
					
				$radioname = "myradio".($rsno+1);
				$rsno++;
				
				
				$correct_ans = $_POST[$radioname];	

				$data = mysqli_query($conn,"select * from exam_tbl where exam_id='$value' and exam_right_answer='$correct_ans'");							
				if(mysqli_num_rows($data)){
					$correct_answers++;
				}
				}
				
				$std_id = $_SESSION['student_id'];
				$course_id = $_GET['course_id'];
				$correct_answers*=10;
				if($correct_answers>=50){
					?>
				<h1 class="quiz_page_title"><span class="fas fa-check-square"></span> Correct Answers.</h1>
				<?php
					
					$check_data = mysqli_query($conn,"select * from std_course_complete_tbl where course_id = '$course_id' and std_id = '$std_id'");
					
					if(mysqli_num_rows($check_data)==0){
						
					if(mysqli_query($conn,"insert into std_course_complete_tbl(course_id,std_id,std_marks) values('$course_id','$std_id','$correct_answers')")){
					
					
					
				
					?>
					<h1 style="font-weight: 700;"><?php
					echo "Congratulation! You got : <blink>".$correct_answers."</blink> out of 100 <br>";?> </h1><br>
					<?php
					
					$q_r_a = "select * from exam_tbl where course_id = '$course_id'";
					$data_c = mysqli_query($conn,$q_r_a);
					$qnoa = 1;
					while($row_d = mysqli_fetch_array($data_c)){
						
						$q_c_a = $row_d["exam_right_answer"]+2;
						
						echo "Q".$qnoa.": ".$row_d["exam_question"]."<br>"."Ans: ".$row_d[$q_c_a]."<br>";
						$qnoa++;
						echo "<br>";
					}
					?>
				<div class="text-right marge">
					
						<a  style="background-color: #ff7236;color:#fff; padding: 10px;border-radius: 5px;" href="dashboard.php">Go Home</a>
						
						</div>
						<br><br>
					<?php
				
				
					
					
					
					}
					
				}	
				else{
					
					
					
					
					
					?>
					<h1 style="font-weight: 700;"><?php
					echo "Congratulation! You got : <blink>".$correct_answers."</blink> out of 100 <br>";?> </h1><br>
					<?php
					
					$q_r_a = "select * from exam_tbl where course_id = '$course_id'";
					$data_c = mysqli_query($conn,$q_r_a);
					$qnoa = 1;
					while($row_d = mysqli_fetch_array($data_c)){
						
						$q_c_a = $row_d["exam_right_answer"]+2;
						
						echo "Q".$qnoa.": ".$row_d["exam_question"]."<br>"."Ans: ".$row_d[$q_c_a]."<br>";
						$qnoa++;
						echo "<br>";
					}
					?>
				<div class="text-right marge">
					
						<a  style="background-color: #ff7236;color:#fff; padding: 10px;border-radius: 5px;" href="dashboard.php">Go Home</a>
						
						</div>
						<br><br>
					<?php
					
					
					
					
					
					
					
				}
				
				}
				else{
					
					?>
					<script>
					 swal({
  title: "Opps You fail",
  text: "It's okay you can try Next time",
  type: "warning",
 
});
					</script>

					<?php
					header("refresh:2; url = dashboard.php");
					exit();
				}
				

				
			}
			exit();
			?>
			
			</div>
			
		<h1 class="quiz_page_title"><span class="fas fa-broom"></span> Select correct option in the following question.</h1>
		<div class="container">
		<div class="row">

					<div class="col-md-offset-1 col-md-9 quiz_o">
					
					
						<form action="exam.php?course_id=<?php echo $course_id; ?>" method="post" class="upload_file_quiz">
					 
					 
					 <?php
					 $q = "select * from exam_tbl where course_id = '$course_id'";
					 $data = mysqli_query($conn,$q);
					 $sno = 1;
					 if(mysqli_num_rows($data)>0){
						 while($row = mysqli_fetch_array($data)){
							 
						
					 
					 ?>
					
					<div class="form-group">
									
						<p><span><?php echo "Q".$sno.". "; ?></span> <?php echo $row['exam_question']; ?></p>
					<input type="hidden"name="question[]" class="form-control" value="<?php echo $row['exam_id']; ?>" >
					<input type="radio" value="1" name="myradio<?php echo $sno; ?>" required> <input  type="text" name="answer[]" disabled style="cursor:pointer;color:#888" class="form-option" value="<?php echo $row['exam_option_1']; ?>" > <br>
					<input type="radio" value="2" name="myradio<?php echo $sno; ?>" required> <input  type="text" name="answer[]" disabled style="cursor:pointer;color:#888" class="form-option"  value="<?php echo $row['exam_option_2']; ?>" > <br>
					<input type="radio" value="3" name="myradio<?php echo $sno; ?>" required> <input  type="text" name="answer[]" disabled style="cursor:pointer;color:#888" class="form-option"  value="<?php echo $row['exam_option_3']; ?>" > <br>
					<input type="radio" value="4" name="myradio<?php echo $sno; ?>" required> <input  type="text" name="answer[]" disabled style="cursor:pointer;color:#888" class="form-option"  value="<?php echo $row['exam_option_4']; ?>" > 
					</div>
					<hr>
						<?php
						$sno++; }
						 
					 }
						?>
					<div class="form-group text-right">
					<input  type="submit" value="submit" name="submit_exam">
					</div>
				</form>

			</div>
		</div>
	</div>
	
	</section>


</body>
</html>