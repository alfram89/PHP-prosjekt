<?php
/**/
if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$uid = $_SESSION['uid'];
  $title = mysqli_real_escape_string($conn, $_POST[‘title’]);
  $service = mysqli_real_escape_string($conn, $_POST[‘service’]);
  $dice = mysqli_real_escape_string($conn, $_POST[‘dice’]);
  $season_count = mysqli_real_escape_string($conn, $_POST[‘season_count’]);
  $season_seen = mysqli_real_escape_string($conn, $_POST[‘season_seen’]);
  $active_series = mysqli_real_escape_string($conn, $_POST[‘active_series’]);
  $season_next = mysqli_real_escape_string($conn, $_POST[‘season_next’]);
  $series_link = mysqli_real_escape_string($conn, $_POST[‘series_link’]);

	//Error handlers
	//Sjekk for tomme ruter
	if (empty($title) || empty($service) || empty($dice) || empty($season_count) || empty($season_seen)) {
		header("Location: ../add_series.php?add_series=empty");
		exit();
	} else {
		//sjekk om input er godtatt
		/*if (!preg_match("/^[a-zA-Z]*$/", $title)  || !preg_match("/^[a-zA-Z]*$/", $service) || !preg_match("/^[a-zA-Z]*$/", $season_next))  {
			header("Location: ../add_series.php?add_series=invalid");
			exit();
	}  else { */
		//sjekk om ¤¤ er godtatt
		/*if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ */
			$sql = "SELECT * FROM serie WHERE uid ='$uid' AND title = '$title'"
			$result = mysqli_query($conn, $sql);
			$resultCheck =mysqli_num_rows($result);
      if ($resultCheck > 0) {
        header("Location: ../add_series.php?add_series=usertaken");
        exit();
		 /* else {
			$sql = "SELECT * FROM users WHERE user_uid='$uid'";
			$result = mysqli_query($conn, $sql);
			$resultCheck =mysqli_num_rows($result); */
			}  else {
				//Hashing passord
			/*	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); */
				//legg inn bruker i databasen
				$sql = "INSERT INTO serie (uid, title, service, dice, season_count, season_seen, active_series, season_next, series_link)
								VALUES ('$uid', '$title', '$service', '$dice', '$season_count', '$season_seen', '$active_series', '$season_next', '$series_link');";
				mysqli_query($conn, $sql);
				header("Location: ../add_series.php?add_series=success");
				exit();

			}
		}
	}
	}

} else {
	header("Location: ../signup.php");
	exit();
}
