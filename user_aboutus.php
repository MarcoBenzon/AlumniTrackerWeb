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
</head>
<body>
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
			  <a class="navbar-brand" href="home.php"><img src="images/alumnilogo2.png" style="width: 200px; height: auto; padding: 0; margin-left: 50px; "></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-lg-auto">
			      <li class="nav-item active">
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
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="user_profile.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
	</header>
	<br><br><br><br><br><br><br>
	<center>
	<div class="content">
		<?php
		$view_query=mysqli_query($con,"SELECT * FROM tbl_editpages");
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
							
							<td><p id="fetch">Alumni Tracker is an online-based application that helps to enhance the 
tracking of college graduates. The project primarily aims to replace current 
tracking procedure of college graduates and providing alumni data to college 
faculties. It aims at developing a web portal which will be useful for the college to 
monitor the alumina's and for the alumni to update their current status and get 
notified about the college activities. </p></td>
						</tr>
					</table>
				</fieldset>
				
				
				
			</form>
		</content>
		<?php }?>
	</div>
	</center>

<!-- Scripts -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>







