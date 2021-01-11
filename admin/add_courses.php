<?php
	session_start();
	if(!isset($_SESSION["adminEmail"]) || !isset($_SESSION["userRole"])){
		header("location:login_admin.php");
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

    

<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
 
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="assets/css/animate.css" />
         <!-- fontsawseome -->
         <link href="assets/fontawsome/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />

   

    
    
</head>
<body>

<!-- Header -->
    <header class="header" id="HOME">
        <!-- Navigation from bs -->
        <nav class="navbar navbar-default navbar-fixed-top">

                <div class="container-fluid">

                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#learnCS-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
								<h4 class="admin_panel_title"><i class="fab fa-asymmetrik"></i> <span> Management/Admin-Panel</span></h4>            

							</a>
                  </div>

              
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="learnCS-navbar-collapse-1">
				  		
						
						
                    <ul class="nav navbar-nav navbar-right">
                          <li><a href="admin.php" class="nav-item">Courses</a></li>
                          <li><a href="add_courses.php" class="nav-item">Add Courses</a></li>
                          <li><div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												Teachers
												
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="teachers.php" class="active">Teachers info</a></li>
								<li><a href="add_teachers.php">Add Teacher</a></li>
								
								</ul>
								</div>
							</li>
                          <li><a href="sign_out.php" class="nav-item"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
                                
                    </ul>
                  </div><!-- /.navbar-collapse -->


                </div><!-- /.container-fluid -->
              </nav> 
        
        </div>
    </header>
	
	<section class="admin-page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-3 title">
					<h4><span class="fas fa-plus icons"></span> ADD New</h4>
				</div>
			</div>
		</div>
	</section>
	
	<section>
	
		
	
		<div class="admin">
            <div class="container">
				<div class="row">
				 <div class="col-md-8">
				 <?php
	
		if(isset($_POST['add_course_submit'])){
			$course_name = $_POST['add_course_name'];
			$course_teacher = $_POST['add_course_teacher_name'];
			$course_description = $_POST['add_course_description'];
			$course_lecture = $_POST['add_course_total_lecture'];
			$course_date = $_POST['add_course_start_date'];
			$checkQ = "select * from add_course_tbl where add_co_name = '$course_name'";
			if(mysqli_num_rows(mysqli_query($conn,$checkQ))==0){
								
			$q = "insert into add_course_tbl(add_co_name,teacher_id,add_co_description,add_co_total_lecture,add_co_date) values('$course_name','$course_teacher','$course_description','$course_lecture','$course_date')";
			
			if(mysqli_query($conn,$q)){
				header('location: admin.php');
			}
			
			}
			else{
				?>
				<script>
				
				window.alert('Sorry! ' + "<?php echo $course_name; ?>"+ 'already exist' );
				 
				
				</script>
				<?php 
			}
		}
	
	?>
                <form method="post" action="add_courses.php">
							<br>
							<label>Course Name:</label>
                            <input type="text" class="form-control" name="add_course_name" autofocus required />
							<label>Teacher:</label>
							<select name="add_course_teacher_name" class="form-control" required >
								<option value="">Select Teacher ...</option>
								<?php
							$query_select = "select * from teacher_tbl";
							$data = mysqli_query($conn,$query_select);
							
							if(mysqli_num_rows($data)>0){
								while($row = mysqli_fetch_array($data)){
									?>
									<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
									<?php
								}
							}
								
						?>
							
							</select>
							<label>Few words about course:</label>
							<input type="text" class="form-control" name="add_course_description"  required />
							<label>Total Lecture:</label>
                            <input type="number" class="form-control" name="add_course_total_lecture"  required />
							<label>Date:</label>
							<input type="date" class="form-control" name="add_course_start_date" required />
							<div class="form-group text-right">
								<input type="submit" name="add_course_submit" value="Add Course" class="btn btn-warning submit-btn 
								form_submit"/>
							</div>
                        
                       
                    
                </form>
				</div>
				</div>
            </div>
        </div>
	
	</section>
	
	
	
	
	<!-- Bootstraps -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
   

	
	
</body>
</html>