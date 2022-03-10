<?php

session_start();

if(isset($_SESSION['companyemail']))
{
	unset($_SESSION['companyemail']);

}

header("Location: companylogin.php");
die;