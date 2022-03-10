<?php 

	$openconnection=mysqli_connect("localhost","root","","alumnitracker");
session_start();

	include("connection.php");
	include ('admin_server.php');
	include("functions.php");
	include("timer.php");
	$admin_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHINMA UPang Alumni Tracker | ADMIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/alumni_logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- PHP CODES FOR UPDATE MODAL -->
	<?php include 'db_connect.php'; include 'add_adminmodal.php';
	if (isset($_POST['update'])){
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
		$civil_status=$_POST['civil_status'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		

		$query = "UPDATE admin SET admin_id='$admin_id', 
		username='$username', 
		password='$password',
		firstname='$fname', 
		middlename='$mname', 
		lastname='$lname', 
		birthdate='$bdate', 
		birthplace='$bplace', 
		gender='$gender', 
		home_address='$home_address', 
		civil_status='$civil_status', 
		mobile_number='$mobile', 
		email='$email' WHERE id='$id'";

		$query_run = mysqli_query($openconnection,$query);
		
		if ($query_run) {
			echo "<script type='text/javascript'>alert('Updated Successfully!')</script>";
		}
		else{
			echo "<script type='text/javascript'>alert('Updates Not Saved!')</script>";
		}
		// header("location: alumni.php");
	}

	?>

	<!-- Header Area Start -->
	<header>
		<div class="left_area">
			<h3>UPANG <span>ALUMNI TRACKER</span></h3>
		</div>
		<div class="rigth_area">
			<a href="logout.php" class="logout_btn">Logout</a>
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
		<a href="alumni.php"><i class="fas fa-cogs"></i><span>Alumni</span></a>
		<a href="announcements.php"><i class="fas fa-table"></i><span>Announcements</span></a>
		<a href="events.php"><i class="fas fa-th"></i><span>Events</span></a>
		<a href="job.php"><i class="fas fa-circle"></i><span>Job Offers</span></a>
		<a href="company.php"><i class="fas fa-sliders-h"></i><span>Company Page</span></a>
		<a href="add_admin.php"  class="active"><i class="fas fa-user-shield"></i><span>Admin</span></a>
		<a href="admin_profile.php"><i class="fas fa-user-alt"></i><span>Admin Profile</span></a>
	</div>
	<!-- Sidebar Area End -->

	<!-- Content Area Start -->
	<div class="content">
		<content>
			<div class="space">
				<h2>Admin
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_adminmodal">Add</button>
				</h2>
				<fieldset><br>
				<table>
					<tr>
						<th width="140px">Admin ID</th>
						<th width="250px">Username</th>
						<th width="120px">Password</th>
						
					</tr>
				</table>
				<?php
				$view_query=mysqli_query($openconnection,"SELECT * FROM admin");
					while ($row=mysqli_fetch_assoc($view_query)) {
				?>
				<hr>
				<table>
					<tr class="admin">
						<td width="140px"><?php echo $row['admin_id'];?></td>
						<td width="260px"><?php echo $row['username'];?></td>
						<td width="200px"><?php echo $row['password'];?></td>
						<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#view<?php echo $row['id'];?>">View</button></td>
						<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $row['id'];?>">Edit</button></td>
					</tr>
				</table>
				<?php }?>
			</fieldset>
			</div>
		</content>
	</div>
	<!-- Content Area End -->

	<footer>
		
	</footer>

<!-- THE MODAL FOR INSERTING-->
	<div class="modal fade" role="dialog" id="add_adminmodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Add New Admin</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			
				<!--MODAL BODY-->
				<div class="modal-body">
					<form method="post" action="admin_server.php">
						<div class="form-group">
							<label for="admin_id">Admin ID <span>*</span></label>
							<input type="text" name="admin_id" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="password">Password <span>*</span></label>
							<input type="password" name="password" class="form-control" required>
						</div>

					<!-- 	<div class="form-group" hidden="">
							<textarea name="date">
								<script>
									let today = new Date().toISOString().slice(0, 10)

									console.log(today)
								</script>

							</textarea>
						</div> -->
						




						<div class="form-group">
							<label for="fname">Firstname <span>*</span></label>
							<input type="text" name="fname" class="form-control" >
						</div>
						<div class="form-group">
							<label for="mname">Middlename <span>*</span></label>
							<input type="text" name="mname" class="form-control" >
						</div>
						<div class="form-group">
							<label for="lname">Lastname <span>*</span></label>
							<input type="text" name="lname" class="form-control" >
						</div>
						
						<div class="form-group">
							<input type="submit" name="send" value="Add to Admin" class="btn btn-primary form-control">
						</div>
					</form>
				</div>
				<!--MODAL BODY-->
				<!--MODAL FOOTER-->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
				<!--MODAL FOOTER-->
			</div>
		</div>
	</div>
<!-- END OF INSERT MODAL -->

<!-- THE MODAL FOR VIEWING-->
	<?php
		$view_query=mysqli_query($openconnection,"SELECT * FROM admin");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="view<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Admin</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			
				<!--MODAL BODY-->
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<input type="texdt" name="id" value="<?php echo $row['id'];?>">
						</div>
						<div class="form-group">
							<label for="admin_id">Admin ID</label>
							<input type="text" name="admin_id" class="form-control" value="<?php echo $row['admin_id'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="text" name="password" class="form-control" value="<?php echo $row['password'];?>" readonly>
						</div>
				
						<div class="form-group">
							<label for="fname">Full Name</label>
							<input type="text" name="fname" class="form-control" value="<?php echo $row['lastname'],", ",$row['firstname']," ",$row['middlename'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="bdate">Birthdate</label>
							<input type="date" name="bdate" class="form-control" value="<?php echo $row['birthdate'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="bplace">Birthplace</label>
							<input type="text" name="bplace" class="form-control" value="<?php echo $row['birthplace'];?>" readonly>
						</div>
						<div class="form-group">
							<label>Gender</label>
							<input type="text" name="gender" class="form-control" value="<?php echo $row['gender'];?>" readonly>
						</div>
						<div class="form-group">
							<label>Civil Status</label>
							<input type="text" name="civil_status" class="form-control" value="<?php echo $row['civil_status'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="home_address">Home Address</label>
							<input type="text" name="home_address" class="form-control" value="<?php echo $row['home_address'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="current_address">Current Address</label>
							<input type="text" name="current_address" class="form-control" value="<?php echo $row['current_address'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="mobile">Mobile Number</label>
							<input type="number" name="mobile" class="form-control" value="<?php echo $row['mobile_number'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>" readonly>
						</div>
					</form>
				</div>
				<!--MODAL BODY-->
				<!--MODAL FOOTER-->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
				<!--MODAL FOOTER-->
			</div>
		</div>
	</div>
	<?php }?>
<!-- END OF VIEW MODAL -->

<!-- THE MODAL FOR UPDATING -->
	<?php
		$view_query=mysqli_query($openconnection,"SELECT * FROM admin");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="edit<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Edit Admin</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			
				<!--MODAL BODY-->
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $row['id'];?>">
						</div>
						<div class="form-group">
							<label for="admin_id">Admin ID</label>
							<input type="text" name="admin_id" class="form-control" value="<?php echo $row['admin_id'];?>">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="text" name="password" class="form-control" value="<?php echo $row['password'];?>">
						</div>
						<div class="form-group">
							<label for="fname">Firstname</label>
							<input type="text" name="fname" class="form-control" value="<?php echo $row['firstname'];?>">
						</div>
						<div class="form-group">
							<label for="mname">Middlename</label>
							<input type="text" name="mname" class="form-control" value="<?php echo $row['middlename'];?>">
						</div>
						<div class="form-group">
							<label for="lname">Lastname</label>
							<input type="text" name="lname" class="form-control" value="<?php echo $row['lastname'];?>">
						</div>
						<div class="form-group">
							<label for="bdate">Birthdate</label>
							<input type="date" name="bdate" class="form-control" value="<?php echo $row['birthdate'];?>">
						</div>
						<div class="form-group">
							<label for="bplace">Birthplace</label>
							<input type="text" name="bplace" class="form-control" value="<?php echo $row['birthplace'];?>">
						</div>
						<div class="form-group">
							<label>Gender</label>
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
							<label>Civil Status</label>
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
							<label for="home_address">Home Address</label>
							<input type="text" name="home_address" class="form-control" value="<?php echo $row['home_address'];?>">
						</div>
						<div class="form-group">
							<label for="mobile">Mobile Number</label>
							<input type="number" name="mobile" class="form-control" value="<?php echo $row['mobile_number'];?>">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>">
						</div>
						<div class="form-group">
							<input type="submit" name="update" value="Update" class="btn btn-primary form-control">
						</div>
					</form>
				</div>
				<!--MODAL BODY-->
				<!--MODAL FOOTER-->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
				<!--MODAL FOOTER-->
			</div>
		</div>
	</div>
	<?php }?>
<!-- END OF UPDATE MODAL -->

	


</div>
</body>
</html>