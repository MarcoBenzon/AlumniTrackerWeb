<?php 

// session_start();

	include("connection.php");
	include("functions.php");
	include("controllerAdminData.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		//read from database
			$query = "select * from admin where username = '$username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$admin_data = mysqli_fetch_assoc($result);
					
					if($admin_data['password'] === $password)
					{

						$_SESSION['admin_id'] = $admin_data['admin_id'];
						header("Location: index.php");
						die;
					}
					else{
						echo "<script>alert('Username and Password mismatched!');</script>";
					}
				}
				else{
					echo "<script>alert('Username cannot be found!');</script>";
				}
			}
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
			<div class="pass"><a href="admin_forgot-password.php" style="text-decoration: none; color: #032708;">Forgot Password?</a></div>
			<input id="login" type="submit" name="submit" value="LOG IN"><br>
			<center><br><a href="signup.php" class="pass" style="text-decoration: none; color: #032708;">Don't have an account?</a></center>
		</form>
	</div>
</body>
</html>