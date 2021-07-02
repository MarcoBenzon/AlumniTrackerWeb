<?php

session_start();

if(isset($_SESSION['studnum']))
{
	unset($_SESSION['studnum']);

}

header("Location: user_login.php");
die;