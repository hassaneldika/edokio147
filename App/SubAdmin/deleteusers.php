<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_SESSION['userid']) || !isset($_REQUEST['id'])) {
		echo "<script>window.location.replace('listofusers.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$deletesql = "DELETE FROM tblusers WHERE id=:id";
	$deletestmt = $conx->dbh->prepare($deletesql);
	$deletestmt->bindParam(":id", $_REQUEST['id']);
	$deletestmt->execute();
	echo "<script>alert('user Deleted.');</script>";
	echo "<script>window.location.replace('listofusers.php');</script>";
?>