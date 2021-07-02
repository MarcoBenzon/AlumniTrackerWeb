<?php
	$openconnection=mysqli_connect("localhost","root","","alumnitracker");
	if (!$openconnection) {
		die("Failed connecting to MySQL: ".mysqli_connect_error());
		
		// "die" function terminates the execution of the page.
	}
?>