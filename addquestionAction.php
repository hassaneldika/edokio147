<?php
	//var_dump($_POST);

	if (!isset($_SESSION)) {session_start();}
	if (!isset($_POST) || !isset($_SESSION['userid'])) {
		echo "<script>window.location.replace('Sessionslist.php');</script>";
		exit();
	} else if ($_POST['SessionId'] == 0) {
		echo "<script>alert('Please select a session');</script>";
		echo "<script>window.location.replace('addquestion.php');</script>";
		exit();
	}

	if(isset($_POST['submit']))	{
		include("connect.php");
		$conx = new Service;
		$conx->connect();
		$SessionId = $_POST['SessionId'];
		$questionname=$_POST['questionname'];
		$Grades=$_POST['Grades'];
		$op1=$_POST['op1'];
		$op2=$_POST['op2'];
		$op3=$_POST['op3'];
		$op4=$_POST['op4'];
		$correctop=$_POST['correctop'];
		$insertqry = 'INSERT INTO questiontbl (SessionId,Grades,questionname,op1,op2,op3,op4,correctop) VALUES (:SessionId,:Grades,:questionname,:op1,:op2,:op3,:op4,:correctop)';
		$conx->connect();
		$insertstmt = $conx->dbh->prepare($insertqry);
		$insertstmt->bindParam(':SessionId', $_POST['SessionId']);
		$insertstmt->bindParam(':Grades', $_POST['Grades']);
		$insertstmt->bindParam(':questionname', $_POST['questionname']);
		$insertstmt->bindParam(':op1', $_POST['op1']);
		$insertstmt->bindParam(':op2', $_POST['op2']);
		$insertstmt->bindParam(':op3', $_POST['op3']);
		$insertstmt->bindParam(':op4', $_POST['op4']);
		$insertstmt->bindParam(':correctop', $_POST['correctop']);
		$insertstmt->execute();
		echo "<script>alert('Question added successfully!');</script>";
		echo "<script>window.location.replace('ExamDetails.php?SessionId=".$_POST['SessionId']."');</script>";
	}
?>