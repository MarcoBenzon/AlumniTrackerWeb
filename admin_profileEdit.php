<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$admin_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHINMA UPang Alumni Tracker | ADMIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="shortcut icon" href="images/alumni_logo.png">
	<style type="text/css">
	label{
		display:block; 
		width:x; 
		height:y; 
		text-align:left;
		padding: 2.9%;
	}
	h6{
		text-align: left;
		padding: 1.55%;
		
	}
	.close{
		 cursor: pointer;
		  position: absolute;
		  right: -120%;
		  padding: 12px 16px;
		  transform: translate(0%, -70%);
	}
	</style>
</head>
<body>
	<!-- PHP CODES FOR UPDATING USER PROFILES -->
	<?php include 'db_connect.php';
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,'alumnitracker');

	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$admin_id=$_POST['admin_id'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$fname=$_POST['fname'];
		$mname=$_POST['mname'];
		$lname=$_POST['lname'];
		$bdate=$_POST['bdate'];
		$bplace=$_POST['bplace'];
		$gender=$_POST['gender'];
		$home_address=$_POST['home_address'];
		$current_address=$_POST['current_address'];
		$civil_status=$_POST['civil_status'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];

		$query ="UPDATE admin SET admin_id = '$admin_id',
		username = '$username',
		password = '$password',
		firstname='$fname',
		middlename='$mname',
		lastname='$lname',
		birthdate='$bdate',
		birthplace='$bplace',
		gender='$gender',
		home_address='$home_address', 
		current_address='$current_address', 
		civil_status='$civil_status', 
		mobile_number='$mobile', 
		email='$email'
		
		WHERE id='$id'";

		$query_run = mysqli_query($connection,$query);

		if($query_run){
			echo "<script type='text/javascript'>alert('Changes Saved Successfully!')</script>";
		}
		else{
			echo "<script type='text/javascript'>alert('Changes Not Saved!')</script>";
		}
	}
	?>

	<!-- Header Area Start -->
	<header>
		<div class="left_area">
			<h3>UPANG <span>ALUMNI TRACKER</span></h3>
		</div>
		<div class="rigth_area">
			<a href="logout.php" class="logout_btn">Logout</a>
			<a href="#" class="logout_btn active"><span>Profile</span></a>
		</div>
	</header>
	<!-- Header Area End -->

	<!-- Sidebar Area Start -->
	<div class="sidebar">
		<content>
			<center>
				<img src="images/logo.png" class="profile_image" alt="admin">
			</center>
		</content>
		<a href="index.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
		<a href="alumni.php"><i class="fas fa-user"></i><span>Alumni</span></a>
		<a href="announcements.php"><i class="fas fa-table"></i><span>Announcements</span></a>
		<a href="events.php"><i class="fas fa-th"></i><span>Events</span></a>
		<a href="job.php"><i class="fas fa-circle"></i><span>Job Offers</span></a>
		<a href="editpages.php"><i class="fas fa-sliders-h"></i><span>Edit Pages</span></a>
		<a href="add_admin.php"><i class="fas fa-user-shield"></i><span>Admin</span></a>
		<a href="admin_profile.php"  class="active"><i class="fas fa-user-alt"></i><span>Admin Profile</span></a>
	</div>
	<!-- Sidebar Area End -->

	 
	<!-- Content Area Start -->
	<div class="content">
		<content>
			<div class="space">

				<h2>Admin's Profile</h2>

				<fieldset><br>

				<table>
					<div class="container">
					<div class="row admin-profile">
						
						<div class="col-sm-3">
							<form method="post" enctype="multipart/form-data">

							<!-- PHP CODES FOR FETCHING THE USER DATA FROM THE DATABASE TO THE FORM -->


										<div class="form-group">
											<input type="hidden" name="id" value="<?php echo $row['id'];?>">
										</div>
										
										<div class="form-group">
											<label for="admin_id">Admin ID :</label>
											
										</div>

										<div class="form-group">
											<label for="fname">First Name :</label>
											
										</div>

										<div class="form-group">
											<label for="mname">Middle Name :</label>
											
										</div>

										<div class="form-group">
											<label for="lname">Last Name :</label>
											
										</div>

										<div class="form-group">
											<label for="username">Username :</label>
											
										</div>
										<div class="form-group">
											<label for="email">Email :</label>
											
										</div>
										<div class="form-group">
											<label for="password">Password :</label>
											
										</div>

										<div class="form-group">
											<label for="home_address">Home Address :</label>
											
										</div>
										<div class="form-group">
											<label for="current_address">Current Address :</label>
											
										</div>

										<div class="form-group">
											<label for="bdate">Birthdate :</label>
										</div>

										<div class="form-group">
											<label for="bplace">Birthplace :</label>
										</div>

										<div class="form-group">
											<label for="gender">Gender :</label>
										</div>

										<div class="form-group">
											<label>Civil Status :</label>
										</div>

										<div class="form-group">
											<label for="mobile">Mobile Number :</label>
										</div>
						</div>

							<div class="col-sm-5">
							

							<!-- PHP CODES FOR FETCHING THE USER DATA FROM THE DATABASE TO THE FORM -->

							<?php
							$currentUser = $_SESSION['admin_id'];
							$sql = "SELECT * FROM admin WHERE admin_id='$currentUser'";

							$gotResults = mysqli_query($openconnection,$sql);

							if($gotResults){
								if(mysqli_num_rows($gotResults)>0){
									while ($row = mysqli_fetch_array($gotResults)) {
										// print_r($row['firstname']);
										?>
										<div class="form-group">
											<input type="hidden" name="id" value="<?php echo $row['id'];?>">
										</div>

										<div class="form-group">
											<input type="text" name="admin_id" class="form-control" readonly value="<?php echo $row['admin_id'];?>">
										</div>

										<div class="form-group">
											<input type="text" name="fname" class="form-control" value="<?php echo $row['firstname'];?>">
										</div>

										<div class="form-group">
											<input type="text" name="mname" class="form-control" value="<?php echo $row['middlename'];?>">
										</div>

										<div class="form-group">
											<input type="text" name="lname" class="form-control" value="<?php echo $row['lastname'];?>">
										</div>
										
										<div class="form-group">
											<input type="text" name="username" class="form-control" readonly value="<?php echo $row['username'];?>">
										</div>
										
										<div class="form-group">
											<input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>">
										</div>
										
										<div class="form-group">
											<input type="text" name="password" class="form-control" value="<?php echo $row['password'];?>">
										</div>
										
										<div class="form-group">	
											<input type="text" name="home_address" class="form-control" value="<?php echo $row['home_address'];?>">
										</div>
										
										<div class="form-group">
											<input type="text" name="current_address" class="form-control" value="<?php echo $row['current_address'];?>">
										</div>

										<div class="form-group">
											<input type="date" name="bdate" class="form-control" value="<?php echo $row['birthdate'];?>">
										</div>

										<div class="form-group">
											<input type="text" name="bplace" class="form-control" value="<?php echo $row['birthplace'];?>">
										</div>

										<div class="form-group">
											<select name="gender" value="<?php echo $row['gender'];?>" class="form-control">
										<?php
											$gender=array("Male","Female");
											foreach ($gender as $g){
												if($g == $row['gender'])
													echo "<option value='$g' SELECTED>$g</option>";
												else
													echo "<option value='$g'>$g</option>";
										}
										?>
									</select>
										</div>

										<div class="form-group">
											<select name="civil_status" value="<?php echo $row['civil_status'];?>" class="form-control">
												<?php
													$civstat=array("Single","Married","Divorced","Widdowed");
													foreach ($civstat as $cs){
														if($cs == $row['civil_status'])
															echo "<option value='$cs' SELECTED>$cs</option>";
														else
															echo "<option value='$cs'>$cs</option>";
												}
												?>
											</select>
										</div>

										<div class="form-group">
											<input type="number" name="mobile" class="form-control" value="<?php echo $row['mobile_number'];?>">
										</div>

										<div class="form-group">
											<input type="submit" name="update" value="Save Changes" class="btn btn-primary form-control">
										</div>
										
										
										<?php
									}
								}
							}
							?>
						</div>
						<div class="col-sm-2">
							<a href="admin_profile.php"><span class="close">x</span></a>
							
						</div>
							
							
						

							</form>
				</table>
				
	
			</div>
					
		</div>
	</section>
			</div>
		</content>
	</div>
	<!-- Content Area End -->

	<footer>
		
	</footer>
</body>
</html>

<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nesciunt, amet officia soluta, dolores dolor?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, consequuntur. -->