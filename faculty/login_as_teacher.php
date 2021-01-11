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
    <title>Login-Teacher</title>
	
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-16x16.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	<link href="assets/fontawsome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/assets/css/style.css">
   
</head>
<body>
 
 	<style>
	body{
		background-image: url('../assets/images/faculty.jpg');
		background-color: #000;
		background-repeat: no-repeat;
		background-size: cover;
		
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
	.login_screen a{
		color: #fff;
		font-size: 21px;
	}
	
	</style>
	<div class="nav ">
	<h2 style="color: #eee;">LearnCS <sup style="font-size: 20px;">&reg;</sup> <span style="font-size: 36px;color: #70A534;">&nbsp;&nbsp;/</span>&nbsp;&nbsp; Sign In</h2>
	
	</div>
 
 
 
 
 
 
 
 
 
 
 
 
    <div class="container-fluid login-page">
        <div class="row">	
			
			
			
			<div class="col-md-6 col-xm-12">
				<h1 class="center">Start Teaching  Today</h1><br>
				<p class="col-md-offset-3 text-left">
				It is a platform where you can use your skills. This institute is for those who is not 
				able to attend University/College classes. Here a teacher improve thier skills in another
				dimension of manner.
				</p>
			</div>
			
			
			
            <div class="col-md-offset-1 col-md-4 login_screen">
			
                <div class="panel panel-primary" >
                    <div class="text-heading text-center">
                        <div class="login-here">Facutly Login</div>
                        <div class="continue-index">Continue to Profile</div>
                    </div>
                    <div class="panel-body">
                    <?php
						if(isset($_POST['login_teacher'])){
							$useremail = $_POST['user_email'];
							$userpassword = $_POST['user_password'];
							
							$q = "select * from teacher_tbl where teacher_add_email = '$useremail' and teacher_add_password = '$userpassword'";
	
							$q_data = mysqli_query($conn,$q);
							if(mysqli_num_rows($q_data)>0){
								$row = mysqli_fetch_array($q_data);
								
								$id = $row['teacher_add_id'];
							
								
								
								$_SESSION['teacher_id'] = $row['teacher_add_id'];
								$_SESSION['teacher_user_name'] = $useremail;
								$_SESSION['teacher_user_password'] = $userpassword;
								header('location: faculty.php');
							}
						}
					
					?>
                        <form method="post"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="user_email" class="form-control" placeholder="Email or User Name" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="user_password" id="myInput" class="form-control" required>
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
									<a href="../index.php">Home Page</a>
                                    <input type="submit" name="login_teacher" value="Login" class="btn btn-primary">
                                </div>
                                
                            </div>
							
                        </form>
                    
            </div>
        </div>
    </div>
    
	

 
</body>
</html>