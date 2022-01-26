<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_SESSION['userid']) || !isset($_REQUEST['sessionid'])) {
		echo "<script>window.location.replace('Sessionslist.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$deletesql = "DELETE FROM session WHERE SessionId=:sid";
	$deletestmt = $conx->dbh->prepare($deletesql);
	$deletestmt->bindParam(":sid", $_REQUEST['sessionid']);
	$deletestmt->execute();
	echo "<script>alert('Session Deleted.');</script>";
	echo "<script>window.location.replace('Sessionslist.php');</script>";
?>