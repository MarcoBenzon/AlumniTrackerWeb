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
	<?php include 'db_connect.php'; include 'announce_modals.php';
	if (isset($_POST['update'])){
		$id=$_POST['id'];

		$imageCH ="images/".basename($_FILES['imageCH']['name']);
		$oldimage=$_POST['oldimage'];



		$subject=$_POST['subject'];
		$announcement=$_POST['announcement'];

		if (isset($_FILES['imageCH']['name'])&&($_FILES['imageCH']['name']!="")){
			$newimage ="images/".basename($_FILES['imageCH']['name']);
			unlink($oldimage);
			move_uploaded_file($_FILES['imageCH']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}


		$query = "UPDATE announcements SET FileImage='$newimage', Subject='$subject', Content='$announcement' WHERE id=$id";
		$query_run = mysqli_query($openconnection,$query);
		
		if($query_run){
			echo "<script type='text/javascript'>alert('Updated Successfully!')</script>";
		}
		else{
			echo "<script type='text/javascript'>alert('Updates Not Saved!')</script>";
		}
		// header("location: job.php");
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
		<a href="announcements.php" class="active"><i class="fas fa-table"></i><span>Announcements</span></a>
		<a href="events.php"><i class="fas fa-th"></i><span>Events</span></a>
		<a href="job.php"><i class="fas fa-circle"></i><span>Job Offers</span></a>
		<a href="editpages.php"><i class="fas fa-sliders-h"></i><span>Edit Pages</span></a>
		<a href="add_admin.php"><i class="fas fa-user-shield"></i><span>Admin</span></a>
		<a href="admin_profile.php"><i class="fas fa-user-alt"></i><span>Admin Profile</span></a>
	</div>
	<!-- Sidebar Area End -->

	<!-- Content Area Start -->
	<div class="content">
		<content>
			<div class="space">
				<h2>Announcements
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#send_announce_modal">Create</button>
				</h2>
				<fieldset><br>
				<table>
					<tr>
						<th width="200px">Sender</th>
						<th width="280px">Subject</th>
						<th width="140px">Image</th>
						<th width="150px">Date Sent</th>

						<!-- <th width="260px">Sender</th>
						<th width="360px">Subject</th>
						<th width="150px">Date Sent</th> -->
					</tr>
				</table>
				<?php
				$view_query=mysqli_query($openconnection,"SELECT * FROM announcements ORDER BY DateSent DESC");
					while ($row=mysqli_fetch_assoc($view_query)) {
				?>
				<hr>
				<table>
					<tr class="announce">
						<td width="200px"><?php echo $row['Sender'];?></td>
						<td width="280px"><?php echo $row['Subject'];?></td>
						<td width="140px"><img style="width: 100px; height: 100px;" src="<?php echo $row['FileImage']; ?>"></td>
						<td width="150px"><?php echo $row['DateSent'];?></td>
						<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#view<?php echo $row['id']; ?>">View</button></td>
						<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $row['id'];?>">Edit</button></td>
						<td>
							<a href="announce_modals.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Item?')">Delete</a>
						</td>
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
	<?php
	$view_query=mysqli_query($openconnection,"SELECT * FROM admin");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="send_announce_modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Send New Announcement</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			
				<!--MODAL BODY-->
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="sender">Sender</label>
							<input type="text" name="sender" class="form-control" value="<?php echo $row['username'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="subject">Subject <span>*</span></label>
							<input type="text" name="subject" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="announcement">Announcement <span>*</span></label>
							<textarea name="announcement" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label for="image">Image</label>
							<!-- <input type="file" name="image" class="form-control" value="<?php echo $row['FileImage'];?>"> -->

							<input type="file" name="imageCH" value="" id="file"/>
							<input type="hidden" name="oldimage" id="file" class="form-control" value="<?php echo $row['FileImage'];?>">
						</div>
						<div class="form-group">
							<input type="submit" name="send" value="Send Now" class="btn btn-primary form-control">
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

<!-- The Modal for VIEWING-->
	<?php
		$view_query=mysqli_query($openconnection,"SELECT * FROM announcements");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="view<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Announcement</h3>
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
							<label for="sender">Sender</label>
							<input type="text" name="sender" class="form-control" value="<?php echo $row['Sender'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="subject">Subject</label>
							<input type="text" name="subject" class="form-control" value="<?php echo $row['Subject'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="announcement">Announcement</label>
							<textarea name="announcement" class="form-control" value="<?php echo $row['Content'];?>" readonly><?php echo $row['Content'];?></textarea>
						</div>
						<div class="form-group">
							<label for="image">Image</label><br>
							<!-- <input type="text" name="image" class="form-control" value="<?php echo $row['FileImage'];?>" readonly> -->
							<img style="width: 25em; height: auto;" src="<?php echo $row['FileImage']; ?>">
						</div>
						<div class="form-group">
							<label for="date_sent">Date Sent</label>
							<input type="text" name="date_sent" class="form-control" value="<?php echo $row['DateSent'];?>" readonly>
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

<!-- The Modal for EDITING-->
	<?php
		$view_query=mysqli_query($openconnection,"SELECT * FROM announcements");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="edit<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Edit Announcement</h3>
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
							<label for="sender">Sender</label>
							<input type="text" name="sender" class="form-control" readonly value="<?php echo $row['Sender'];?>">
						</div>
						<div class="form-group">
							<label for="subject">Subject</label>
							<input type="text" name="subject" class="form-control" value="<?php echo $row['Subject'];?>">
						</div>
						<div class="form-group">
							<label for="announcement">Announcement</label>
							<textarea name="announcement" class="form-control" value="<?php echo $row['Content'];?>"><?php echo $row['Content'];?></textarea>
						</div>
						<div class="form-group">
							<label for="image">Image</label>
							<!-- <input type="file" name="image" class="form-control" value="<?php echo $row['FileImage'];?>"> -->

							<input type="file" name="imageCH" value="" id="file"/>
							<input type="hidden" name="oldimage" id="file" class="form-control" value="<?php echo $row['FileImage'];?>">
						</div>
						<div class="form-group">
							<label for="date_sent">Date Sent</label>
							<input type="text" name="date_sent" class="form-control" value="<?php echo $row['DateSent'];?>" readonly>
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