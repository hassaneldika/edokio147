<?php if(count($_POST)>0) {
	if( $_POST["user_name"] == "admin" and $_POST["password"] == "admin") {
		$_SESSION["user_id"] = 1001;
		$_SESSION["user_name"] = $_POST["user_name"];
		$_SESSION['loggedin_time'] = time();  
	} else {
		$message = "Invalid Username or Password!";
	}
}

if(isset($_SESSION["user_id"])) {
	if(!isLoginSessionExpired()) {
		header("Location:index.php");
	} else {
		header("Location:logouttest.php?session_expired=1");
	}
}


function isLoginSessionExpired() {
	$login_session_duration = 10; 
	$current_time = time(); 
	if(isset($_SESSION['loggedin_time']) and isset($_SESSION["user_id"])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
			return true; 
		} 
	}
	return false;
}   ?>