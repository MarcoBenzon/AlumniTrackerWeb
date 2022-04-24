<?php 
session_start();

	include("connection.php");
	include("functions.php");
	include("timer.php");
	$admin_data = check_login($con);

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
		<a href="company.php"><i class="fas fa-sliders-h"></i><span>Company Page</span></a>
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
				 
								    <a href="announce_modals.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are You Sure To Delete This Item?')">
								    	<button class="btn mt-2 btn-danger btn-sm" style="float: right; color: white;">Delete
								    	<i class="far fa-trash-alt"></i></button></a>



								    	    <button class="btn btn-info btn-sm mt-2" data-toggle="modal" data-target="#edit<?php echo $row['id'];?>" style="float: right; margin-right: 5px; color: white;">Edit
								    	<i class="far fa-edit"></i></button>


				  <div class="form-group">
				  	<BR>
				  	<br><hr>
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



				<?php } ?>
					
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
						<hr>
						<div class="form-group">
							<label for="date_sent">Comments</label>
							  <div class="form-group" style="border: 1px solid #989090; padding: 5px;">
											  <div class="container-comment">
											  <div class="text-container-comment"><strong>Marco Benzon</strong> / <small>5:30 PM</small></div>
											</div>

  										

											<h6 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 14px;">
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
											</h6>
											  <button class="btn mt-2 btn-danger" style="float: right; color: white;">Delete 
								    	<i class="fas fa-trash-alt"></i></button>

								  </div>
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