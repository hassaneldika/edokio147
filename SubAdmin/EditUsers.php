<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_POST['lEu9pSFrmo']) || !isset($_SESSION['userid']) || !isset($_POST['email']) || !isset($_POST['id'])) {
		echo "<script>window.location.replace('listofusers.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$updatesql = "UPDATE tblusers SET email = :email,password=:password WHERE id = :id;";
	$updatestmt = $conx->dbh->prepare($updatesql);
	$updatestmt->bindParam(":email", $_POST['email']);
	$updatestmt->bindParam(":password", $_POST['password']);
	
	$updatestmt->bindParam(":id", $_POST['id']);
	$updatestmt->execute();
	echo "<script>alert('User Updated!');</script>";
	echo "<script>window.location.replace('listofusers.php');</script>";
?>