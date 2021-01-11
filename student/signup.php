<?php 
	require '../connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-16x16.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
			 <link rel="stylesheet" type="text/css" href="../assets/css/sweetalert.css" >
    <link rel="stylesheet" href="../assets/css/style.css">
   
   <!-- bootstrap -->
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/sweetalert.min.js"></script>
   
</head>
<body>
 
  

    
	<div class="container ">
	<div class="row sign-up">
	<div class="col-md-offset-2 col-md-8">
	
	<h1 class="text-center">Sign Up page</h1>
	<hr>
	
	 <?php
	   
			if(isset($_POST["user_submit_btn"])){
				
				$std_info_name =$_POST["user_ac_name"];
				$std_info_email =$_POST["user_ac_email"];
				$std_info_pass =$_POST["user_ac_password"];
				$std_info_contact =$_POST["user_ac_contact"];
		        $role = $_POST['role']; 

				$check = "select * from admin_tbl where adm_email='$std_info_email'";
				$data_get = mysqli_query($conn,$check);
				
				if(mysqli_num_rows($data_get)>0){
					
					?>
					
					<script>
					 swal({
  title: "Sorry! Change your email",
  text: "<?php echo $std_info_email; ?> , already exist",
  type: "warning",
 
});
					</script>
					<?php
				}
				else{

			  $sql_admintbl ="INSERT INTO admin_tbl(adm_email,adm_password,role)VALUES('$std_info_email','$std_info_pass','$role')";
			  $result= mysqli_query($conn,$sql_admintbl);
			  $my_id = mysqli_insert_id($conn);

				$q = "INSERT into student_tbl(std_name,std_DOB,std_contact,std_image_name,admin_tbl_pkey)values('$std_info_name','','$std_info_contact','','$my_id')";
				
				$std_insert_info_query = mysqli_query($conn,$q);
				if($std_insert_info_query){
					?>
					<script>
					swal({
  title: "Congratulation!",
  text: "Successfully Registered",
  icon: "success",
});
					</script>
					<?php
					header("refresh:2;url= ../index.php");
				}
				}
				
				
			}
			
	   ?>

		<br><br>
          <!-- <form method="post" action="signup.php">
				<div class="form-group">
					<label>Full Name:</label>
					<input type="text" name="user_ac_name" class="form-control" autofocus required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="user_ac_email" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="user_ac_password" id="myInput" class="form-control psw" required>
					<input type="checkbox" onclick="checkPassword()"> 
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
                <div class="form-group">
					<label>Contact No</label>
					<input type="text" name="user_ac_contact" class="form-control" required>
                </div>
                <div class="form-group">
					<label>Date of Birth</label>
					<input type="text" name="user_ac_dob" class="form-control" placeholder="1 dec 2019" required>
                </div>
       
				<div class="text-right form-btn">
					<input  type="submit" class="btn btn-danger" name="user_submit_btn" value="Register" >
				</div>
		  </form> -->
       <br><br>
	   </div>
	   </div>
	   </div>
	   
	   
	  
	
	 <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
    
 
</body>
</html>