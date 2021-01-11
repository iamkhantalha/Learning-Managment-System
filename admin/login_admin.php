<?php 
	
	require '../connection.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
	
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
	
   
</head>
<body>



<style>
	body{
		background-image: url('assets/images/management.jpg');
		background-color: #000;
		background-repeat: no-repeat;
		background-size: cover;
		
		}
	
	.panel-primary{
		margin-top: -50px;
		bacground-color: #444;
		background: transparent;
		color: #5C6765;
		
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
		color: #444;
		margin-left: 160px;
	}
	p{
		font-size: 20px;
	}
	.login_screen a{
		color: #444;
		font-size: 21px;
	}
	.login-here,.continue-index{
		color: #5C6765
		
	}
	</style>
	<div class="nav ">
	<h2 style="color: #eee;">LearnCS <sup style="font-size: 20px;">&reg;</sup> <span style="font-size: 36px;color: #70A534;">&nbsp;&nbsp;/</span>&nbsp;&nbsp; Management Page</h2>
	
	</div>





 
    <div class="container-fluid login-page">
        <div class="row">
		
			
			<div class="col-md-6 col-xm-12">
				
			</div>
			
		
            <div class="col-md-offset-1 col-md-4 login_screen">
                <div class="panel panel-primary" >
                    <div class="text-heading text-center">
                        <div class="login-here">Management Login</div>
                        <div class="continue-index">Continue to Page</div>
                    </div>
                    <div class="panel-body">
					
					<?php
						if(isset($_POST['admin_login'])){
							
							$admin_name = $_POST["admin_email"];
							$admin_password = $_POST["admin_password"];
							$q = "select * from admin_tbl where adm_email= '$admin_name' and adm_password = '$admin_password'";
							$query_admin = mysqli_query($conn,$q);
							if(mysqli_num_rows($query_admin)>0){
                                    
                                $_SESSION["ADMIN_NAME"] = $admin_name;
                                $_SESSION["ADMIN_PASSWORD"] = $admin_password;
                                        
                                        header("location: admin.php");
                                    }
                                
							else{
								echo "Wrong Email or Password!";
							}
							
							
						}
					?>
                    
                        <form method="post" action="login_admin.php">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="admin_email" class="form-control" placeholder="Email or User Name" required autofocus>
                            
							</div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="admin_password" class="form-control" id="myInput" required>
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
                                
                                
								 <div class="text-right">	
                                    <input type="submit" name="admin_login" value="Login" class="btn btn-success">
                                    
                                </div>
                                
                            
                        </form>
                    </div>
            </div>
        </div>
    </div>

    
	

    
 
</body>
</html>