<?php
	session_start();
			include("connect.php");
		$conx = new Service;
		$conx->connect();
		$txtusername=$_POST['txtusername'];
		$txtpassword=$_POST['txtpassword'];
		var_dump($_POST);
				$insertqry = "SELECT * FROM Admins WHERE AdminName = :AdminName AND AdminPassword = :AdminPassword AND AdminStatus=1";
				$conx->connect();
		$insertstmt = $conx->dbh->prepare($insertqry);
		
				$insertstmt->bindParam(":AdminName",$txtusername);
				$insertstmt->bindParam(":AdminPassword",$txtpassword);

				$insertstmt->execute();
				$result = $insertstmt->fetchAll();
			//	var_dump($result);
			$UserName=$result[0]['AdminName'];
			$Password=$result[0]['AdminPassword'];
			$ID=$result[0]['AdminId'];
	if($_POST['txtusername'] == $UserName && $_POST['txtpassword'] == $Password)
	{  
		//echo "HI";
		 //echo $_POST;
		$_SESSION['userid'] = $ID;
		header("Location:Eventlist.php");
		//echo "hiiiii";
	}
	else header("Location:login.php");
?>