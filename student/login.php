<?php
	session_start();
	require '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
	
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-16x16.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../admin/assets/css/style.css" />
	
    
   
</head>
<body>

	<style>
	body{
		background-image: url('../assets/images/background.jpg');
		background-color: #000;
		
		
	}
	.panel-primary{
		margin-top: -15px;
		background-color: #444;
		background: transparent;
		color: white;
		
	}
	.nav{
		background-color: #334340;
		padding: 10px;
		opacity: .7;
		border-bottom: 1px solid #bbb;	
	}
	.nav h2{
		margin-left: 50px;
		
	}
	h1{
		font-weight: 700;
		color: #fff;
		margin-left: 160px;
	}
	p{
		font-size: 20px;
	}
	
	
	</style>
	<div class="nav ">
	<h2 style="color: #eee;">LearnCS <sup style="font-size: 20px;">&reg;</sup> <span style="font-size: 36px;color: #70A534;">&nbsp;&nbsp;/</span>&nbsp;&nbsp; Sign In</h2>
	
	</div>
	
    <div class="container-fluid login-page">
        <div class="row">
			<div class="col-md-6 col-xm-12">
				<h1 class="center">Start Learning Today</h1><br>
				<p class="col-md-offset-3 text-left">
				LearnCS is a new way of learning Computer online. It provides Structured 
				Computer Learning in an intuitive manner where you learn at your own place in your own 
				time in a place that suits you.
				</p>
			</div>
            <div class="col-md-offset-1 col-md-4 login_screen">
                <div class="panel panel-primary" >
                    <div class="text-heading text-center">
                        <div class="login-here">Student Login</div>
                        <div class="continue-index">Continue to Profile</div>
                    </div>
                    <div class="panel-body">
						 <?php
						if(isset($_POST['student_login'])){
							$useremail = $_POST['user_email'];
							$userpassword = $_POST['user_password'];
							
							$q = "select * from student_tbl where std_email = '$useremail' and std_password = '$userpassword'";
	
							$q_data = mysqli_query($conn,$q);
							if(mysqli_num_rows($q_data)>0){
								$row = mysqli_fetch_array($q_data);
								
					
								$_SESSION['student_id'] = $row['std_id'];
								$_SESSION['student_user_name'] = $useremail;
								$_SESSION['student_user_password'] = $userpassword;
								header('location: dashboard.php');
							}
						}
					
					?>
						
                        <form action="login.php" method="post" >
							<div class="form-group">
                                <label>Email</label>
                                <input type="text" name="user_email" class="form-control" placeholder="Email or User Name" required autofocus>
                            </div>
							
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="user_password" class="form-control" id="myInput" required>
								<input type="checkbox" onclick="checkPassword()">Show Password
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
                            <div class="form-group form-footer">
                                
                                
								 <div class="text-left">
									
									<a href="../faculty/login_as_teacher.php" target="blank">Login as Teacher</a>
                                    <input type="submit" name="student_login" value="Login" class="btn btn-primary">
                                    
                                </div>
                                
                            
                        </form>
                    </div>
            </div>
        </div>
    </div>

    
</div>
</div>
    
 
</body>
</html>