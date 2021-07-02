<?php

$id=0;
$title='';
$duration='';
$update=false;

$mysqli = new mysqli('localhost','root','','alumnitracker') or die(mysqli_error($mysqli));

if (isset($_POST['send'])){
		$title=$_POST['job_title'];
		$description=$_POST['job_desc'];
		$status=$_POST['status'];
		$image=$_FILES['image']['name'];
		$target ="images/".basename($_FILES['image']['name']);

		$category=$_POST['category'];
		$company_name=$_POST['company_name'];
		$company_email=$_POST['company_email'];
		$company_address=$_POST['company_address'];
		$salary=$_POST['salary'];
		$posted_by=$_POST['posted_by'];

		$mysqli->query("INSERT INTO tbl_jobs(JobTitle,JobDescription,Status,FileImage,Category,CompanyName,CompanyEmail,CompanyAddress,Salary,PostedBy) VALUES('$title','$description','$status','$target','$category','$company_name','$company_email','$company_address','$salary','$posted_by')") or die($mysqli->error);

		header("location: user_job.php");

	}

if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM tbl_jobs WHERE id=$id") or die($mysqli->error());

		header("location: user_job.php");

	}

?>