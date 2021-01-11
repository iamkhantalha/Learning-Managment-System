<?php
	session_start();
	if(!isset($_SESSION["ADMIN_NAME"]) || !isset($_SESSION["ADMIN_PASSWORD"])){
		header("location:login_admin.php");
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
<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Raleway:500italic,600italic,
600,700,700italic,300italic,300,400,400italic,800,900' 
rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,
300,300italic,400italic,600italic,700,900' rel='stylesheet' type='text/css'>
    

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
					<h4><span class="fas fa-plus icons"></span> Add Teacher</h4>
					
				</div>
				<div class="col-md-4">
					<br><br>
					<p>First you have to create account for teacher here,then you can assign course to teacher</p>
				</div>
				
				
			</div>
		</div>
		
	</section>
	
	<section class="courses-context" >
		<div class="container">
			<div class="row">
				
				
				<!-- ======== ADD Teacher ========== -->
				<div class="col-md-8">
					
					<form method="post" action="add_teachers.php">
						<?php
							if(isset($_POST['add_teacher'])){
								$teachername = $_POST['teacher_name'];
								$teacherqualification = $_POST['teacher_qualification'];
								$teacheraddress = $_POST['teacher_address'];
								$teachercontact = $_POST['teacher_contact'];
								
								$teacheremail = $_POST['teacher_email'];
								$teacherpassword = $_POST['teacher_password'];
								/*** validation: on email*/
								$checkQ = "select * from teacher_tbl where teacher_add_email = '$teacheremail'";
								if(mysqli_num_rows(mysqli_query($conn,$checkQ))==0){
								
									$q = "insert into teacher_tbl(teacher_add_name,teacher_add_qualification,teacher_add_address,teacher_add_contact,teacher_add_email,teacher_add_password) values('$teachername','$teacherqualification','$teacheraddress','$teachercontact','$teacheremail','$teacherpassword')";
									$query_insert_teacher = mysqli_query($conn,$q);
									if($query_insert_teacher){
										header('location: teachers.php');
										?>
										<div class="alert alert-success">
											<strong>Successfully added!</strong>
										</div>
									
										<?php
										
									}
								}else{
									
									?>
										<div class="alert alert-danger">
											<strong>User with this email already exits!</strong>
										</div>
									
										<?php
									
								}
								
							}
						?>
                        <div class="form-group">
							<label>Teacher Name:</label>
                            <input type="text" class="form-control" name="teacher_name" required autofocus/>
                        </div> 
						<div class="form-group">
							<label>Qualification:</label>
						    <input type="text" class="form-control" name="teacher_qualification" required />
                        </div>
						<div class="form-group">
							<label>Address:</label>
							<input type="text" class="form-control" name="teacher_address" required />
                        </div>
						<div class="form-group">
							<label>Contact:</label>
							<input type="number" class="form-control" name="teacher_contact"  required />
						</div>
						
						<div class="form-group">
							<label>Email:</label>
							<input type="email" class="form-control" name="teacher_email" required />
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="text" class="form-control" name="teacher_password"  required />
						</div>	
							<div class="form-group text-right">
								<input type="submit" name="add_teacher" value="Add Teacher" class="btn btn-warning submit-btn 
								form_submit"/>
							</div>
							<input type="hidden" name="role" value="3">
				</form>
				</div>
				
				
			</div>
		</div>
	
	</section>
		<!-- Bootstraps -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>