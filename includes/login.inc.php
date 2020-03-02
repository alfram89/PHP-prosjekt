

<?php

session_start();

#forste if
if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';

	$uid = mysqli_real_escape_string( $conn , $_POST['uid'] );
	$pwd = mysqli_real_escape_string( $conn , $_POST['pwd'] );

	//Error sjekkere
	//input er tomme
	#andre if
	if (empty($uid) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
	}/*andre else*/ else {
		$sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		#tredje if
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		}/*tredje else*/ else {
			#fjerde if
			if ($row = mysqli_fetch_assoc($result)) {
				//de-hashing passordet
				$hashedPwdCheck = password_verify($pwd , $row['user_pwd']);
				#femte if
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				} /*femte else*/ elseif ($hashedPwdCheck == true) {
					//logg inn bruker her
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}
	}
}/*forste else*/ else {
	header("Location: ../index.php?login=error");
	exit();
}