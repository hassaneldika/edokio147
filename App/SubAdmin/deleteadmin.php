<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_SESSION['userid']) || !isset($_REQUEST['AdminId'])) {
		echo "<script>window.location.replace('Eventlist.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$deletesql = "DELETE FROM Admins WHERE AdminId=:AdminId";
	$deletestmt = $conx->dbh->prepare($deletesql);
	$deletestmt->bindParam(":AdminId", $_REQUEST['AdminId']);
	$deletestmt->execute();
	echo "<script>alert('Coach Deleted.');</script>";
	echo "<script>window.location.replace('ModifyCoaches.php');</script>";
?>