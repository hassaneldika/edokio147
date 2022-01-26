<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_SESSION['userid']) || !isset($_REQUEST['JobId'])) {
		echo "<script>window.location.replace('Eventlist.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$deletesql = "DELETE FROM Jobs WHERE JobId=:JobId";
	$deletestmt = $conx->dbh->prepare($deletesql);
	$deletestmt->bindParam(":JobId", $_REQUEST['AdminId']);
	$deletestmt->execute();
	echo "<script>alert('Job Deleted.');</script>";
	echo "<script>window.location.replace('listofjobs.php');</script>";
?>