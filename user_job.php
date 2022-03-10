<?php
session_start();

	include("connection.php");
	include("user_functions.php");

	$admin_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHINMA UPang Alumni Tracker</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/alumni_logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style_user.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

	<?php include 'db_connect.php'; include 'user_jobmodal.php';
	if (isset($_POST['update'])){
		$id=$_POST['id'];
		$image=$_FILES['image']['name'];
		$title=$_POST['job_title'];
		$description=$_POST['job_desc'];
		$status=$_POST['status'];

		// if (isset($_FILES['imageCH']['name'])&&($_FILES['imageCH']['name']!="")){
		// 	$newimage ="images/".basename($_FILES['imageCH']['name']);
		// 	unlink($oldimage);
		// 	move_uploaded_file($_FILES['imageCH']['tmp_name'], $newimage);
		// }
		// else{
		// 	$newimage=$oldimage;
		// }

		mysqli_query($openconnection,"UPDATE tbl_jobs SET JobTitle='$title',JobDescription='$description',Status='$status' WHERE id=$id");
	
		// header("location: job.php");
	}
	?>
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
			  <a class="navbar-brand" href="home.php"><img src="images/alumnilogo2.png" style="width: 200px; height: auto; padding: 0; margin-left: 50px; "></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-lg-auto">
			      <li class="nav-item">
			        <a class="nav-link" href="home.php">Home</a>
			      </li>
			     
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          News
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="user_announce.php">Announcements</a>
			          <a class="dropdown-item" href="user_events.php">Events</a>
			        </div>
			      </li>
			       <li class="nav-item active">
			        <a class="nav-link" href="user_job.php">Jobs</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="user_aboutus.php">About</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="user_contactus.php">Contact</a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Profile
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			        	<a class="dropdown-item" href="user_profile.php">Profile</a>
			        	<div class="dropdown-divider"></div> 
			        	<a class="dropdown-item" href="user_cv.php">Curriculum Vitae</a>
			        	<div class="dropdown-divider"></div>
			          	<a class="dropdown-item" href="user_logout.php">Logout</a>
			        </div>
			      </li>
			    </ul>
			  </div>
			</nav>
		</div>
	</header>
	<section class="banner">
		<div class="container">
		<content>
			<h2>Job Offers</h2>
			<div class="space user-profile" style="padding: 20px; border-radius: 5px;">
				<button style="float: left;" type="button" class="btn btn-success" data-toggle="modal" data-target="#add_job_modal">Create Post</button>
				
				<!-- START OF CATEGORY FILTER -->
				<form method="post">
			    <table border="0">
			        <tr>
			            <td style="float: right;">
			                <select name="category" class="form-control" required>
								<option value="Show All" selected="">Show All</option>
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
			            </td>
			            <td width="100px" style="padding: 0; margin: 0;">
			            	<input type="submit" name="filter" value="Filter" style="height: 37px; border-radius: 5px;"> 
			        	</td>
			        </tr>
			        
			    </table>
			    </form>

				<?php include 'db_connect.php';
				
				if (isset($_POST['filter'])){ // functions for filtering job category.
					if($_POST['category'] == 'Accountancy') {
					    $query = "SELECT * FROM tbl_jobs WHERE category='Accountancy' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Architecture') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Architecture' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Business') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Business' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Criminology') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Criminology' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Education') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Education' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Engineering') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Engineering' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Hospitality') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Hospitality' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Laboratory Science') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Laboratory Science' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Law') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Law' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Media') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Media' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Midwifery') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Midwifery' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Nursing') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Nursing' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Pharmacy') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Pharmacy' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Physical Therapy') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Physical Therapy' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Technology') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Technology' ORDER BY DatePosted DESC";
					}
					elseif($_POST['category'] == 'Tourism') {
						$query = "SELECT * FROM tbl_jobs WHERE category='Tourism' ORDER BY DatePosted DESC";
					}
					else{
						$query = "SELECT * FROM tbl_jobs ORDER BY DatePosted DESC";
					}

					//fetching and printing of filtered data.

					Print "<br><fieldset><br>
					<table>
						<tr>
							<th width='260px'>Job Title</th>
							<th width='360px'>Job Description</th>
							<th width='200px'>Status</th>
						</tr>
					</table>";
					$view_query=mysqli_query($openconnection,$query);
					while ($row=mysqli_fetch_assoc($view_query)) {

					    Print "<hr>";
					    Print "<table>";
					    Print "<tr class='jobs'>";
					    Print "<td width='260px'>".$row['JobTitle']."</td>";
					    Print "<td width='360px'>".$row['JobDescription']."</td>";
					    Print "<td width='200px'>".$row['Status']."</td>";
					    Print "<td><button type='button' class='btn btn-info' data-toggle='modal' data-target='#view".$row['id']."'>Open</button></td>";
					    Print "</tr></table>";
					} 
					Print "</fieldset>";
				}

				?>

				<!-- END OF CATEGORY FILTER -->
			</div>
		</content>
	</div>
	<!-- Content Area End -->

	<footer>
		
	</footer>

<!-- The Modal for VIEWING-->
	<?php
		$view_query=mysqli_query($openconnection,"SELECT * FROM tbl_jobs");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="view<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Job Offers</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			
				<!--MODAL BODY-->
				<div class="modal-body">
					<form>
						<div class="form-group">
							<p>Job Title:</b> <?php echo $row['JobTitle'];?></p>
						</div>
						<div class="form-group">
							<img style="width: 200px; height: auto; justify-content: center;" src="<?php echo $row['FileImage'];?>">
						</div>
						<div class="form-group">
							<p>Company: <?php echo $row['CompanyName'];?></p>
						</div>
						<div class="form-group">
							<p>Email: <?php echo $row['CompanyEmail'];?></p>
						</div>
						<div class="form-group">
							<p>Location: <?php echo $row['CompanyAddress'];?></p>
						</div>
						<div class="form-group">
							<p>Salary: <?php echo $row['Salary'];?></p>
						</div>
						<div class="form-group">
							<p>Description: <?php echo $row['JobDescription'];?></p>
						</div>
						<div class="form-group">
							<p>Category: <?php echo $row['Category'];?></p>
						</div>
						<div class="form-group">
							<p>Status: <?php echo $row['Status'];?></p>
						</div>
						<div class="form-group">
							<p>Posted By: <?php echo $row['PostedBy'];?></p>
						</div>
						<div class="form-group">
							<p>Date Posted: <?php echo $row['DatePosted'];?></p>
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
	</section>

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
					<form method="post" action="user_jobmodal.php" enctype="multipart/form-data">
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
							<input type="text" name="posted_by" class="form-control" readonly value="<?php echo $admin_data['firstname']. " ".$admin_data['lastname']; ?>"><!-- palitan na lang ng firstname and lastname yang username jan. -->

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


<!-- Scripts -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>