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


	<style type="text/css">
	.title {
  text-align: center;
  margin-top: 50px;
}

.title span{
  font-family: 'Anton', 'sans-serif';
  color: white;
  text-shadow: 0 0 5px #333;
  font-size: 46px;
  letter-spacing: 2px;
  border-bottom: 4px solid rgba(90,92,106,1);
}

.scroll {
  cursor: pointer;
  width: 70px;
  height: 70px;
  position: fixed;
  bottom: 40px;
  right: -80px;
  border-radius: 100%;
  background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(90,92,106,1) 0%, rgba(32,45,58,1) 81.3% );
  color: #fff;
  font-size: 44px;
  font-weight: bold;
  text-align: center;
  box-shadow: 0 0 5px 0px #888;
  transition: 300ms;
}

.scroll i {
  margin-top: 10px;
  text-shadow: 0 0 2px #fff;
}

.scroll:hover i {
  animation-name: rotate;
  animation-duration: 300ms;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

@keyframes rotate {
  from {margin-top: 15px}
  to {margin-top: 5px}
}

.visible {
  right: 30px;
  transition: all 400ms;
  transform: rotate(360deg)
}
.box{
	width: 97%;
  border: 5px solid black;
  padding: 2%;
  margin: 20px;
}
.cont{
	width: 100%;
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
	grid-gap: 5px;
}
.boxx{
	height: 100%;
	color: black;
	border: 2px solid black;
	position: relative;
}
h5{
	text-align: center;
}
h6{
	text-indent: 5px;
}
.form-control{
	width: 90%;
}
label{
	display: inline-block;
  width: 130px;
  text-align: left;
  text-indent: 5px;
 	padding-top: 10px;
}
.form-group{
	display:grid;
  grid-template-columns: max-content max-content;
  grid-gap:5px;
}
.form-groupp{
	float: right;
	display:grid;
  grid-template-columns: max-content max-content;
  grid-gap:5px;
}
button{
	float: right;
}
#center{
  display: block;
    margin:auto;
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

		$imageCH ="images/".basename($_FILES['imageCH']['name']);
		$oldimage=$_POST['oldimage'];

		$fname=$_POST['fname'];
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
		$status=$_POST['status'];
		$occupation=$_POST['occupation'];
		$workplace=$_POST['workplace'];

		$about_me = $_POST['about_me'];

		$skill0 = $_POST['skills0'];
		$skill1 = $_POST['skills1'];
		$skill2 = $_POST['skills2'];
		$skill3 = $_POST['skills3'];
		$skill4 = $_POST['skills4'];
		$skill5 = $_POST['skills5'];
		$skill6 = $_POST['skills6'];
		$skill7 = $_POST['skills7'];
		$skill8 = $_POST['skills8'];
		$skill9 = $_POST['skills9'];

		$worktitle1 = $_POST['worktitle1'];
		$workpos1 	= $_POST['workpos1'];
		$workdate1	= $_POST['workdate1'];
		$workdef1	= $_POST['workdef1'];
		$worktitle2 = $_POST['worktitle2'];
		$workpos2 	= $_POST['workpos2'];
		$workdate2	= $_POST['workdate2'];
		$workdef2	= $_POST['workdef2'];
		$worktitle3 = $_POST['worktitle3'];
		$workpos3 	= $_POST['workpos3'];
		$workdate3	= $_POST['workdate3'];
		$workdef3	= $_POST['workdef3'];

		$eduname1	= $_POST['eduname1'];
		$eduplace1	= $_POST['eduplace1'];
		$educourse1	= $_POST['educourse1'];
		$edudate1	= $_POST['edudate1'];
		$eduname2	= $_POST['eduname2'];
		$eduplace2	= $_POST['eduplace2'];
		$educourse2	= $_POST['educourse2'];
		$edudate2	= $_POST['edudate2'];
		$eduname3	= $_POST['eduname3'];
		$eduplace3	= $_POST['eduplace3'];
		$edudate3	= $_POST['edudate3'];
		$eduname4	= $_POST['eduname4'];
		$eduplace4	= $_POST['eduplace4'];
		$edudate4	= $_POST['edudate4'];

		$wcompany1 = $_POST['wcompany1'];
		$wcompany2 = $_POST['wcompany2'];
		$wcompany3 = $_POST['wcompany3'];

		if (isset($_FILES['imageCH']['name'])&&($_FILES['imageCH']['name']!="")){
			$newimage ="images/".basename($_FILES['imageCH']['name']);
			unlink($oldimage);
			move_uploaded_file($_FILES['imageCH']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}


		$query ="UPDATE alumni SET firstname='$fname', middlename='$mname', lastname='$lname', birthdate='$bdate', birthplace='$bplace', gender='$gender', home_address='$home_address', current_address='$current_address', civil_status='$civil_status', mobile_number='$mobile', email='$email', status='$status', occupation='$occupation', workplace='$workplace', picture='$newimage', about_me = '$about_me',




		skills0 = '$skill0',
		skills1 = '$skill1',
		skills2 = '$skill2',
		skills3 = '$skill3',
		skills4 = '$skill4',
		skills5 = '$skill5',
		skills6 = '$skill6',
		skills7 = '$skill7',
		skills8 = '$skill8',
		skills9 = '$skill9',

		workexptitle1 = '$worktitle1',
		workexppos1	  = '$workpos1',
		workexpdate1  = '$workdate1',
		workexpdef1	  = '$workdef1',
		workexptitle2 = '$worktitle2',
		workexppos2	  = '$workpos2',
		workexpdate2  = '$workdate2',
		workexpdef2	  = '$workdef2',
		workexptitle3 = '$worktitle3',
		workexppos3	  = '$workpos3',
		workexpdate3  = '$workdate3',
		workexpdef3	  = '$workdef3',

		educname1	= '$eduname1',
		educplace1	= '$eduplace1',
		educcourse1	= '$educourse1',
		educdate1	= '$edudate1',
		educname2	= '$eduname2',
		educplace2	= '$eduplace2',
		educcourse2	= '$educourse2',
		educdate2	= '$edudate2',
		educname3	= '$eduname3',
		educplace3	= '$eduplace3',
		educdate3	= '$edudate3',
		educname4	= '$eduname4',
		educplace4	= '$eduplace4',
		educdate4	= '$edudate4',

		workcompany1 = '$wcompany1',
		workcompany2 = '$wcompany2',
		workcompany3 = '$wcompany3'

		WHERE id='$id' ";

		$query_run = mysqli_query($connection,$query);

		if($query_run){
			echo "<script type='text/javascript'>alert('Changes Saved Successfully!')</script>";
		}
		else{
			echo "<script type='text/javascript'>alert('Changes Not Saved!')</script>";
		}
	}

	else if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$password = $_POST['password'];

		$query2 ="UPDATE alumni SET password='$password' WHERE id = '$id'";

		$query_run2 = mysqli_query($connection,$query2);

		if($query_run2){
			echo "<script type='text/javascript'>alert('Updated Successfully!')</script>";
		}
		else{
			echo "<script type='text/javascript'>alert('Changes Not Saved!')</script>";
		}
	}

	?>
	<!-- START OF NAVIGATION BAR -->
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
			       <li class="nav-item">
			        <a class="nav-link" href="user_job.php">Jobs</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="user_aboutus.php">About</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="user_contactus.php">Contact</a>
			      </li>
			      <li class="nav-item dropdown active">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			        	Profile
			          <!-- <i class="fa fa-user"></i> -->
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
				<div class=title>
			<span></span>
				</div>
				<div id="jsScroll" class="scroll" onclick="scrollToTop();">
					<i class="fa fa-angle-up"></i>
				</div>
	</header>
	<!-- END OF NAVIGATION BAR -->

	<!-- START OF SECTION TAG -->

	<section class="banner">
		<div class="container">
			<div class="row user-profile">
				<div class="col-sm-12">
					<fieldset><br>
						<div class="box">
							<form method="post" enctype="multipart/form-data">
								<?php
								$currentUser = $_SESSION['studnum'];
								$sql = "SELECT * FROM alumni WHERE studnum='$currentUser'";

								$gotResults = mysqli_query($openconnection,$sql);

								if($gotResults){
									if(mysqli_num_rows($gotResults)>0){
										while ($row = mysqli_fetch_array($gotResults)) {
											// print_r($row['firstname']);
											?>
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $row['id'];?>">Account Settings</button>
								<div class="form-group">
									<input type="hidden" name="id" value="<?php echo $row['id'];?>">
								</div>
								
								<br>
								<center>

								<div class="form-group justify-content-center">
									<label for="studnum">Student Profile</label><br>
									<img style="width: 100px; height: 100px;" src="<?php echo $row['picture']; ?>">
									
								</div>
								<input type="file" name="imageCH" value="" id="file"/>
								<input type="hidden" name="oldimage" id="file" class="form-control" value="<?php echo $row['picture'];?>">


								</center>
								
								<br>
								<div class="cont">
									<div class="boxx">
										<h5>Personal Information</h5>
										<br>
													<div class="form-group">
														<label for="studnum">Student Number</label>
														<input type="text" name="studnum" class="form-control" readonly value="<?php echo $row['studnum'];?>">
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
														<label for="gender">Gender</label>
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
														<label for="current_address">Current Address</label>
														<input type="text" name="current_address" class="form-control" value="<?php echo $row['current_address'];?>">
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
														<label for="batch">Batch</label>
														<input type="text" name="course" class="form-control" readonly value="<?php echo $row['batch_grad'];?>">
													</div>
													<div class="form-group">
														<label>Course</label>
														<input type="text" name="course" class="form-control" readonly value="<?php echo $row['course'];?>">
													</div>
													<div class="form-group">
														<label for="status">Employment Status</label>
														<select name="status" value="<?php echo $row['status'];?>" class="form-control">
															<?php
																$stat=array("Unemployed","Employed","Retired");
																foreach ($stat as $st){
																	if($st == $row['status'])
																		echo "<option value='$st' SELECTED>$st</option>";
																	else
																		echo "<option value='$st'>$st</option>";
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="occupation">Job</label>
														<input type="text" name="occupation" class="form-control" value="<?php echo $row['occupation'];?>">
													</div>
													<div class="form-group">
														<label for="workplace">Company Name</label>
														<input type="text" name="workplace" class="form-control" value="<?php echo $row['workplace'];?>">
													</div>

												<!-- About Me -->
													<div class="form-group">
														<label for="about_me">About Me</label>
														<textarea cols="22" rows="5" name="about_me" class="form-control"><?php echo $row['about_me'];?></textarea>
													</div>

													<!-- Skills -->
													<div class="form-group">
														<label for="skills0">Skills</label>
														<input type="text" name="skills0" class="form-control" value="<?php echo $row['skills0'];?>">
													</div>
													<div class="form-group">
														<label for="skills1"></label>
														<input type="text" name="skills1" class="form-control" value="<?php echo $row['skills1'];?>">
													</div>
												
													<div class="form-group">
														<label for="skills2"></label>
														<input type="text" name="skills2" class="form-control" value="<?php echo $row['skills2'];?>">
													</div>
													<div class="form-group">
														<label for="skills3"></label>
														<input type="text" name="skills3" class="form-control" value="<?php echo $row['skills3'];?>">
													</div>
													<div class="form-group">
														<label for="skills4"></label>
														<input type="text" name="skills4" class="form-control" value="<?php echo $row['skills4'];?>">
													</div>
													<div class="form-group">
														<label for="skills5"></label>
														<input type="text" name="skills5" class="form-control" value="<?php echo $row['skills5'];?>">
													</div>
													<div class="form-group">
														<label for="skills6"></label>
														<input type="text" name="skills6" class="form-control" value="<?php echo $row['skills6'];?>">
													</div>
													<div class="form-group">
														<label for="skills7"></label>
														<input type="text" name="skills7" class="form-control" value="<?php echo $row['skills7'];?>">
													</div>
													<div class="form-group">
														<label for="skills8"></label>
														<input type="text" name="skills8" class="form-control" value="<?php echo $row['skills8'];?>">
													</div>
													<div class="form-group">
														<label for="skills9"></label>
														<input type="text" name="skills9" class="form-control" value="<?php echo $row['skills9'];?>">
													</div>
									</div>
									<div class="boxx">
										<h5>Work Experience</h5>
										<br>
										<h5>Work 1</h5>
										<div class="form-group">
												<label for="wcompany1">Company</label>
												<input type="text" name="wcompany1" class="form-control" value="<?php echo $row['workcompany1'];?>">
											</div>
											<div class="form-group">
												<label for="worktitle1">Title</label>
												<input type="text" name="worktitle1" class="form-control" value="<?php echo $row['workexptitle1'];?>">
											</div>
											<div class="form-group">
												<label for="workpos1">Position</label>
												<input type="text" name="workpos1" class="form-control" value="<?php echo $row['workexppos1'];?>">
											</div>
											<div class="form-group">
												<label for="workdate1">Date</label>
												<input type="text" name="workdate1" placeholder="Year up until" class="form-control" value="<?php echo $row['workexpdate1'];?>">
											</div>
											<div class="form-group">
												<label for="worktitle1">Description</label>
												<input type="text" name="workdef1" class="form-control" value="<?php echo $row['workexpdef1'];?>">
											</div>
											<h5>Work 2</h5>
											<div class="form-group">
												<label for="wcompany2">Company</label>
												<input type="text" name="wcompany2" class="form-control" value="<?php echo $row['workcompany2'];?>">
											</div>
											<div class="form-group">
												<label for="worktitle2">Title</label>
												<input type="text" name="worktitle2" class="form-control" value="<?php echo $row['workexptitle2'];?>">
											</div>
											<div class="form-group">
												<label for="workpos2">Position</label>
												<input type="text" name="workpos2" class="form-control" value="<?php echo $row['workexppos2'];?>">
											</div>
											<div class="form-group">
												<label for="workdate2">Date</label>
												<input type="text" name="workdate2" placeholder="Year up until" class="form-control" value="<?php echo $row['workexpdate2'];?>">
											</div>
											<div class="form-group">
												<label for="workdef2">Description</label>
												<input type="text" name="workdef2" class="form-control" value="<?php echo $row['workexpdef2'];?>">
											</div>
											<h5>Work 3</h5>
											<div class="form-group">
												<label for="wcompany3">Company</label>
												<input type="text" name="wcompany3" class="form-control" value="<?php echo $row['workcompany3'];?>">
											</div>
											<div class="form-group">
												<label for="worktitle3">Title</label>
												<input type="text" name="worktitle3" class="form-control" value="<?php echo $row['workexptitle3'];?>">
											</div>
											<div class="form-group">
												<label for="workpos3">Position</label>
												<input type="text" name="workpos3" class="form-control" value="<?php echo $row['workexppos3'];?>">
											</div>
											<div class="form-group">
												<label for="workdate3">Date</label>
												<input type="text" name="workdate3" class="form-control" placeholder="Year up until" value="<?php echo $row['workexpdate3'];?>">
											</div>
											<div class="form-group">
												<label for="workdef3">Description</label>
												<input type="text" name="workdef3" class="form-control" value="<?php echo $row['workexpdef3'];?>">
											</div>
									</div>
									<div class="boxx">
										<h5>Education</h5>
										<br>
											<h6 for="eduname1"><strong>TERTIARY EDUCATION</strong></h6>
											<div class="form-group">
												
												<label for="eduname1">School</label>
												<input type="text" name="eduname1" class="form-control" value="<?php echo $row['sname'];?>" readonly>
											</div>
											<div class="form-group">
												<label for="eduplace1">Address</label>
												<input type="text" name="eduplace1" class="form-control" value="<?php echo $row['saddress'];?>" readonly>
											</div>
											<div class="form-group">
												<label for="educourse1">Course</label>
												<input type="text" name="educourse1" class="form-control" value="<?php echo $row['course'];?>" readonly>
											</div>
											<div class="form-group">
												<label for="edudate1">Year</label>
												<input type="text" name="edudate1" class="form-control" value="<?php echo $row['batch_grad'];?>" readonly>
											</div>

											<br>
											<h6><strong>SECONDARY EDUCATION</strong></h6>
											<h6><strong>Senior Highschool</strong></h6>
											<div class="form-group">
												<label for="eduname2">School</label>
												<input type="text" name="eduname2" class="form-control" value="<?php echo $row['educname2'];?>">
											</div>
											<div class="form-group">
												<label for="eduplace2">Address</label>
												<input type="text" name="eduplace2" class="form-control" value="<?php echo $row['educplace2'];?>">
											</div>
											<div class="form-group">
												<label for="educourse2">STRAND</label>
												<input type="text" name="educourse2" class="form-control" value="<?php echo $row['educcourse2'];?>">
											</div>
											<div class="form-group">
												<label for="edudate2">Year</label>
												<input type="text" name="edudate2" class="form-control" value="<?php echo $row['educdate2'];?>">
											</div>

											<br>
											<h6><strong>Junior Highschool</strong></h6>
											<div class="form-group">
												<label for="eduname3">School</label>
												<input type="text" name="eduname3" class="form-control" value="<?php echo $row['educname3'];?>">
											</div>
											<div class="form-group">
												<label for="eduplace3">Address</label>
												<input type="text" name="eduplace3" class="form-control" value="<?php echo $row['educplace3'];?>">
											</div>
											<div class="form-group">
												<label for="edudate3">Year</label>
												<input type="text" name="edudate3" class="form-control" value="<?php echo $row['educdate3'];?>">
											</div>

											<br>
											<h6><strong>PRIMARY EDUCATION</strong></h6>
											<div class="form-group">
												<label for="eduname4">School</label>
												<input type="text" name="eduname4" class="form-control" value="<?php echo $row['educname4'];?>">
											</div>
											<div class="form-group">
												<label for="eduplace4">Address</label>
												<input type="text" name="eduplace4" class="form-control" value="<?php echo $row['educplace4'];?>">
											</div>
											<div class="form-group">
												<label for="edudate4">Year</label>
												<input type="text" name="edudate4" class="form-control" value="<?php echo $row['educdate4'];?>">
											</div>
											<center>
												<div>
												<input type="submit" id="center" name="update" value="Save Changes" class="btn btn-primary form-control">
											</div>
											</center>
											
									</div>
								
							</div>
							<?php
							}
						}
					}
					?>
							</form>

						</div>					
				</div>
				</div>
			</div>
		</div>
	</section>

	<!-- END OF SECTION TAGS -->

	<?php
		$view_query=mysqli_query($openconnection,"SELECT * FROM alumni");
		while ($row=mysqli_fetch_assoc($view_query)) {
	?>
	<div class="modal fade" role="dialog" id="edit<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Edit Profile</h3>
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
									<label for="password">Student Number: </label>
									<input type="text" name="studnum" class="form-control" readonly value="<?php echo $row['studnum'];?>">
								</div>
								<div class="form-group">
									<label for="password">Password: </label>
									<input type="password" name="password" class="form-control" value="<?php echo $row['password'];?>">
								</div>
							<div class="form-group" style="float: right;">
									<input type="submit" name="edit" value="Update" class="btn btn-primary form-control">
								</div>
							</form>
						</div>
						<!--MODAL BODY-->
						<!--MODAL FOOTER-->
				
				<!--MODAL FOOTER-->
			</div>
		</div>
	</div>
	<?php }?>

<!-- SCRIPTS -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

	<script type="text/javascript">
		window.addEventListener('scroll', e => {
  var el = document.getElementById('jsScroll');
  if(window.scrollY > 200) {
    el.classList.add('visible');
  } else {
    el.classList.remove('visible');
  }
});

function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}
	</script>
</body>
</html>