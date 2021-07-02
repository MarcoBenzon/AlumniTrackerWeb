<?php

$id=0;
$title='';
$duration='';
$update=true;

// PHP codes for insert modal.
include 'db_connect.php';
$mysqli = new mysqli('localhost','root','','alumnitracker') or die(mysqli_error($mysqli));

if (isset($_POST['send'])){
		$studnum=$_POST['studnum'];
		$fname=$_POST['fname'];
		$mname=$_POST['mname'];
		$lname=$_POST['lname'];
		$bdate=$_POST['bdate'];
		$bplace=$_POST['bplace'];
		$gender=$_POST['gender'];
		$home_address=$_POST['home_address'];
		$current_address=$_POST['current_address'];
		$civil_status=$_POST['civil_status'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$batch=$_POST['batch'];
		$course=$_POST['course'];
		$status=$_POST['status'];
		$occupation=$_POST['occupation'];
		$workplace=$_POST['workplace'];
		$password=$_POST['alum_pass'];

		$sname =$_POST['sname'];
		$saddress =$_POST['saddress'];

		$imageCH ="images/".basename($_FILES['imageCH']['name']);
		$oldimage=$_POST['oldimage'];

		if (isset($_FILES['imageCH']['name'])&&($_FILES['imageCH']['name']!="")){
			$newimage ="images/".basename($_FILES['imageCH']['name']);
			unlink($oldimage);
			move_uploaded_file($_FILES['imageCH']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}

		


		$query = "INSERT INTO alumni(studnum,password,firstname,middlename,lastname,birthdate,birthplace,gender,home_address,current_address,civil_status,mobile_number,email,batch_grad,course,status,occupation,workplace,picture,sname,saddress) 
		VALUES('$studnum','$password','$fname','$mname','$lname','$bdate','$bplace','$gender','$home_address','$current_address','$civil_status','$mobile','$email','$batch','$course','$status','$occupation','$workplace','$newimage','$sname','$saddress')";
		$query_run = mysqli_query($openconnection,$query);


		header("location: alumni.php");

	}

// Function for delete button.
if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM alumni WHERE id=$id") or die($mysqli->error());

		header("location: alumni.php");

	}
?>