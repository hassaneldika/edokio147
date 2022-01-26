<?php 
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_POST) || !isset($_SESSION['userid'])) {
		echo "<script>window.location.replace('Sessionslist.php');</script>";
		exit();
	} else if ($_POST['EventId'] == 0) {
		echo "<script>alert('Please select a Presentation');</script>";
		echo "<script>window.location.replace('addSession.php');</script>";
		exit();
	}
	include("connect.php");
	$conx = new Service;
	$conx->connect();
	if(isset($_POST['submit']))	{  
		if (isset($_POST['youtube'])) {
			$insertqry = 'INSERT INTO session (SessionName,MinCorrectAnswers,EventId,youtube,sessioncredits) VALUES (:SessionName,:minanswers,:EventId,:youtube,:sessioncredits)';
		$insertstmt = $conx->dbh->prepare($insertqry);
		$insertstmt->bindParam(':SessionName', $_POST['SessionName']);
		$insertstmt->bindParam(':minanswers', $_POST['minumberofanswers']);
		$insertstmt->bindParam(':sessioncredits', $_POST['sessioncredits']);
		
		$insertstmt->bindParam(':EventId', $_POST['EventId']);
		$insertstmt->bindParam(':youtube', $_POST['youtube']);
		$insertstmt->execute();
		echo "<script>alert('Courses added successfully!');</script>";
		echo "<script>window.location.replace('Sessionslist.php');</script>";		}

		else
		{
		$insertqry = 'INSERT INTO session (SessionName,MinCorrectAnswers,EventId,videoname,sessioncredits) VALUES (:SessionName,:minanswers,:EventId,:videoname,:sessioncredits)';
		$insertstmt = $conx->dbh->prepare($insertqry);
		$insertstmt->bindParam(':SessionName', $_POST['SessionName']);
		$insertstmt->bindParam(':minanswers', $_POST['minumberofanswers']);
		$insertstmt->bindParam(':sessioncredits', $_POST['sessioncredits']);
		
		$insertstmt->bindParam(':EventId', $_POST['EventId']);
		$insertstmt->bindParam(':videoname', $_POST['videoname']);
		$insertstmt->execute();
		echo "<script>alert('Courses added successfully!');</script>";
		echo "<script>window.location.replace('Sessionslist.php');</script>";
	}

	}
?>