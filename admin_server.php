<?php
$connection=mysqli_connect("localhost","root","","alumnitracker");

if (isset($_POST['send'])){
		$admin_id=$_POST['admin_id'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$date=$_POST['date'];
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



		$sql="INSERT INTO `admin`(`admin_id`,`username`, `password`,`date`,`firstname`, `lastname`,`middlename`,`birthdate`, `birthplace`,`gender`,`home_address`, `current_address`,`civil_status`,`mobile_number`,`email`) 

		VALUES('$admin_id','$username','$password','$date','$fname','$lname','$mname','$bdate','$bplace','$gender','$home_address','$current_address',
		'$civil_status','$mobile','$email')";
	  mysqli_query($connection, $sql);
	  echo "<script>alert('Add Successful! ');document.location='add_admin.php'</script>";
			  

	}
?>