<?php 
	session_start();
	date_default_timezone_set('Asia/Manila');
	//include 'user_comment.php';
	include 'db_connect.php';
	include 'user_functions.php';
	// include 'functions.php';

	$admin_data = check_login($openconnection);

?>
<?php

/*function setComments($openconnection) {*/
	if (isset($_POST['commentSubmit'])) {
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		$post_id = $_POST['post_id'];
		$sql = "INSERT INTO tbl_comments (comment_name, date, comments, post_id) 
		VALUES ('$uid', '$date', '$message', '$post_id')";
		/*$sql1 = "SELECT * FROM tbl_comments WHERE post_id = '$post_id'";*/
		$result = $openconnection->query($sql);
	}
	
/*}
*/
?>
<!DOCTYPE html>
<html>

<head>
	<title>PHINMA UPang Alumni Tracker</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/alumni_logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="css/style_user.css">
</head>
<style type="text/css">
.container-comment {
  width: 200px;
  margin-bottom: 10px;
  white-space: nowrap; /** force the elements to stay side by side **/
}

.img-comment {
  border-radius: 50%;
  vertical-align: middle
}

.text-container-comment {
  display: inline-block;
  margin-top: 15px;
  margin-left: 20px;
  vertical-align: middle
}
</style>

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
					$post_id = $row['id'];
				?>
				<div class="space user-profile mt-4" style="padding: 20px; border-radius: 15px;  box-shadow: 0px 5px 10px 2px #888888">
				<h2 hidden><?php echo $post_id;?></h2>
				 <h4 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row['Subject'];?></h4>
				 <small><?php echo $row['DateSent'];?></small> / 
				  &nbsp;<small><strong><?php echo $row['Sender'];?></strong></small><br><br>
				<h5 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?php echo nl2br($row['Content']);?></h5>
				 <img style="width: 100%; height: auto; margin-top: 15px;" src="<?php echo $row['FileImage']?>">
				 

				 <div class="container">
				 	<div class="row">

				 		<div class="col-lg-12"><br>

								  <div class="form-group">
								    <label><strong style="color: #26314a;">Add Comment/Questions</strong></label>
								    <?php 
								    echo "<form method='POST'>
								    <input type='hidden' name='post_id' value='$post_id'>
								    <input type='hidden' name='uid' value='".$admin_data['firstname']." ".$admin_data['lastname']."'>
								    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
								    <textarea name='message' class='form-control'  rows='3' placeholder='Add your comment here' style='resize: none;''></textarea>
								    

								    <button type= 'submit' name = 'commentSubmit' class='btn mt-2' style='float: right; background-color: #244b48; color: white;'>Post Comment 
								    	<i class='fa fa-paper-plane' aria-hidden='true'></i></button>
								    	</form>";
								    	?>

								  </div><br><hr>

								 <h4>Comments</h4>
								 <?php

                                      $sql=mysqli_query($openconnection,"SELECT * FROM tbl_comments WHERE post_id='$post_id'");
                                      while($row=mysqli_fetch_assoc($sql))
                                      {          
                                      $date = $row['date'];
                                      $comment_name = $row['comment_name'];
                                      $message = $row['comments'];
                                   ?>
								  
								  			  <h2 hidden><?php echo $date; ?></h2>
											  <div class="container-comment">
											   <img class="img-comment" style="width: 20%; height: auto; margin-top: 15px;" src="<?php echo $row['FileImage']?>">
											  <div class="text-container-comment"><strong><?php echo $row['comment_name']?></strong> / <small><?php echo $row['date']?></small></div><br>
											  <h2><?php echo $message; ?></h2>
											</div>

								  <?php }?>

				 		</div>
				 		
				 	</div>
				 	
				 </div>
				



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
									<p><b>Subject:</b> <?php echo $row['Subject']; ?></p>
								</div>
								
								<div class="form-group">
									<p><b>Date Received:</b> <?php echo $row['DateSent']; ?></p>
								</div>
								<div class="form-group">
									<p><b>Sender:</b> <?php echo $row['Sender']; ?></p>
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