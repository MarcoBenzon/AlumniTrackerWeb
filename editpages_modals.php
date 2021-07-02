<?php

$id=0;
$title='';
$duration='';
$update=false;

$mysqli = new mysqli('localhost','root','','alumnitracker') or die(mysqli_error($mysqli));

if (isset($_POST['add'])){
		$about_heading=$_POST['heading'];
		$about_content=$_POST['content'];
		$conus_address=$_POST['address'];
		$conus_number=$_POST['number'];
		$conus_landline =$_POST['landline'];
		$conus_email=$_POST['email'];

		$mysqli->query("INSERT INTO tbl_editpages(AboutHeading,AboutContent,ConUsAddress,ConUsNumber,ConUsLandline,ConUsEmail) VALUES('$about_heading','$about_content','$conus_address','$conus_number','$conus_landline','$conus_email')") or die($mysqli->error);

		header("location: editpages.php");

	}
?>