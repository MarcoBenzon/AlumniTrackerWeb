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
	<?php include 'db_connect.php'; include 'job_modals.php';
	if (isset($_POST['update'])){
		
		$imageCH ="images/".basename($_FILES['imageCH']['name']);
		$oldimage=$_POST['oldimage'];

		$id=$_POST['id'];
		$title=$_POST['job_title'];
		$description=$_POST['job_desc'];
		$status=$_POST['status'];

		$category=$_POST['category'];
		$company_name=$_POST['company_name'];
		$company_email=$_POST['company_email'];
		$company_address=$_POST['company_address'];
		$salary=$_POST['salary'];

		if (isset($_FILES['imageCH']['name'])&&($_FILES['imageCH']['name']!="")){
			$newimage ="images/".basename($_FILES['imageCH']['name']);
			unlink($oldimage);
			move_uploaded_file($_FILES['imageCH']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}

		mysqli_query($openconnection,"UPDATE tbl_jobs SET FileImage='$newimage', JobTitle='$title',JobDescription='$description',Status='$status',Category='$category',CompanyName='$company_name',CompanyEmail='$company_email',CompanyAddress='$company_address',Salary='$salary' WHERE id=$id");
	
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
		<a href="announcements.php"><i class="fas fa-table"></i><span>Announcements</span></a>
		<a href="events.php"><i class="fas fa-th"></i><span>Events</span></a>
		<a href="job.php" class="active"><i class="fas fa-circle"></i><span>Job Offers</span></a>
		<a href="company.php"><i class="fas fa-sliders-h"></i><span>Company Page</span></a>
		<a href="add_admin.php"><i class="fas fa-user-shield"></i><span>Admin</span></a>
		<a href="admin_profile.php"><i class="fas fa-user-alt"></i><span>Admin Profile</span></a>
	</div>
	<!-- Sidebar Area End -->

	<!-- Content Area Start -->
	<div class="content">
		<content>
			<div class="space">
				<h2>Job Offers
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_job_modal">Create Post</button>
				</h2>
				<fieldset><br>
				<table>
					<tr>
						<th width="200px">Job Title</th>
						<th width="400px">Description</th>
						<th width="130px">Image</th>
						<th width="80px">Status</th>
					</tr>
				</table>
				<?php
				$view_query=mysqli_query($openconnection,"SELECT * FROM tbl_jobs ORDER BY id DESC");
					while ($row=mysqli_fetch_assoc($view_query)) {
				?>
				<hr>
				<table>
					<tr class="announce">
						<td width="200px"><?php echo $row['JobTitle'];?></td>
						<td width="400px"><?php echo $row['JobDescription'];?></td>
						<td width="130px"><img style="width: 100px; height: 100px;" src="<?php echo $row['FileImage']?>"></td>
						<td width="80px"><?php echo $row['Status'];?></td>
						<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $row['id'];?>">Edit</button></td>
						<td><a href="job_modals.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Job?')">Delete</a></td>
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
	<div class="modal fade" role="dialog" id="add_job_modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Post New Job Offer</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			
				<!--MODAL BODY-->
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="job_title">Job Title <span>*</span></label>
							<input type="text" name="job_title" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="company_name">Company Name <span>*</span></label>
							<input type="text" name="company_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="company_email">Email <span>*</span></label>
							<input type="email" name="company_email" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="company_address">Address <span>*</span></label>
							<input type="text" name="company_address" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="salary">Salary <span>*</span></label>
							<input type="text" name="salary" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="job_desc">Description <span>*</span></label>
							<textarea name="job_desc" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Category <span>*</span></label><br>
							<select name="category" class="form-control" required>
								<option value="" disabled selected>-- select category --</option>
								<option value="Accountancy">Accountancy</option>
								<option value="Architecture">Architecture</option>
								<option value="Business">Business</option>
								<option value="Criminology">Criminology</option>
								<option value="Education">Education</option>
								<option value="Engineering">Engineering</option>
								<option value="Hospitality">Hospitality</option>
								<option value="Laboratory Science">Laboratory Science</option>
								<option value="Law">Law</option>
								<option value="Media">Media</option>
								<option value="Midwifery">Midwifery</option>
								<option value="Nursing">Nursing</option>
								<option value="Pharmacy">Pharmacy</option>
								<option value="Physical Therapy">Physical Therapy</option>
								<option value="Technology">Technology</option>
								<option value="Tourism">Tourism</option>
							</select>
						</div>
						<div class="form-group">
							<label>Status <span>*</span></label><br>
							<select name="status" class="form-control" required>
								<option value="" disabled selected>-- select status --</option>
								<option value="Hiring">Hiring</option>
								<option value="Closed">Closed</option>
							</select>
						</div>
						<div class="form-group">
							<label for="posted_by">Posted By</label>
							<input type="text" name="posted_by" class="form-control" readonly value="<?php echo $admin_data['username']; ?>"><!-- palitan na lang ng firstname and lastname yang username jan. -->
						</div>
						<div class="form-group">
							<label for="image">Upload Photo</label>
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
		$view_query=mysqli_query($openconnection,"SELECT * FROM tbl_jobs");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="edit<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Edit Job</h3>
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
							<label for="job_title">Job Title</label>
							<input type="text" name="job_title" class="form-control" value="<?php echo $row['JobTitle'];?>">
						</div>
						<div class="form-group">
							<label for="company_name">Company Name</label>
							<input type="text" name="company_name" class="form-control" value="<?php echo $row['CompanyName'];?>">
						</div>
						<div class="form-group">
							<label for="company_email">Email</label>
							<input type="email" name="company_email" class="form-control" value="<?php echo $row['CompanyEmail'];?>">
						</div>
						<div class="form-group">
							<label for="company_address">Address</label>
							<input type="text" name="company_address" class="form-control" value="<?php echo $row['CompanyAddress'];?>">
						</div>
						<div class="form-group">
							<label for="salary">Salary</label>
							<input type="text" name="salary" class="form-control" value="<?php echo $row['Salary'];?>">
						</div>
						<div class="form-group">
							<label for="job_desc">Description</label>
							<textarea name="job_desc" class="form-control" value="<?php echo $row['JobDescription'];?>"><?php echo $row['JobDescription'];?></textarea>
						</div>
						<div class="form-group">
							<label>Category</label>
							<select name="status" value="<?php echo $row['Category'];?>" class="form-control">
								<?php
									$category=array("Accountancy","Architecture","Business","Criminology","Education","Engineering","Hospitality","Laboratory","Science","Law","Media","Midwifery","Nursing","Pharmacy","Physical","Therapy","Technology","Tourism");
									foreach ($category as $cat){
										if($cat == $row['Category'])
											echo "<option value='$cat' SELECTED>$cat</option>";
										else
											echo "<option value='$cat'>$cat</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select name="status" value="<?php echo $row['Status'];?>" class="form-control">
								<?php
									$status=array("Hiring","Soon","Closed");
									foreach ($status as $stat){
										if($stat == $row['Status'])
											echo "<option value='$stat' SELECTED>$stat</option>";
										else
											echo "<option value='$stat'>$stat</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="image">Image</label>
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

</body>
</html>