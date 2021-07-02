<?php 
session_start();

	include("connection.php");
	include("user_functions.php");

	$admin_data = check_login($con);


	include 'db_connect.php';
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,'alumnitracker');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Curriculum Vitae</title>
	<link rel="stylesheet" type="text/css" href="stylecv.css">
</head>
<body>
	<?php
					$currentUser = $_SESSION['studnum'];
					$sql = "SELECT * FROM alumni WHERE studnum='$currentUser'";

					$gotResults = mysqli_query($openconnection,$sql);

					if($gotResults){
						if(mysqli_num_rows($gotResults)>0){
							while ($row = mysqli_fetch_array($gotResults)) {
								// print_r($row['firstname']);
								?>
<div id="print">
	<div class="print-area">
		<div class="header">
			<img style="width: 200px; height: 200px;" src="<?php echo $row['picture']?>">
			<div class="header-text">
				<h1><?php echo $row['firstname']." " .$row['middlename']." ".$row['lastname'];?></h1>
				<p><?php echo $row['occupation']?></p>
			</div>
		</div>


		<div class="content">
			<div class="left-area">
				<div class="contact">
					<h4>CONTACT</h4>
					<h5>Phone Number</h5>
					<p><?php echo $row['mobile_number']?></p>
					<h5>Email</h5>
					<p><?php echo $row['email']?></p>
					<h5>Address</h5>
					<p><?php echo $row['home_address']?></p>
				</div>

				<div class="skills">
					<h1>SKILLS</h1>
					<div class="bars">
						<div class="bar">
							<p><?php echo $row['skills0']?></p>
							<span></span>
						</div>
						<div class="bar">
							<p><?php echo $row['skills1']?></p>
							<span></span>
						</div>
						<div class="bar">
							<p><?php echo $row['skills2']?></p>
							<span></span>
						</div>
						<div class="bar">
							<p><?php echo $row['skills3']?></p>
							<span></span>
						</div>
						<div class="bar">
							<p><?php echo $row['skills4']?></p>
							<span></span>
						</div>
						<div class="bar">
							<p><?php echo $row['skills5']?></p>
							<span></span>
						</div>
						<div class="bar">
							<p><?php echo $row['skills6']?></p>
							<span></span>
						</div>
						<div class="bar">
							<p><?php echo $row['skills7']?></p>
							<span></span>
						</div>
						<div class="bar">
							<p><?php echo $row['skills8']?></p>
							<span></span>
						</div>
						<div class="bar">
							<p><?php echo $row['skills9']?></p>
							<span></span>
						</div>

					</div>
				</div>
				<!-- <div class="follow">
					<h1>FOLLOW ME</h1>
					<h4>Facebook</h4>
					<p>facebook.com/username</p>
					<h4>Instagram</h4>
					<p>instagram.com/username</p>
					<h4>Twitter</h4>
					<p>twitter.com/username</p>
				</div> -->
			</div>

			<div class="rigth-area" >
				<div class="about">
					<h1><span><i class="far fa-user"></i></span>ABOUT ME</h1>
					<p><?php echo $row['about_me']?></p>
				</div>

				<div class="work">
					<h1><span><i class="fas fa-suitcase-rolling"></i></span>WORK EXPERIENCE</h1>
					<div class="work-group">
						<h3><?php echo $row['workexptitle1']?></h3>
						<h4><?php echo $row['workexppos1']?></h4>
						<span><?php echo $row['workexpdate1']?></span>
						<p><?php echo $row['workexpdef1']?></p>
					</div>
					<div class="work-group">
						<h3><?php echo $row['workexptitle2']?></h3>
						<h4><?php echo $row['workexppos2']?></h4>
						<span><?php echo $row['workexpdate2']?></span>
						<p><?php echo $row['workexpdef2']?></p>
					</div>
					<div class="work-group">
						<h3><?php echo $row['workexptitle3']?></h3>
						<h4><?php echo $row['workexppos3']?></h4>
						<span><?php echo $row['workexpdate3']?></span>
						<p><?php echo $row['workexpdef3']?></p>
					</div>

				</div>
				<div class="education">
					<h1><span><i class="fas fa-book"></i></span>EDUCATION</h1>
					<div class="edu-group">
						<h4><?php echo $row['educname1']?><br>
						<?php echo $row['educplace1']?></h4>
						<span><?php echo $row['educdate1']?></span>
						<p><?php echo $row['educcourse1']?></p>
					</div>
					<div class="edu-group">
						<h4><?php echo $row['educname2']?><br>
						<?php echo $row['educplace2']?></h4>
						<span><?php echo $row['educdate2']?></span>
						<p><?php echo $row['educcourse2']?></p>
					</div>
					<div class="edu-group">
						<h4><?php echo $row['educname3']?><br>
						<?php echo $row['educplace3']?></h4>
						<span><?php echo $row['educdate3']?></span>
					</div>
					<div class="edu-group">
						<h4><?php echo $row['educname4']?><br>
						<?php echo $row['educplace4']?></h4>
						<span><?php echo $row['educdate4']?></span>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


	<?php

}
}
}
	?>

<!-- 	<button onclick="printContent('div1');">Print CV</button> -->
	<button id="printbutt" onclick="printContent('print');" class="btn btn-info" style="border-radius: 0; outline: none;"><i class="fa fa-print" aria-hidden="true"></i> Print</button>

	<?php $referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);
	
	if (!empty($referer)) {
		
		echo '<button id="backbutt"><a href="'. $referer .'" title="Return to the previous page">Go back</a></button>';
		
	} else {
		
		echo '<button><a href="javascript:history.go(-1)" title="Return to the previous page">Go back</a></button>';
		
	}
?>

<script>
	//Print button in profile
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;

  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>

</body>
</html>