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
					<h4><span class="fas fa-user-graduate icons"></span> Our Staff</h4>
				</div>
				
			</div>
		</div>
		
	</section>
	
	<section class="courses-context" >
		<div class="container">
			<div class="row">
				<?php
				if(isset($_GET['update_id'])){
					$updateid = $_GET['update_id'];
					$update_query = "select * from teacher_tbl where teacher_add_id = '$updateid'";
					$update_data = mysqli_query($conn,$update_query);
					if(mysqli_num_rows($update_data)>0){
						$update_row = mysqli_fetch_array($update_data);
						
			?>
				<div class="col-md-offset-2 col-md-8">
					<form method="post" action="teachers.php">
						 <div class="form-group">
                            <input type="text" class="form-control" name="update_teacher_name" 
							value="<?php echo $update_row['teacher_add_name']; ?>" required />
                        </div> 
						<div class="form-group">
						    <input type="text" class="form-control" name="update_teacher_qualification" 
							value="<?php echo $update_row['teacher_add_qualification']; ?>"  required />
                        </div>
						<div class="form-group">
							<input type="text" class="form-control" name="update_teacher_address"  
							value="<?php echo $update_row['teacher_add_address']; ?>" required />
                        </div>
						<div class="form-group">
							<input type="number" class="form-control" name="update_teacher_contact"   
							value="<?php echo $update_row['teacher_add_contact']; ?>" required />
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="update_teacher_email" 
							value="<?php echo $update_row['teacher_add_email']; ?>" required />
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="update_teacher_password"
							value="<?php echo $update_row['teacher_add_password']; ?>" required />
						</div>	
						<div class="form-group text-right">
								<input type="hidden" name="update_teacher_id" value="<?php echo $update_row["teacher_add_id"]; ?>">
								<input type="submit" name="update_teacher" value="Update" class="btn btn-warning submit-btn 
								form_submit"/>
						</div>
						
					</form>
				</div>
			<?php
					}
				}
				
				if(isset($_POST['update_teacher'])){
					
					
					$updateid = $_POST['update_teacher_id'];
					
					$updatename = $_POST['update_teacher_name'];
					
					$updatequalification = $_POST['update_teacher_qualification'];
					$updateaddress = $_POST['update_teacher_address'];
					$updatecontact = $_POST['update_teacher_contact'];
					
					$updateemail = $_POST['update_teacher_email'];
					$updatepassword = $_POST['update_teacher_password'];
					
					$update_data = "update teacher_tbl SET teacher_add_name = '$updatename',teacher_add_qualification='$updatequalification',teacher_add_address = '$updateaddress',teacher_add_contact = $updatecontact,teacher_add_email = '$updateemail',teacher_add_password = '$updatepassword' where teacher_add_id = '$updateid' ";
					if(mysqli_query($conn,$update_data)){
						header('location: teachers.php');
					}
					
				

				}
				
			?>
				
				<div class="col-md-12">
					<table class="table">
						<thead>
						<tr><th>No</th> <th>Name</th> <th>Qualification</th> <th>Address</th> <th>Contact No</th>   <th>Email/User-Id	</th><th>Password</th> <th>Edit</th> </tr>
						</thead>
						
						<tbody>
						<?php
							$No = 1;
							$query_select = "select * from teacher_tbl ORDER BY teacher_add_name ";
							$data = mysqli_query($conn,$query_select);
							
							if(mysqli_num_rows($data)>0){
								while($row = mysqli_fetch_array($data)){
								
						?>
						
						<tr><td><?php echo $No++; ?></td><td><?php echo $row['teacher_add_name']; ?></td> <td><?php echo $row['teacher_add_qualification']; ?></td> <td><?php echo $row['teacher_add_address']; ?></td><td><?php echo $row['teacher_add_contact']; ?></td> <td><?php echo $row['teacher_add_email']; ?></td> <td><?php echo $row['teacher_add_password']; ?></td> 
						
						<td>
						<a href="teachers.php?update_id=<?php echo $row["teacher_add_id"]; ?>"><button class="btn btn-default">Edit</button></a>
						</td> </tr>
						<?php
																		}
							}
						?>
						
				
						</tbody>
					</table>
				</div>
				
				
			</div>
		</div>
	
	</section>
	
		<!-- ===== delete teacher data ======-->
		
		<?php 
			if(isset($_GET["del_id"])){
				$delete_id = $_GET["del_id"];
				$del_query = "delete from teacher_tbl where teacher_add_id ='$delete_id'";
				if(mysqli_query($conn,$del_query)){
					
                        header('refresh: 2; url= "teachers.php"');
                    }
			}
			
		?>
		
		<!-- Bootstraps -->
		
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>