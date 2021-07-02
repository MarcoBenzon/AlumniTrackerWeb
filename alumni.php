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
	<!-- PHP CODES FOR UPDATE MODAL -->
	<?php include 'db_connect.php'; include 'alumni_modals.php';
	if (isset($_POST['update'])){

		$imageCH ="images/".basename($_FILES['imageCH']['name']);
		$oldimage=$_POST['oldimage'];


		$id = $_POST['id'];
		$studnum=$_POST['studnum'];
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
		$batch=$_POST['batch'];
		$course=$_POST['course'];



		if (isset($_FILES['imageCH']['name'])&&($_FILES['imageCH']['name']!="")){
			$newimage ="images/".basename($_FILES['imageCH']['name']);
			unlink($oldimage);
			move_uploaded_file($_FILES['imageCH']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}

		$query = "UPDATE alumni SET studnum='$studnum', firstname='$fname', middlename='$mname', lastname='$lname', birthdate='$bdate', birthplace='$bplace', gender='$gender', home_address='$home_address', civil_status='$civil_status', mobile_number='$mobile', email='$email', batch_grad='$batch', course='$course', picture='$newimage' WHERE id='$id' ";
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
		<a href="editpages.php"><i class="fas fa-sliders-h"></i><span>Edit Pages</span></a>
		<a href="add_admin.php"><i class="fas fa-user-shield"></i><span>Admin</span></a>
		<a href="admin_profile.php"><i class="fas fa-user"></i><span>Admin Profile</span></a>

	</div>
	<!-- Sidebar Area End -->

	<!-- Content Area Start -->
	<div class="content">
		<content>
			<div class="space">
				<h2>Alumni
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_grad_modal">Add</button>
				</h2>
				<fieldset><br>
				<table>
					<tr>
						<th width="140px">Student Number</th>
						<th width="250px">Student Name</th>
						<th width="120px">Batch</th>
						<th width="220px">Course Graduated</th>
						<th width="110px">Status</th>
					</tr>
				</table>
				<?php
				$view_query=mysqli_query($openconnection,"SELECT * FROM alumni ORDER BY batch_grad DESC");
					while ($row=mysqli_fetch_assoc($view_query)) {
				?>
				<hr>
				<table>
					<tr class="announce">
						<td width="140px"><?php echo $row['studnum'];?></td>
						<td width="250px"><?php echo $row['lastname'],", ",$row['firstname']," ",$row['middlename'];?></td>
						<td width="120px"><?php echo $row['batch_grad'];?></td>
						<td width="220px"><?php echo $row['course'];?></td>
						<td width="110px"><?php echo $row['status'];?></td>
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
					<h3 class="modal-title">Add New Graduate</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			
				<!--MODAL BODY-->
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="studnum">Student Number <span>*</span></label>
							<input type="text" name="studnum" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="alum_pass">Student Password <span>*</span></label>
							<input type="text" class="form-control" placeholder="STUDENT LASTNAME" required name="alum_pass" onkeydown="upperCaseF(this)"/>
						</div>
						<div class="form-group">
							<label for="picture">Default Picture <span>*</span></label>
				<!-- 			<input type="file" name="picture" class="form-control" required> -->

							<input type="file" name="imageCH" value="" id="file" required="" />
							<input type="hidden" name="oldimage" id="file" class="form-control" value="<?php echo $row['picture'];?>">

						</div>
						<div class="form-group">
							<label for="fname">Firstname <span>*</span></label>
							<input type="text" name="fname" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="mname">Middlename <span>*</span></label>
							<input type="text" name="mname" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="lname">Lastname <span>*</span></label>
							<input type="text" name="lname" class="form-control" required>
						</div>
						<!-- <div class="form-group">
							<label for="bdate">Birthdate <span>*</span></label>
							<input type="date" name="bdate" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="bplace">Birthplace <span>*</span></label>
							<input type="text" name="bplace" class="form-control" required>
						</div> -->
						<div class="form-group">
							<label>Gender <span>*</span></label>
							<select name="gender" class="form-control" required>
								<option value="" disabled selected>-- select gender --</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<!-- <div class="form-group">
							<label>Civil Status</label>
							<select name="civil_status" class="form-control">
								<option value="" disabled selected>-- select civil status --</option>
								<option value="Single">Single</option>
								<option value="Married">Married</option>
								<option value="Divorced">Divorced</option>
								<option value="Widdowed">Widdowed</option>
							</select>
						</div>
						<div class="form-group">
							<label for="home_address">Home Address <span>*</span></label>
							<input type="text" name="home_address" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="mobile">Mobile Number <span>*</span></label>
							<input type="number" name="mobile" class="form-control" required>
						</div> -->
						<div class="form-group">
							<label for="email">Email <span>*</span></label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Year Graduated <span>*</span></label>
							<select name="batch" class="form-control" required>
								<option value="" disabled selected>-- select batch --</option>
								<option value="2010">2010</option>
								<option value="2011">2011</option>
								<option value="2012">2012</option>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
							</select>
						</div>
						<div class="form-group">
							<label>Course Graduated <span>*</span></label>
							<select name="course" class="form-control" required>
								<option value="" disabled selected>-- select course --</option>
								<option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
								<option value="Bachelor of Science in Architecture">Bachelor of Science in Architecture</option>
								<option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
								<option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
								<option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
								<option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
								<option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
								<option value="Bachelor of Arts in Communication">Bachelor of Arts in Communication</option>
								<option value="Bachelor of Arts in Political Science">Bachelor of Arts in Political Science</option>
								<option value="Bachelor of Education">Bachelor of Education</option>
								<option value="Bachelor of Education major in Pre-School Education">Bachelor of Education major in Pre-School Education</option>
								<option value="Bachelor of Education major in Biological Science">Bachelor of Education major in Biological Science</option>
								<option value="Bachelor of Education major in English">Bachelor of Education major in English</option>
								<option value="Bachelor of Education major in Mathematics">Bachelor of Education major in Mathematics</option>
								<option value="Bachelor of Science in Criminology">Bachelor of Science in Criminology</option>
								<option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
								<option value="Bachelor of Science in Accounting Technology">Bachelor of Science in Accounting Technology</option>
								<option value="Bachelor of Science in Business Administration major in Financial Management">Bachelor of Science in Business Administration major in Financial Management</option>
								<option value="Bachelor of Science in Business Administration major in Marketing Management">Bachelor of Science in Business Administration major in Marketing Management</option>
								<option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
								<option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option>
								<option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
								<option value="Bachelor of Science in Laboratory Science">Bachelor of Science in Laboratory Science</option>
								<option value="Bachelor of Science in Physical Therapy">Bachelor of Science in Physical Therapy</option>
								<option value="Bachelor of Science in Pharmacy">Bachelor of Science in Pharmacy</option>
								<option value="Bachelor of Science in Midwifery">Bachelor of Science in Midwifery</option>
								<option value="Diploma in Midwifery">Diploma in Midwifery</option>
							</select>
						</div>
						<div class="form-group">
							<label>Employment Status</label>
							<input type="text" name="status" class="form-control" value="Unemployed" readonly>
						</div>
						<div class="form-group" hidden>
							<label>School Name</label>
							<input type="text" name="sname" class="form-control" value="PHINMA University of Pangasinan" readonly>
						</div>
						<div class="form-group" hidden="">
							<label>School Address</label>
							<input type="text" name="saddress" class="form-control" value="Arellano St. Dagupan City, Pangasinan" readonly>
						</div>
						<div class="form-group">
							<input type="submit" name="send" value="Add to Alumni" class="btn btn-primary form-control">
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
		$view_query=mysqli_query($openconnection,"SELECT * FROM alumni");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="view<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Alumni</h3>
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
							<label for="studnum">Student Number</label>
							<input type="text" name="studnum" class="form-control" value="<?php echo $row['studnum'];?>" readonly>
						</div>
						
						<div class="form-group">
							<label for="studnum">Student Profile</label><br>
							<center>
							<img style="width: 25em; height: auto;" src="<?php echo $row['picture'];?>">
						</center>
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
						<div class="form-group">
							<label for="batch">Year Graduated</label>
							<input type="text" name="batch" class="form-control" value="<?php echo $row['batch_grad'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="course">Course Graduated</label>
							<input type="text" name="course" class="form-control" value="<?php echo $row['course'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="status">Employment Status</label>
							<input type="text" name="status" class="form-control" value="<?php echo $row['status'];?>" readonly>
						</div>
						<div class="form-group" hidden>
							<label>School Name</label>
							<input type="text" name="schoolname" class="form-control" value="PHINMA University of Pangasinan" readonly>
						</div>
						<div class="form-group" hidden="">
							<label>School Address</label>
							<input type="text" name="schooladdress" class="form-control" value="Arellano St. Dagupan City, Pangasinan" readonly>
						</div>
						<div class="form-group">
							<label for="occupation">Occupation</label>
							<input type="text" name="occupation" class="form-control" value="<?php echo $row['occupation'];?>" readonly>
						</div>
						<div class="form-group">
							<label for="workplace">Workplace</label>
							<input type="text" name="workplace" class="form-control" value="<?php echo $row['workplace'];?>" readonly>
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
		$view_query=mysqli_query($openconnection,"SELECT * FROM alumni");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="edit<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Edit Alumni</h3>
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
							<label for="studnum">Student Number</label>
							<input type="text" name="studnum" class="form-control" value="<?php echo $row['studnum'];?>">
						</div>
						<div class="form-group">
							<label for="fname">Firstname</label>
							<input type="text" name="fname" class="form-control" value="<?php echo $row['firstname'];?>">
						</div>

						<div class="form-group">
							<label for="image">Image</label>

							<input type="file" name="imageCH" value="" id="file"/>
							<input type="hidden" name="oldimage" id="file" class="form-control" value="<?php echo $row['picture'];?>">
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
							<label>Year Graduated</label>
							<select name="batch" value="<?php echo $row['batch_grad'];?>" class="form-control">
								<?php
									$batch=array("2010","2011","2012","2013","2014","2015","2016","2017","2018","2019","2020");
									foreach ($batch as $bg){
										if($bg == $row['batch_grad'])
											echo "<option value='$bg' SELECTED>$bg</option>";
										else
											echo "<option value='$bg'>$bg</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Course Graduated</label>
							<select name="course" value="<?php echo $row['course'];?>" class="form-control">
								<?php
									$course=array("Bachelor of Science in Information Technology","Bachelor of Science in Architecture","Bachelor of Science in Civil Engineering","Bachelor of Science in Electrical Engineering","Bachelor of Science in Electronics Engineering","Bachelor of Science in Computer Engineering","Bachelor of Science in Mechanical Engineering","Bachelor of Arts in Communication","Bachelor of Arts in Political Science","Bachelor of Education","Bachelor of Education major in Pre-School Education","Bachelor of Education major in Biological Science","Bachelor of Education major in English","Bachelor of Education major in Mathematics","Bachelor of Science in Criminology","Bachelor of Science in Accountancy","Bachelor of Science in Accounting Technology","Bachelor of Science in Business Administration major in Financial Management","Bachelor of Science in Business Administration major in Marketing Management","Bachelor of Science in Hospitality Management","Bachelor of Science in Tourism Management","Bachelor of Science in Nursing","Bachelor of Science in Laboratory Science","Bachelor of Science in Physical Therapy","Bachelor of Science in Pharmacy","Bachelor of Science in Midwifery","Diploma in Midwifery");
									foreach ($course as $c){
										if($c == $row['course'])
											echo "<option value='$c' SELECTED>$c</option>";
										else
											echo "<option value='$c'>$c</option>";
								}
								?>
							</select>
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