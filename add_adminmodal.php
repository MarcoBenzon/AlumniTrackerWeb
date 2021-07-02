<?php

$id=0;
$title='';
$duration='';
$update=true;

// PHP codes for insert modal.
include 'db_connect.php';
$mysqli = new mysqli('localhost','root','','alumniTracker') or die(mysqli_error($mysqli));

if (isset($_POST['send'])){
		$admin_id=$_POST['admin_id'];
		$username=$_POST['username'];
		$password=$_POST['password'];
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

		// $file = $_FILES['picture']['name'];
		// $file = $_FILES['picture'];
		// $filename = $_FILES['picture']['name'];
		// $filetmpname = $_FILES['picture']['tmp_name'];
		// $filesize = $_FILES['picture']['size'];
		// $fileerror = $_FILES['picture']['error'];
		// $filetype = $_FILES['picture']['type'];

		// $fileExt = explode('.', $filename);
		// $fileActualExt = strtolower(end($fileExt));
		// $allowed = array('jpg', 'jpeg', 'png', 'pdf');

		// if(in_array($fileActualExt, $allowed)){
		// 	if($fileerror === 0){
		// 		if($filesize < 1000000){
		// 			$fileNameNew = uniqid('', true).".".$fileActualExt;
		// 			$fileDestination = 'images/'.$fileNameNew;
		// 			move_uploaded_file($filetmpname, $fileDestination);
		// 			header("Location: alumni.php?uploadsuccess");
		// 		} else{
		// 			echo "<script type='text/javascript'>alert='File is too big.'</script>";
		// 		}
		// 	} else{
		// 		echo "<script type='text/javascript'>alert='Error uploading file.'</script>";
		// 	}
		// }else{
		// 	echo "<script type='text/javascript'>alert='You cannot upload files of this type.'</script>";
		// }

		$query = "INSERT INTO admin(admin_id,
		username,
		password,
		firstname,
		middlename,
		lastname,
		birthdate,
		birthplace,
		gender,
		home_address,
		current_address,
		civil_status,
		mobile_number,
		email,) VALUES('$admin_id',
		'$username',
		'$password',
		'$fname',
		'$mname',
		'$lname',
		'$bdate',
		'$bplace',
		'$gender',
		'$home_address',
		'$current_address',
		'$civil_status',
		'$mobile',
		'$email',)";
		$query_run = mysqli_query($openconnection,$query);

		// if($query_run){
		// 	move_uploaded_file($_FILES['image']['tmp_name'], "$file");
		// }

		// $mysqli->query("INSERT INTO alumni(studnum,password,firstname,middlename,lastname,birthdate,birthplace,gender,home_address,current_address,civil_status,mobile_number,email,batch_grad,course,status,occupation,workplace,picture) VALUES('$studnum','$password','$fname','$mname','$lname','$bdate','$bplace','$gender','$home_address','$current_address','$civil_status','$mobile','$email','$batch','$course','$status','$occupation','$workplace','$file')") or die($mysqli->error);

		header("location: add_admin.php");

	}

// Function for delete button.
if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM admin WHERE id=$id") or die($mysqli->error());

		header("location: add_admin.php");

	}
?>