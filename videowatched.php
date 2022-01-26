<?php
	if (!isset($_SESSION)) {session_start();}
	if (!isset($_SESSION['userid']) || !isset($_SESSION['videostart']) || $_SESSION['videostart'] != 'started') {
		echo "<script>window.location.replace('index.php');</script>";
		exit();
	} else {
		unset($_SESSION['videostart']);
		$_SESSION['videowatched'] = 'watched';
	}
?>