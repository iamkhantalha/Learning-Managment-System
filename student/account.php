<?php
	session_start();
	if(!isset($_SESSION["student_user_name"]) || !isset($_SESSION["student_user_password"])){
		header("location:login.php");
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
		 		 <link rel="stylesheet" type="text/css" href="../assets/css/sweetalert.css" >
<link rel="stylesheet" type="text/css" href="../assets/css/style.css" />

    
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
					<h4><span class="fas fa-id-card-alt icons"></span>&nbsp;&nbsp; Profile</h4>
				</div>
			</div>
			<div class="row">
			  <div class=" col-md-7">
			  <?php
					$std_email = $_SESSION['student_user_name'];
					
					$q = "select * from student_tbl where std_email = '$std_email'";
					$data_select = mysqli_query($conn,$q);
					$row = mysqli_fetch_array($data_select);
					
			  ?>
			  
				<form class="form-account" method="POST" action="account.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">Full Name:</label>
						<input type="text" class="form-control" id="full-name" value="<?php echo $row['std_name']; ?>" name="full_name" required>
					</div>
					<div class="form-group">
						<label for="dob">DOB:</label>
						<input type="date" class="form-control" id="DOB" value="<?php echo $row['std_DOB'];?>" name="DOB" required>
					</div>
					<div class="form-group">
						<label for="Contact">Contact:</label>
						<input type="number" class="form-control" id="Contact" value="<?php echo $row['std_contact'];?>" name="contact" required>
					</div>
					
					
					<div class="form-group">
						<label>Change or Upload/Picture:</label>
						<input type="file" name="file_name">
					</div>
					<div class="form-group text-right">
								
					<input type="submit" name="update" value="Change" class="btn btn-success">
					</div>
					</form>
					<?php
						if(isset($_POST['update'])){
							$stdname = $_POST['full_name'];
							$stddob = $_POST['DOB'];
							$stdcontact = $_POST['contact'];
						
							$iname = $_FILES["file_name"]["name"];
							$basename = pathinfo($iname)['filename'];
							$basename = $basename.rand();
							 $itemp_name = $_FILES["file_name"]["tmp_name"];
							$extension = strtolower(pathinfo($iname,PATHINFO_EXTENSION));
							
							if(empty($iname)){
								$q_update = "update student_tbl set std_name = '$stdname' , std_DOB='$stddob', std_contact='$stdcontact' where std_email = '$std_email'";
							
								if(mysqli_query($conn,$q_update)){
									header("location: dashboard.php");
																 }	
											}
							else{
								$studentemail = $_SESSION['student_user_name'];
								$query_get_delete = "select * from student_tbl where std_email = '$studentemail'";
								$data_select = mysqli_query($conn,$query_get_delete);
								$data_row = mysqli_fetch_array($data_select);
								
								$data_s = $data_row['std_image_name'];
								
								if($data_s==""){
									if(move_uploaded_file($itemp_name,"../assets/images/$basename")){
											$q_update = "update student_tbl set std_name = '$stdname' , std_DOB='$stddob', std_contact='$stdcontact', std_image_name = '$basename' where std_email = '$studentemail'";
												if(mysqli_query($conn,$q_update)){
													header("location: dashboard.php");
																					}
																									}
													}
								else{
									if(unlink("../assets/images/$data_s")){
										if(move_uploaded_file($itemp_name,"../assets/images/$basename")){
											$q_update = "update student_tbl set std_name = '$stdname' , std_DOB='$stddob', std_contact='$stdcontact', std_image_name = '$basename' where std_email = '$studentemail'";
												if(mysqli_query($conn,$q_update)){
														header("location: dashboard.php");
																				}
																										}
																				}
									}
								}
							
							
						}
					?>
				
			  </div>
			  <div class="col-md-offset-2 col-md-3 form_account_image">
			 
				<?php
						$image = $row['std_image_name'];
						if($image!=""){
					?>
				<img width="100%" height="300"src="../assets/images/<?php echo $row['std_image_name']; ?>">
				<?php 
						}
						else{
							?>
				<img width="100%" height="300" src="../assets/images/student.jpg">
				<?php 
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
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.js"></script>

    <!-- Jquery library -->
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/jquery.waypoints.min.js"></script>
	
	
</body>
</html>