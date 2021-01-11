<?php
	session_start();
	if(!isset($_SESSION["adminEmail"]) || !isset($_SESSION["sno"])){
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
                    <button type="button" style="float:left;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#learnCS-navbar-collapse-1" aria-expanded="false">
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
					<h4><span class="fas fa-book icons"></span> Courses</h4>
				</div>
				<div class="col-md-6 welcome">
					
					<h1>Courses</h1>
					<p>Choose one of the courses below.You can access courses any time</p>
				</div>
				
			</div>
		</div>
	
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				
				
					<?php
					if(isset($_POST['std_id'])){
						$std_id = $_POST['std_id'];
						$course_id = $_POST['course_id'];
						$teacher_id = $_POST['teacher_id'];
						$d = date("y-m-d");
						 $checkQ = "select * from enroll_tbl where course_id = '$course_id' and std_id = '$std_id'";
						$selec_c_q = mysqli_query($conn,$checkQ);

						if(mysqli_num_rows($selec_c_q)==0){

$sql_enroll= "INSERT INTO enroll_tbl(std_id,course_id,enroll_date,teacher_id)values('$std_id','$course_id','$d','$teacher_id')";
						if(mysqli_query($conn,$sql_enroll)){?>
									<script>
swal("Good job!", "You enroll to this!", "success")
					</script>
						
						
						<?php
						header("refresh: 2; url=dashboard.php");
						}
					
					}
					else{
						?>
									<script>
					 swal({
  title: "Sorry!",
  text: "Already you have",
  type: "warning",
 
});
					</script>
						
						
						<?php
						
					}
					}
					
					
					?>
				
				
				
				<?php
									$query_select = "select * from add_course_tbl";
									$data = mysqli_query($conn,$query_select);
							
									if(mysqli_num_rows($data)>0){
										while($row = mysqli_fetch_array($data)){
											
										?>
											<div class="courses-title-course">
								<span class="course-title-name"> <?php echo $row['add_co_name']; ?></span>
								<br><br> <span class="teacher-name"><i class="fas fa-tv"></i> <?php echo $row['add_co_total_lecture']." Lectures with"; ?></span>
								<br><br>
								<span class="teacher-name"><i class="fas fa-chalkboard-teacher"></i> <?php
								$teacher_id = $row['teacher_id'];
								echo mysqli_fetch_array(mysqli_query($conn,"select * from teacher_tbl where teacher_add_id = '$teacher_id'"))['teacher_add_name'];
								
								?> </span> 
								
								
								<form method="POST" action="courses.php">
								<input type="hidden" name="std_id" value="<?php echo $_SESSION['sno']; ?>"/>
								<input type="hidden" name="course_id" value="<?php echo $row['add_co_id']; ?>"/>
								<input type="hidden" name="teacher_id" value="<?php echo $row['teacher_id']; ?>"/>
								<div class="form-group text-right">
								<button type="submit" class="view-course enroll-course"><span >Enroll</span></button>
								</div>
								</form>
							</div>
										<?php
										
								}
							}else{
								
							}
								
						?>
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

          <!-- Jquery library -->
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/jquery.waypoints.min.js"></script>
	
	
	
</body>
</html>