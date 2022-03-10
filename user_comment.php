<?php

function setComments($openconnection) {
	if (isset($_POST['commentSubmit'])) {
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		$post_id = $_POST['post_id'];
		$sql = "INSERT INTO tbl_comments (comment_name, date, comments, post_id) 
		VALUES ('$uid', '$date', '$message', '$post_id')";
		/*$sql1 = "SELECT * FROM tbl_comments WHERE post_id = '$post_id'";*/
		$result = $openconnection->query($sql);
	}
	
}

/*function getComments($openconnection) {
	if (isset($_POST['commentSubmit'])) {
	$post_id = $_POST['post_id'];
	$sql = "SELECT * FROM tbl_comments WHERE post_id = '$post_id'";
	$result = $openconnection->query($sql);
	while ($row = $result->fetch_assoc()) {
		echo "<div class='form-group'>";
		echo	"<div class='container-comment'>";
		echo		"<div class='text-container-comment'><strong>";
		echo 			$row['comment_name'];
		echo "</strong> / <small>";
		echo $row['date'];
		echo "</small></div>";
		echo "</div>";
		echo "<h6 style='font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 14px;'>";
		echo nl2br($row['comments']);
		echo "</h6></div>";
	}	 
}*/
