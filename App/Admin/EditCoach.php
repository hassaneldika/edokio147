<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_POST['lEu9pSFrmo']) || !isset($_SESSION['userid']) || !isset($_POST['AdminName']) || !isset($_POST['AdminId'])) {
		echo "<script>window.location.replace('ModifyCoaches.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$updatesql = "UPDATE Admins SET AdminName = :AdminName,AdminPassword=:AdminPassword WHERE AdminId = :AdminId;";
	$updatestmt = $conx->dbh->prepare($updatesql);
	$updatestmt->bindParam(":AdminName", $_POST['AdminName']);
	$updatestmt->bindParam(":AdminPassword", $_POST['AdminPassword']);
	
	$updatestmt->bindParam(":AdminId", $_POST['AdminId']);
	$updatestmt->execute();
	echo "<script>alert('Coach Updated!');</script>";
	echo "<script>window.location.replace('ModifyCoaches.php');</script>";
?>