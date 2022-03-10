<?php

$id=0;
$title='';
$duration='';
$update=true;

// PHP codes for insert modal.
include 'db_connect.php';
$mysqli = new mysqli('localhost','root','','alumnitracker') or die(mysqli_error($mysqli));

if (isset($_POST['send'])){
		$cname 		= $_POST['cname'];
		$cemail 	= $_POST['cemail'];
		$cpass 		= $_POST['cpass'];
		$cnumber 	= $_POST['cnumber'];
		$cwebsite 	= $_POST['cwebsite'];

		$query = "INSERT INTO company(companyname,companyemail,companypassword,companynumber,companywebsite) 
		VALUES('$cname','$cemail','$cpass','$cnumber','$cwebsite')";
		$query_run = mysqli_query($openconnection,$query);


		header("location: company.php");

	}

// Function for delete button.
if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM company WHERE id=$id") or die($mysqli->error());

		header("location: company.php");

	}
?>