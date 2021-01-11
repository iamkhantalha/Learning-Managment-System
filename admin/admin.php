<?php
	session_start();
	//echo $_SESSION["adminEmail"];
	//die;
	if(!isset($_SESSION["adminEmail"]) || !isset($_SESSION["userRole"])){
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
                    <button type="button"  class="navbar-toggle collapsed" data-toggle="collapse" data-target="#learnCS-navbar-collapse-1" aria-expanded="false">
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
					<h4><span class="fab fa-centercode icons"></span> Courses</h4>
				</div>
			</div>
		</div>
	</section>
	
	<section class="courses-context">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-1 col-md-10" style="margin-top: 20px">
					<table class="table table-bordered">
						<thead>
						<tr><th>No</th> <th>Course Name</th> <th>Course Total Lecures</th> <th>Course Teacher</th> <th>Course Lectures Remaining</th> <th>Students</th>  <th>Course Start Date</th></tr>
						</thead>
						
						<tbody>
						<?php
							$No = 1;
							$query_select = "select * from add_course_tbl";
							
							$data = mysqli_query($conn,$query_select);
							
							
							if(mysqli_num_rows($data)>0){
								while($row = mysqli_fetch_array($data)){
								
						?>
						<tr>
							<td><?php echo $No++; ?></td>
							<td><?php echo $row[1]; ?></td>
							<td><?php echo $nested = $row['add_co_total_lecture']; ?></td>
							<?php
							$t = $row['teacher_id'];
							$query_select_teacher = "select * from teacher_tbl where teacher_add_id='$t'";
							
							$data_teacher = mysqli_query($conn,$query_select_teacher);
							
							
							if(mysqli_num_rows($data_teacher)>0){
								while($row_teacher = mysqli_fetch_array($data_teacher)){
									?>
									<td><?php echo $row_teacher['teacher_add_name']; ?></td>
									<?php
								}
							}
							?>
							
							<td>
							<?php
							 $c_id = $row["add_co_id"];
							$q_check_lec = mysqli_query($conn,"select * from course_content_tbl where course_add_id = '$c_id'");
								
							if(mysqli_num_rows($q_check_lec)>0){
									$total = 0;
									while($data_get = mysqli_fetch_array($q_check_lec)){
										$total++;
									}
									$value = $nested - $total;
									if($value > 0){
										echo $value;
									}
									else{
										echo "Complete";
									}
								}
								else{
									echo $nested;
								}
							?>
							</td>
							<td>
							<?php 
								 $c_std_id = $row['add_co_id'];
								$q_student= "select * from enroll_tbl where course_id = '$c_std_id'";
								$data_get_student = mysqli_query($conn,$q_student);
								if(mysqli_num_rows($data_get_student)>0){
									$std_no = 0;
									while($data_std = mysqli_fetch_array($data_get_student)){
										$std_no++;
									}
									echo $std_no;
								}
								else{
									echo 0;
								}
							?>
							</td>
							<td><?php 
									$date_format=$row['add_co_date'];
								echo	date('M d-Y',strtotime($date_format));
							 ?></td>
							
						</tr>
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
	
	
	<!-- Bootstraps -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
   
	
	
</body>
</html>