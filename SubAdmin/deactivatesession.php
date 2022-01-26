<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_SESSION['userid']) || !isset($_REQUEST['sessionid'])) {
		echo "<script>window.location.replace('Sessionslist.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$activatesql = "UPDATE session SET SessionStatus = 0 WHERE SessionId = :sid;";
	$activatestmt = $conx->dbh->prepare($activatesql);
	$activatestmt->bindParam(":sid", $_REQUEST['sessionid']);
	$activatestmt->execute();
	echo "<script>alert('Presentation Deactivated.');</script>";
	echo "<script>window.location.replace('Sessionslist.php');</script>";
?>