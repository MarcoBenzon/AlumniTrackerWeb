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


<body style="background-color: #f4f4f4; overflow-x: hidden;">
	<?php include 'db_connect.php'; ?>
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
						<li class="nav-item">
							<a class="nav-link" href="#">Alumni</a>
						</li>
						<li class="nav-item dropdown active">
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
							<a class="nav-link" href="#">Contact</a>
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

	<section class="banner2" style="padding-top: 150px; ">
		<div class="container">
			<div class="row d-flex justify-content-center ">

				<div class="col-lg-8 col-sm-12 ">

			<content>
				<center>
			<img src="images/announcementorig2.png" style="width: 50%; height: auto; padding: 0; "></center>

				<?php
				$view_query = mysqli_query($openconnection, "SELECT * FROM announcements ORDER BY DateSent DESC");
				while ($row = mysqli_fetch_assoc($view_query)) {
				?>
			<div class="space user-profile mt-4" style="padding: 20px; border-radius: 15px;  box-shadow: 0px 5px 10px 2px #888888">
				 <h4 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row['Sender'];?></h4>
				 <small><?php echo $row['DateSent'];?></small> / 
				  &nbsp;<small><strong><?php echo $row['Subject'];?></strong></small><br><br>
				<h5 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?php echo $row['Content'];?></h5>
				 <img style="width: 100%; height: auto; margin-top: 15px;" src="<?php echo $row['FileImage']?>">
				 
				</div>

				<?php } ?>



			</content>
			</div>
			</div>
		</div>
		<!-- Content Area End -->

		<footer>

		</footer>

		<!-- The Modal for VIEWING-->
		<?php
		$view_query = mysqli_query($openconnection, "SELECT * FROM announcements");
		while ($row = mysqli_fetch_assoc($view_query)) {
		?>
			<div class="modal fade" role="dialog" id="view<?php echo $row['id']; ?>">
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
							<form>
								<div class="form-group">
									<p><b>Sender:</b> <?php echo $row['Sender']; ?></p>
								</div>
								<div class="form-group">
									<p><b>Date Received:</b> <?php echo $row['DateSent']; ?></p>
								</div>
								<div class="form-group">
									<p><b>Subject:</b> <?php echo $row['Subject']; ?></p>
								</div>
								<div class="form-group">
									<label for="image">Image</label><br>
									<center><img style="height: 300px;" src="<?php echo $row['FileImage']; ?>"></center>
								</div>
								<div class="form-group">
									<p><b>Announcement: </b><br>
										<?php echo $row['Content']; ?></p>
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
		<?php } ?>
		</div>
	</section>

	<!-- Scripts -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>