<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_SESSION['userid']) || !isset($_REQUEST['qid'])) {
	echo "<script>window.location.replace('Sessionslist.php');</script>";
	exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$deletesql = "DELETE FROM questiontbl WHERE qid=:qid";
	$deletestmt = $conx->dbh->prepare($deletesql);
	$deletestmt->bindParam(":qid", $_REQUEST['qid']);
	$deletestmt->execute();
	echo "<script>alert('Question Deleted.');</script>";
	echo "<script>window.location.replace('ExamDetails.php?SessionId=".$_REQUEST['sessionid']."');</script>";
?>