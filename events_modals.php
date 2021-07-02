<?php

$id=0;
$title='';
$duration='';
$update=false;

$mysqli = new mysqli('localhost','root','','alumnitracker') or die(mysqli_error($mysqli));

if (isset($_POST['send'])){


		$imageCH ="images/".basename($_FILES['imageCH']['name']);
		$oldimage=$_POST['oldimage'];


		$title=$_POST['event_title'];
		$description=$_POST['event_desc'];

		if (isset($_FILES['imageCH']['name'])&&($_FILES['imageCH']['name']!="")){
			$newimage ="images/".basename($_FILES['imageCH']['name']);
			unlink($oldimage);
			move_uploaded_file($_FILES['imageCH']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}


		$mysqli->query("INSERT INTO events(EventTitle,EventDescription,FileImage) VALUES('$title','$description','$newimage')") or die($mysqli->error);

		header("location: events.php");

	}

if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM events WHERE id=$id") or die($mysqli->error());

		header("location: events.php");

	}

?>