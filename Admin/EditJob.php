<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_POST['lEu9pSFrmo']) || !isset($_SESSION['userid']) || !isset($_POST['JobName']) ||!isset($_POST['JobLink'])  || !isset($_POST['JobId'])) {
		echo "<script>window.location.replace('listofjobs.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$updatesql = "UPDATE Jobs SET JobName = :JobName,JobText=:JobText,JobLink=:JobLink WHERE JobId = :JobId;";
	$updatestmt = $conx->dbh->prepare($updatesql);
	$updatestmt->bindParam(":JobName", $_POST['JobName']);
	$updatestmt->bindParam(":JobText", $_POST['JobText']);
	$updatestmt->bindParam(":JobLink", $_POST['JobLink']);
	$updatestmt->bindParam(":JobId", $_POST['JobId']);
	$updatestmt->execute();
	echo "<script>alert('Job Updated!');</script>";
	echo "<script>window.location.replace('listofjobs.php');</script>";
?>