<?php

	if (isset($_POST['loginsubmit'])) {
		include_once"Admin/connect.php";
		session_start();
	
		$password=$_POST['txtpassword'];
  // Function Time OUT
function isLoginSessionExpired() {
	$login_session_duration = 1; 
	$current_time = time(); 
	if(isset($_SESSION['loggedin_time']) and isset($_SESSION["id"])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
			return true; 
		} 
	}
	return false;
} 
// End The Function
		

		$sql = "SELECT * FROM tblusers WHERE password = :password ";
		$serviceinstance = new Service();
		$serviceinstance->connect();
		$stmt = $serviceinstance->dbh->prepare($sql);
	
		$stmt->bindParam(':password',$password);
		$stmt->execute();
		$userdetails = $stmt->fetch();
       //  var_dump($userdetails);
	
		if (empty($userdetails)) {
	echo '<script type="text/javascript">alert("Error in Phone Number! ");window.location.href="login.php";</script>';
			// echo '<script type="text/javascript">alert("Error in Phone Number!");</script>';
		} else {
			$_SESSION['id']=$userdetails['id'];

			if ($userdetails['admin'] != 0) {
				$_SESSION['admin'] = $userdetails['admin'];
			} else {
				$_SESSION['admin'] = 0;
			}
			$Destination=$_SERVER['HTTP_REFERER'];
			$_SESSION['loggedin_time'] = time();
			
			if(isset($_SESSION["id"])) {
	if(!isLoginSessionExpired()) {
		// var_dump($_SESSION);
		$admin=$_SESSION['admin'];
		$conx = new Service;
				$conx->connect();

				$stmt = $conx->dbh->prepare("SELECT * FROM Admins WHERE  AdminId=:AdminId  ");
				$stmt->bindParam(":AdminId",$admin);
				$stmt->execute();
				$result = $stmt->fetchAll();
				var_dump($result);
				if ($result[0]['AdminStatus']==1) {
					echo '<script> 
			 window.location.href="examsessions.php"</script>';

					// echo "Hi";
				}
				else
				{
								echo '<script> alert("Sorry your access is expired !!");
			 window.location.href="index.php"</script>';
			  exit();
					echo "yes";
				}

	} else {
		echo '<script> 
		alert("kindly login again!!"); window.location.href="login.php"</script>';
	}
} 
		

			//echo "done";

		}
	}
	
	// LINK
	//https://phppot.com/php/user-login-session-timeout-logout-in-php/
?>