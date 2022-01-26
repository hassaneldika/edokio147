<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_SESSION['userid']) || !isset($_POST)) {
		echo "<script>window.location.replace('Sessionslist.php');</script>";
		exit();
	}
	if (isset($_POST)) {
		include("connect.php");
		$conx = new Service;
		$conx->connect();
		$updatesql = "UPDATE questiontbl SET questionname = :qname,Grades=:Grades, op1 = :op1, op2 = :op2, op3 = :op3, op4 = :op4, correctop = :correctop, SessionId = :sid WHERE qid = :qid;";
		$updatestmt = $conx->dbh->prepare($updatesql);
		$updatestmt->bindParam(":Grades", $_POST['Grades']);
		$updatestmt->bindParam(":qname", $_POST['questionname']);
		$updatestmt->bindParam(":op1", $_POST['op1']);
		$updatestmt->bindParam(":op2", $_POST['op2']);
		$updatestmt->bindParam(":op3", $_POST['op3']);
		$updatestmt->bindParam(":op4", $_POST['op4']);
		$updatestmt->bindParam(":correctop", $_POST['correctop']);
		$updatestmt->bindParam(":sid", $_POST['SessionId']);
		$updatestmt->bindParam(":qid", $_POST['qid']);
		$updatestmt->execute();
		echo "<script>alert('Question info updated!');</script>";
		echo "<script>window.location.replace('ExamDetails.php?SessionId=".$_POST['SessionId']."');</script>";
	}
?>