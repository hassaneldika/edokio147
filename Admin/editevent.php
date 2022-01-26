<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_POST['lEu9pSFrmo']) || !isset($_SESSION['userid']) || !isset($_POST['eventname']) || !isset($_POST['eventid'])) {
		echo "<script>window.location.replace('Eventlist.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$updatesql = "UPDATE event SET EventName = :name,EventOrder=:EventOrder  WHERE EventId = :eid;";
	$updatestmt = $conx->dbh->prepare($updatesql);
	$updatestmt->bindParam(":name", $_POST['eventname']);
	$updatestmt->bindParam(":EventOrder", $_POST['EventOrder']);
	
	$updatestmt->bindParam(":eid", $_POST['eventid']);
	$updatestmt->execute();
	echo "<script>alert('Module Updated!');</script>";
	echo "<script>window.location.replace('Eventlist.php');</script>";
?>