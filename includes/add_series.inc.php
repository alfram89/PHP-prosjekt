<?php
session_start();
/**/
if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$uid = $_SESSION['u_id'];
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $service = mysqli_real_escape_string($conn, $_POST['service']);
  $dice = mysqli_real_escape_string($conn, $_POST['dice']);
  $season_count = mysqli_real_escape_string($conn, $_POST['season_count']);
  $season_seen = mysqli_real_escape_string($conn, $_POST['season_seen']);
	$active_series = mysqli_real_escape_string($conn, $_POST['active_series']);
  $season_next = mysqli_real_escape_string($conn, $_POST['season_next']);
  $series_link = mysqli_real_escape_string($conn, $_POST['series_link']);

	if (!isset($uid)) {
		header("Location: ../add_series.php?add_series=uid");
		exit();
	}
	else {
    $sql = "INSERT INTO serie (uid, title, service, dice, season_count, season_seen, active_series, season_next, series_link) VALUES ('$uid','$title','$service','$dice','$season_count','$season_seen','$active_series','$season_next','$series_link');";
		mysqli_real_query($conn, $sql);
		header("Location: ../add_series.php?add_series='$sql'");
		exit();
		}
	}
