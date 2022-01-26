<?php
	session_start();
	if($_POST['txtusername'] == 'Edokio' && $_POST['txtpassword'] == '2020')
	{
		$_SESSION['userid'] = 21;
		header("Location:Eventlist.php");
	}
	else header("Location:login.php");
?>