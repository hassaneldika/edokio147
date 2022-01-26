<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_SESSION['userid']) || !isset($_REQUEST['AdminId'])) {
		echo "<script>window.location.replace('ModifyCoaches.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$activatesql = "UPDATE event SET AdminStatus = 0 WHERE AdminId = :AdminId;";
	$activatestmt = $conx->dbh->prepare($activatesql);
	$activatestmt->bindParam(":AdminId", $_REQUEST['AdminId']);
	$activatestmt->execute();
	echo "<script>alert('Coach Deactivated.');</script>";
	echo "<script>window.location.replace('ModifyCoaches.php');</script>";
?>