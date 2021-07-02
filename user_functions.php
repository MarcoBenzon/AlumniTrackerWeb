<?php

function check_login($con)
{

	if(isset($_SESSION['studnum']))
	{

		$id = $_SESSION['studnum'];
		$query = "select * from alumni where studnum = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$admin_data = mysqli_fetch_assoc($result);
			return $admin_data;
		}
	}

	//redirect to login
	header("Location: user_login.php");
	die;

	if (isset($_POST['save'])) {
		$id = $_POST['id'];
		$picture = $_POST['picture'];

		$query= "INSERT INTO alumnitracker(product_id) 
			VALUES('$picture') WHERE id = $id"; 

			$query_run = mysqli_query($connection,$query);
			header('location: user_profile.php');
	}
}