<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_SESSION['userid']) || !isset($_REQUEST['sessionid'])) {
		echo "<script>window.location.replace('listpresentationvideos.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$updatesql = "UPDATE session SET  videoname = NULL WHERE SessionId = :sid;";
	$deletestmt = $conx->dbh->prepare($updatesql);
	$deletestmt->bindParam(":sid", $_REQUEST['sessionid']);
	$deletestmt->execute();
	echo "<script>alert('Video Deleted.');</script>";
	echo "<script>window.location.replace('listpresentationvideos.php');</script>";
?>