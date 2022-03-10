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
	<section class="banner">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<h2>Hello <?php echo $admin_data['firstname']; ?>.</h2>
					<!-- <p>etceterta etceterta etceterta etceterta etceterta etceterta.</p> -->
					<!-- <a href="#" class="btnD1">Read</a> -->
				</div>
			</div>
		</div>
	</section>

<!-- Scripts -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>