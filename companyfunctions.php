<?php

function check_login($con)
{

	if(isset($_SESSION['companyemail']))
	{

		$id = $_SESSION['companyemail'];
		$query = "select * from company where companyemail = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$company_data = mysqli_fetch_assoc($result);
			return $company_data;
		}
	}

	//redirect to login
	header("Location: companylogin.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}