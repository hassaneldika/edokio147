<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_POST['action']) || !isset($_SESSION['userid']) || !isset($_POST['sessionid']) || !isset($_POST['videoname'])) {
		echo "<script>window.location.replace('listpresentationvideos.php');</script>";
		exit();
	}
	//var_dump($_POST);
	$VideoText=str_replace("\n","<br>", $_POST['VideoText']);
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	$updatesql = "UPDATE session SET  videoname = :videoname,youtube=:youtube, VideoText = :VideoText,direction=:direction,PDF=:PDF WHERE SessionId = :sid;";
	$updatestmt = $conx->dbh->prepare($updatesql);
	$updatestmt->bindParam(":videoname", $_POST['videoname']);
	$updatestmt->bindParam(":VideoText", $VideoText);
	$updatestmt->bindParam(":youtube", $_POST['youtube']);
	$updatestmt->bindParam(":direction", $_POST['direction']);
	$updatestmt->bindParam(":PDF", $_POST['PDF']);
	$updatestmt->bindParam(":sid", $_POST['sessionid']);
	$updatestmt->execute();

?>