<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_SESSION['userid']) || !isset($_REQUEST['eventid'])) {
		echo "<script>window.location.replace('Eventlist.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$activatesql = "UPDATE event SET EventStatus = 1 WHERE EventId = :eid;";
	$activatestmt = $conx->dbh->prepare($activatesql);
	$activatestmt->bindParam(":eid", $_REQUEST['eventid']);
	$activatestmt->execute();
	echo "<script>alert('Conference Activated.');</script>";
	echo "<script>window.location.replace('Eventlist.php');</script>";
?>