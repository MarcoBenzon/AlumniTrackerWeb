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
	<link rel="shortcut icon" href="images/alumni_logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include 'db_connect.php'; include 'editpages_modals.php';
	if (isset($_POST['update'])){
		$id=$_POST['id'];
		$about_heading=$_POST['heading'];
		$about_content=$_POST['content'];
		$conus_address=$_POST['address'];
		$conus_number=$_POST['number'];
		$conus_landline=$_POST['landline'];
		$conus_email=$_POST['email'];

		mysqli_query($openconnection,"UPDATE tbl_editpages SET AboutHeading='$about_heading', AboutContent='$about_content', ConUsAddress='$conus_address', ConUsNumber='$conus_number', ConUsLandline='$conus_landline', ConUsEmail='$conus_email' WHERE id=$id");
	
		// header("location: editpages.php");
	}
	?>
	<!-- Header Area Start -->
	<header>
		<div class="left_area">
			<h3>UPANG <span>ALUMNI TRACKER</span></h3>
		</div>
		<div class="rigth_area">
			<a href="login.php" class="logout_btn">Logout</a>
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
		<a href="editpages.php" class="active"><i class="fas fa-sliders-h"></i><span>Edit Pages</span></a>
		<a href="add_admin.php"><i class="fas fa-user-shield"></i><span>Admin</span></a>
		<a href="admin_profile.php"><i class="fas fa-user-alt"></i><span>Admin Profile</span></a>
	</div>
	<!-- Sidebar Area End -->

	<!-- Content Area Start -->
	<div class="content">
		<?php
		$view_query=mysqli_query($openconnection,"SELECT * FROM tbl_editpages");
			while ($row=mysqli_fetch_assoc($view_query)) {
		?>
		<content class="form">
				<form class="about_form" style="background-color: #fff;">
					<h2>About Us</h2>
					<!-- <div class="form-group">
						<label for="heading">Heading:</label>
						<input type="text" name="heading" class="form-control" value="Lorem ipsum dolor sit amet.">
					</div>
					<div class="form-group">
						<label for="content">Content:</label>
						<input type="text" name="content" class="form-control" value="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nesciunt, amet officia soluta, dolores dolor?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, consequuntur.">
					</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<input type="text" name="address" class="form-control" value="Arellano St. Dagupan City Pangasinan">
					</div>
					<div class="form-group">
						<label for="number">Contact Number:</label>
						<input type="text" name="number" class="form-control" value="+(63)9123456789">
					</div>
					<div class="form-group">
						<label for="landline">Landline:</label>
						<input type="text" name="landline" class="form-control" value="02-1234567">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email" class="form-control" value="upang@gmail.com">
					</div>
					<div class="form-group">
						<input type="submit" name="add" value="Add Data" class="form-control">
					</div> -->
				<fieldset><br>
					<table>
						<tr>
							<td><p>Heading:</p></td>
							<td><p id="fetch"><?php echo $row['AboutHeading'];?></p></td>
						</tr>
						<tr>
							<td><p>Content:</p></td>
							<td><p id="fetch"><?php echo $row['AboutContent'];?></p></td>
						</tr>
					</table>
				</fieldset>
				<h2>Contact Us</h2>
				<fieldset><br>
					<table>
						<tr>
							<td><p>Address:</p></td>
							<td><p id="fetch"><?php echo $row['ConUsAddress'];?></p></td>
						</tr>
						<tr>
							<td><p>Contact Number:</p></td>
							<td><p id="fetch"><?php echo $row['ConUsNumber'];?></p></td>
						</tr>
						<tr>
							<td><p>Landline:</p></td>
							<td><p id="fetch"><?php echo $row['ConUsLandline'];?></p></td>
						</tr>
						<tr>
							<td><p>Email:</p></td>
							<td><p id="fetch"><?php echo $row['ConUsEmail'];?></p></td>
						</tr>
					</table>
				</fieldset><br>
				<center><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $row['id'];?>">Edit</button></center>
			</form>
		</content>
		<?php }?>
	</div>
	<!-- Content Area End -->

	<footer>
		
	</footer>

<!-- The Modal for EDITING-->
	<?php
		$view_query=mysqli_query($openconnection,"SELECT * FROM tbl_editpages");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="edit<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Edit Event</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			
				<!--MODAL BODY-->
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" name="id" class="form-control" hidden value="<?php echo $row['id'];?>">
					</div>
					<div class="form-group">
						<label for="heading">Heading:</label>
						<input type="text" name="heading" class="form-control" value="<?php echo $row['AboutHeading'];?>">
					</div>
					<div class="form-group">
						<label for="content">Content:</label>
						<textarea name="content" class="form-control" value="<?php echo $row['AboutContent'];?>"><?php echo $row['AboutContent'];?></textarea>
					</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<input type="text" name="address" class="form-control" value="<?php echo $row['ConUsAddress'];?>">
					</div>
					<div class="form-group">
						<label for="number">Contact Number:</label>
						<input type="text" name="number" class="form-control" value="<?php echo $row['ConUsNumber'];?>">
					</div>
					<div class="form-group">
						<label for="landline">Landline:</label>
						<input type="text" name="landline" class="form-control" value="<?php echo $row['ConUsLandline'];?>">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email" class="form-control" value="<?php echo $row['ConUsEmail'];?>">
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
</body>
</html>