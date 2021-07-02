<?php

$id=0;
$title='';
$duration='';
$update=false;

$mysqli = new mysqli('localhost','root','','alumnitracker') or die(mysqli_error($mysqli));

if (isset($_POST['send'])){

		$imageCH ="images/".basename($_FILES['imageCH']['name']);
		$oldimage=$_POST['oldimage'];


		$title=$_POST['job_title'];
		$description=$_POST['job_desc'];
		$status=$_POST['status'];

		$category=$_POST['category'];
		$company_name=$_POST['company_name'];
		$company_email=$_POST['company_email'];
		$company_address=$_POST['company_address'];
		$salary=$_POST['salary'];
		$posted_by=$_POST['posted_by'];

		if (isset($_FILES['imageCH']['name'])&&($_FILES['imageCH']['name']!="")){
			$newimage ="images/".basename($_FILES['imageCH']['name']);
			unlink($oldimage);
			move_uploaded_file($_FILES['imageCH']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}


		$mysqli->query("INSERT INTO tbl_jobs(JobTitle,JobDescription,Status,FileImage,Category,CompanyName,CompanyEmail,CompanyAddress,Salary,PostedBy) VALUES('$title','$description','$status','$newimage','$category','$company_name','$company_email','$company_address','$salary','$posted_by')") or die($mysqli->error);

		header("location: job.php");

	}

if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM tbl_jobs WHERE id=$id") or die($mysqli->error());

		header("location: job.php");

	}

?>