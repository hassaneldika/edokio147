<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_POST['action']) || !isset($_SESSION['userid']) || !isset($_POST['sessionid']) || !isset($_POST['sessionname']) || !isset($_POST['eventid']) || !isset($_POST['sessioncorrectanswer']) || !isset($_POST['sessioncredits'])) {
		//echo "<script>window.location.replace('Sessionslist.php');</script>";
		//exit();
	}
	var_dump($_POST);
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$updatesql = "UPDATE session SET SessionName = :sname, MinCorrectAnswers = :minanswers, SessionCredits = :credits, EventId = :eid WHERE SessionId = :sid;";
	$updatestmt = $conx->dbh->prepare($updatesql);
	$updatestmt->bindParam(":sname", $_POST['sessionname']);
	$updatestmt->bindParam(":minanswers", $_POST['sessioncorrectanswer']);
	$updatestmt->bindParam(":credits", $_POST['sessioncredits']);
	$updatestmt->bindParam(":eid", $_POST['eventid']);
	$updatestmt->bindParam(":sid", $_POST['sessionid']);
	$updatestmt->execute();
?>