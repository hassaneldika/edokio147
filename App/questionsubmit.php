<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_POST['lEu9pSFrmo']) || !isset($_SESSION['id'])  || !isset($_POST['sessionid'])) {
		//echo "<script>window.location.replace('index.php');</script>";
		//exit();
	}
   // var_dump($_POST);
	include_once "service.php";
	$service = new Service();
	$sessionid = $_POST['sessionid'];
	$admin=$_POST['admin'];
	$numofquestions = 0;
	$numofcorrect = 0;
	$numofcredits = 0;
	// ANSWER CHECKING
	foreach ($_POST['question'] as $questionanswer) {
		//var_dump($questionanswer);
		$answerexploded = explode('-', $questionanswer);
		$questionid = $answerexploded[0];
		$answervalue = $answerexploded[1];
		$questiondetails = $service->getQuestionDetails($questionid);
		//var_dump($questiondetails);
		//echo "My questiondetails";
		//echo "<br>";
		if ($sessionid != $questiondetails['SessionId']) {
			$sessionid = $questiondetails['SessionId'];
		}
		if ($answervalue == $questiondetails['correctop']) {
			$numofcorrect++;
			$UserGrades=0;
			$UserGrades=$questiondetails['Grades'] + $UserGrades;
			//echo "ffffffff";
			//var_dump($UserGrades);
			//echo "<br>";
		}
		$numofquestions++;
	}
	$sessiondetails = $service->getSessionDetails($sessionid);
    // var_dump($sessiondetails);
	echo $numofcorrect."/".$numofquestions;
	echo "<br>";
	$examstatus = "F";
	if ($numofcorrect>=$sessiondetails['MinCorrectAnswers']) {
		 echo "Passed";
		$examstatus = "P";
		$numofcredits = $sessiondetails['SessionCredits'];
		// echo "<br>";
		$UserGrades=$UserGrades;
		$service->AssignGrade($_SESSION['id'],$sessionid,$numofcredits,$numofcorrect,$examstatus,$UserGrades,$admin);
	} else {
		echo "Failed";
		 echo "<br>";
		$UserGrades=0;
		//var_dump($UserGrades);
		//echo "Grades<br>";
		$service->AssignGrade($_SESSION['id'],$sessionid,$numofcredits,$numofcorrect,$examstatus,$UserGrades,$admin);
	}


	//$explodedname = explode('.', $_SESSION['txtEmail']);

	//$_SESSION['pharmacistname'] = $explodedname[0]." ".$explodedname[1];
	$_SESSION['examsessionname'] = $sessiondetails['SessionName'];
	$_SESSION['examsessionid'] = $sessiondetails['SessionId'];
	$_SESSION['examnumofcorrect'] = $numofcorrect;
	$_SESSION['examnumofquestions'] = $numofquestions;
	$_SESSION['examcredits'] = $numofcredits;
	$_SESSION['examstatus'] = $examstatus;
	//var_dump($_SESSION);
echo "<script>window.location.replace('examresults.php');</script>";
?>