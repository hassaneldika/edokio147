<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_SESSION['userid']) || !isset($_REQUEST['eventid'])) {
		echo "<script>window.location.replace('Eventlist.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$deletesql = "DELETE FROM event WHERE EventId=:eid";
	$deletestmt = $conx->dbh->prepare($deletesql);
	$deletestmt->bindParam(":eid", $_REQUEST['eventid']);
	$deletestmt->execute();
	echo "<script>alert('Event Deleted.');</script>";
	echo "<script>window.location.replace('Eventlist.php');</script>";
?>