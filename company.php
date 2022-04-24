<?php 
session_start();

	include("connection.php");
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
	<?php include 'db_connect.php'; include 'company_modal.php';
	if (isset($_POST['update'])){

		$id 		= $_POST['id'];
		$cname 		= $_POST['cname'];
		$cemail 	= $_POST['cemail'];
		$cpass 		= $_POST['cpass'];
		$cnumber 	= $_POST['cnumber'];
		$cwebsite 	= $_POST['cwebsite'];

		$query = "UPDATE company SET companyname='$cname', 
		companyemail='$cemail',
		companypassword='$cpass',
		companynumber='$cnumber', 
		companywebsite='$cwebsite'

		WHERE id='$id' ";

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
		<a href="alumni.php" class="active"><i class="fas fa-cogs"></i><span>Alumni</span></a>
		<a href="announcements.php"><i class="fas fa-table"></i><span>Announcements</span></a>
		<a href="events.php"><i class="fas fa-th"></i><span>Events</span></a>
		<a href="job.php"><i class="fas fa-circle"></i><span>Job Offers</span></a>
		<a href="company.php" ><i class="fas fa-sliders-h"></i><span>Company Page</span></a>
		<a href="add_admin.php"><i class="fas fa-user-shield"></i><span>Admin</span></a>
		<a href="admin_profile.php"><i class="fas fa-user"></i><span>Admin Profile</span></a>

	</div>
	<!-- Sidebar Area End -->

	<!-- Content Area Start -->
	<div class="content">
		<content>
			<div class="space">
				<h2>Company
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_grad_modal">Add</button>
				</h2>
				<fieldset><br>
				<table>
					<tr>
						<th width="140px">Company</th>
						<th width="250px">Email</th>
						<th width="120px">Contact Number</th>
						<th width="220px">Website</th>
					</tr>
				</table>
				<?php
				$view_query=mysqli_query($openconnection,"SELECT * FROM company");
					while ($row=mysqli_fetch_assoc($view_query)) {
				?>
				<hr>
				<table>
					<tr class="announce">
						<td width="140px"><?php echo $row['companyname'];?></td>
						<td width="120px"><?php echo $row['companyemail'];?></td>
						<td width="220px"><?php echo $row['companynumber'];?></td>
						<td width="110px"><?php echo $row['companywebsite'];?></td>
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
	<div class="modal fade" role="dialog" id="add_grad_modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Add New Company</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			
				<!--MODAL BODY-->
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="cname">Company <span>*</span></label>
							<input type="text" name="cname" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="cemail">Email <span>*</span></label>
							<input type="text" name="cemail" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="cpass">Company Password <span>*</span></label>
							<input type="text" class="form-control" placeholder="COMPANY NAME" required name="cpass" onkeydown="upperCaseF(this)"/>
						</div>
						<div class="form-group">
							<label for="cnumber">Contact Number <span>*</span></label>
							<input type="text" name="cnumber" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="cwebsite">Website <span>*</span></label>
							<input type="text" name="cwebsite" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="submit" name="send" value="Add to Company" class="btn btn-primary form-control">
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
		$view_query=mysqli_query($openconnection,"SELECT * FROM company");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="view<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Company</h3>
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
							<label for="cname">Company</label>
							<input type="text" name="cname" class="form-control" value="<?php echo $row['companyname'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="cemail">Email</label>
							<input type="text" name="cemail" class="form-control" value="<?php echo $row['companyemail'];?>" readonly>
						</div>
						
						<div class="form-group">
							<label for="cnumber">Contact Number</label>
							<input type="text" name="cnumber" class="form-control" value="<?php echo $row['companynumber'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="cwebsite">Website</label>
							<input type="text" name="cwebsite" class="form-control" value="<?php echo $row['companywebsite'];?>" readonly>
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
		$view_query=mysqli_query($openconnection,"SELECT * FROM company");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="edit<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Edit Company</h3>
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
							<label for="cname">Company</label>
							<input type="text" name="cname" class="form-control" value="<?php echo $row['companyname'];?>">
						</div>
						<div class="form-group">
							<label for="cemail">Email</label>
							<input type="text" name="cemail" class="form-control" value="<?php echo $row['companyemail'];?>">
						</div>
						
						<div class="form-group">
							<label for="cnumber">Contact Number</label>
							<input type="text" name="cnumber" class="form-control" value="<?php echo $row['companynumber'];?>">
						</div>
						<div class="form-group">
							<label for="cwebsite">Website</label>
							<input type="text" name="cwebsite" class="form-control" value="<?php echo $row['companywebsite'];?>">
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

<script type="text/javascript">
	function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

</script>