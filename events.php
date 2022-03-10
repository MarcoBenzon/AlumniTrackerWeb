<?php 
session_start();
include("timer.php");
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
	<?php include 'db_connect.php'; include 'events_modals.php';
	if (isset($_POST['update'])){

		$imageCH ="images/".basename($_FILES['imageCH']['name']);
		$oldimage=$_POST['oldimage'];

		$id=$_POST['id'];

		$title=$_POST['event_title'];
		$description=$_POST['event_desc'];

			if (isset($_FILES['imageCH']['name'])&&($_FILES['imageCH']['name']!="")){
			$newimage ="images/".basename($_FILES['imageCH']['name']);
			unlink($oldimage);
			move_uploaded_file($_FILES['imageCH']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}



		$query = "UPDATE events SET FileImage='$newimage', EventTitle='$title', EventDescription='$description' WHERE id=$id";
		$query_run = mysqli_query($openconnection,$query);
		
		if($query_run){
			echo "<script type='text/javascript'>alert('Updated Successfully!')</script>";
		}
		else{
			echo "<script type='text/javascript'>alert('Updates Not Saved!')</script>";
		}
		// header("location: events.php");
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
		<a href="events.php" class="active"><i class="fas fa-th"></i><span>Events</span></a>
		<a href="job.php"><i class="fas fa-circle"></i><span>Job Offers</span></a>
		<a href="company.php"><i class="fas fa-sliders-h"></i><span>Company Page</span></a>
		<a href="add_admin.php"><i class="fas fa-user-shield"></i><span>Admin</span></a>
		<a href="admin_profile.php"><i class="fas fa-user-alt"></i><span>Admin Profile</span></a>
	</div>
	<!-- Sidebar Area End -->

	<!-- Content Area Start -->
	<div class="content">
		<content>
			<div class="space">
				<h2>Event Page
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_event_modal">Create Post</button>
				</h2>
				<fieldset><br>
				<table>
					<tr>
						<th width="250px">Title</th>
						<th width="430px">Description</th>
						<th width="130px">Image</th>
					</tr>
				</table>
				<?php
				$view_query=mysqli_query($openconnection,"SELECT * FROM events ORDER BY id DESC");
					while ($row=mysqli_fetch_assoc($view_query)) {
				?>
				<hr>
				<table>
					<tr class="announce">
						<td width="250px"><?php echo $row['EventTitle'];?></td>
						<td width="430px"><?php echo $row['EventDescription'];?></td>
						<td width="130px"><img style="width: 100px; height: 100px;" src="<?php echo $row['FileImage']; ?>"></td>
						<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $row['id'];?>">Edit</button></td>
						<td><a href="events_modals.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Event?')">Delete</a></td>
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

<!-- The Modal for INSERTING-->
	<div class="modal fade" role="dialog" id="add_event_modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Post New Event</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			
				<!--MODAL BODY-->
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="event_title">Title <span>*</span></label>
							<input type="text" name="event_title" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="event_desc">Description <span>*</span></label>
							<textarea name="event_desc" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label for="image">Image</label>
							<!-- <input type="file" name="image" class="form-control"> -->

							<input type="file" name="imageCH" value="" id="file"/>
							<input type="hidden" name="oldimage" id="file" class="form-control" >
						</div>
						<div class="form-group">
							<input type="submit" name="send" value="Post Now" class="btn btn-primary form-control">
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

<!-- The Modal for EDITING-->
	<?php
		$view_query=mysqli_query($openconnection,"SELECT * FROM events");
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
							<input type="hidden" name="id" value="<?php echo $row['id'];?>">
						</div>
						<div class="form-group">
							<label for="event_title">Title</label>
							<input type="text" name="event_title" class="form-control" value="<?php echo $row['EventTitle'];?>">
						</div>
						<div class="form-group">
							<label for="event_desc">Description</label>
							<textarea name="event_desc" class="form-control" value="<?php echo $row['EventDescription'];?>"><?php echo $row['EventDescription'];?></textarea>
						</div>
						<div class="form-group">
							<label for="image">Image</label>
							<!-- <input type="file" name="image" class="form-control" value="<?php echo $row['FileImage'];?>"> -->


							<input type="file" name="imageCH" value="" id="file"/>
							<input type="hidden" name="oldimage" id="file" class="form-control" value="<?php echo $row['FileImage'];?>">
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
</div>

<!-- <script type="text/javascript" src="js/modal_insert.js"></script>
<script type="text/javascript" src="js/modal_delete.js"></script> -->

</body>
</html>