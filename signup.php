<?php 

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		//save to database
			$admin_id = random_num(20);
			$query = "insert into admin (admin_id,username,password) values ('$admin_id','$username','$password')";

			mysqli_query($con, $query);
			echo "<script>alert('Account has been successfully registered.');";
			header("Location: login.php");
			die;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHINMA UPang Alumni Tracker | ADMIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/alumni_logo.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="login">
	<div class="center">
		<center><img class="logo" src="images/upang.png"></center>
		<form method="post">
			<div class="txt_field">
				<input type="text" name="username" required>
				<span></span>
				<label>Username</label>
			</div>
			<div class="txt_field">
				<input type="password" name="password" required>
				<span></span>
				<label>Password</label>
			</div>
			<input id="login" type="submit" value="SIGN UP">
			<center><br><a href="login.php" class="pass" style="text-decoration: none; color: #032708;">Already have an account?</a></center>
		</form>
	</div>
</body>
</html>