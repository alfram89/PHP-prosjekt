<?php

	include_once 'dbh.inc.php';

if(isset($_POST) & !empty($_POST)){
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$sql = "SELECT * FROM `users` WHERE user_uid = '$uid'";
	$res = mysqli_query($conn, $sql);


	$count = mysqli_num_rows($res);


if ($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['user_pwd'];
		$to = $r['user_email'];
		$subject = "Your Recovered Password";

		$message = "Please use this password to login " . $password;
		$headers = "From : test@ntnu.com";
		//echo "<p>$r</p>"
	if(mail($to, $subject, $message, $headers)){
			echo "Your Password has been sent to your email id<br>";
			echo "Mailen er sendt " . mail($to, $subject, $message);
		}else{
			echo "Failed to Recover your password, try again";
		}

	}else{
		echo "User name does not exist in database";
	}

}
