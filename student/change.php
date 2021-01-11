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
					<h4><span class="fas fa-lock icons"></span>&nbsp;&nbsp; Security</h4>
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
			  
				<form class="form-account" method="POST" action="change.php" enctype="multipart/form-data">
					
					
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" value="<?php echo $row['std_email']; ?>" name="email" required>
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="myInput" value="<?php echo $row['std_password']; ?>" name="password" required>
						<input type="checkbox" onclick="checkPassword()">  Show Password
								<script>
									function checkPassword() {
										var x = document.getElementById("myInput");
										if (x.type === "password") {
											x.type = "text";
										} else {
												x.type = "password";
												}
															}
								
								</script>
					</div>
					
					
					<div class="form-group text-right">
								
					<input type="submit" name="update" value="Change" class="btn btn-success">
					</div>
					</form>
					<?php
						if(isset($_POST['update'])){
							
							$stdemail = $_POST['email'];
							$stdpassword = $_POST['password'];
							
						$validation = mysqli_query($conn,"select * from student_tbl where std_email = '$stdemail'");
							
							
							if(mysqli_num_rows($validation)>0){
								
								?>
					
					<script>
					 swal({
  title: "Sorry! <?php echo $stdemail; ?>",
  text: "One already exist",
  type: "warning",
 
});
					</script>
					<?php
								
								
								
											}
							else{
								
								$q_update = "update student_tbl set std_email='$stdemail' , std_password='$stdpassword' where std_email = '$std_email'";
							
								if(mysqli_query($conn,$q_update)){
									header("location: signout.php");
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