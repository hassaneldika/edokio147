<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_POST['action']) || !isset($_SESSION['userid']) || !isset($_POST['sessionid']) || !isset($_POST['videoname'])) {
		echo "<script>window.location.replace('listpresentationvideos.php');</script>";
		exit();
	}
	var_dump($_POST);
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$updatesql = "UPDATE session SET  videoname = :videoname, VideoText = :VideoText WHERE SessionId = :sid;";
	$updatestmt = $conx->dbh->prepare($updatesql);
	$updatestmt->bindParam(":videoname", $_POST['videoname']);
	$updatestmt->bindParam(":VideoText", $_POST['VideoText']);
	$updatestmt->bindParam(":sid", $_POST['sessionid']);
	$updatestmt->execute();

?>