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
		$password = md5($password);
	
		
		  
		$secret = '6LdubaAeAAAAAEpgqRFOJNMIJMk10o4Vyoeyb236';
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);

		//attempt to login
		$max_time_in_seconds = 10;
		$attempt = 0;
		$disable = '';
		if(isset($_SESSION['attempt']) && $_SESSION['attempt'] >= 3){
			$disable = 'disabled';
		}
		//read from database
			$query = "select * from admin where username = '$username' limit 1";
			$result = mysqli_query($con, $query);
			if ($responseData->success) {
				if($result )
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$admin_data = mysqli_fetch_assoc($result);
					
					if($admin_data['password'] === $password)
					{

						$_SESSION['admin_id'] = $admin_data['admin_id'];
						setcookie('admin', 'abc', time()+50); 	
						header("Location: index.php");
						die;
					}
					else{
						$attempt++;
						if($attempt > 3){
							echo "<script>alert('You have exceeded the maximum number of login attempts.');</script>";
							
						}
						else{
							echo "<script>alert('Invalid username or password.');</script>";
							
						}
					}
				//echo "<script>alert('Username and Password mismatched!');</script>";
					
				}
				else{
					$attempt++;
						if($attempt > 3){
							echo "<script>alert('You have exceeded the maximum number of login attempts.');</script>";
							
						}
						else{
							echo "<script>alert('Invalid username or password.');</script>";
							
						}
					//echo "<script>alert('Username cannot be found!');</script>";
				}
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
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
			<div class="g-recaptcha" data-sitekey="6LdubaAeAAAAALJ_frZlXf3qwOyf5C6XmP6xh1g5"></div>
			<br>
			<div class="pass"><a href="admin_forgot-password.php" style="text-decoration: none; color: #032708;">Forgot Password?</a></div>
			<input id="login" type="submit" name="submit" value="LOG IN" ><br>
			<center><br><a href="signup.php" class="pass" style="text-decoration: none; color: #032708;">Don't have an account?</a></center>
		</form>
	</div>
</body>
</html>