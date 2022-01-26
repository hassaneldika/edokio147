<?php
if (!isset($_SESSION)) {
	session_start();
}
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
//var_dump($_POST);

if (isset($_POST['youtube'])) {
	$youtube = $_POST['youtube'];
} else {
	$youtube = 'NULL';
}
if (isset($_POST['PDF'])) {
	$PDF = $_POST['PDF'];
} else {
	$PDF = 'NULL';
}


$ftp_host = 'ftp.edokio.com';
$ftp_user_name = 'UploadPics';
$ftp_user_pass = 'Upload@123';
// var_dump($ftp_host);
$connect_it = ftp_connect($ftp_host);
$login_result = ftp_login($connect_it, $ftp_user_name, $ftp_user_pass);
//   var_dump($_POST);



if ($_FILES["filename"]["size"] > 0) {
	$image = pathinfo($_FILES["filename"]["name"]);
	$remote_file = $image['filename'] . '-' . time() . '.' . $image['extension'];
	$remote_file =  preg_replace('/[^A-Za-z0-9]/', '', $remote_file);
	$ImageName = $remote_file;
	var_dump($ImageName);
	$image = $_FILES['filename']['tmp_name'];

	$database_image_name = pathinfo($_FILES["filename"]["name"]);

	$database_image_name = $database_image_name['filename'] . '_' . time() . '.' . $database_image_name['extension'];

	ftp_pasv($connect_it, true);
	$bool1_response = ftp_put($connect_it, $remote_file, $image, FTP_BINARY);
} else {
	$ImageName = 'NULL';
}


// if ($_FILES["PDF"]["size"] > 0) {
// 	$PDF = pathinfo($_FILES["PDF"]["name"]);
// 	echo 'Here is the PDF';
// 	var_dump($PDF);
// 	$remote_file = $PDF['filename'].'-'.time().'.'.$PDF['extension'];
// 	echo 'Here is the remote_file';
// 	var_dump($remote_file);
// 	$PDF=$remote_file;
//     $image = $_FILES['filename']['tmp_name'];

//    $database_image_name = pathinfo($_FILES["PDF"]["name"]);

//    $database_image_name = $database_image_name['filename'].'_'.time().'.'.$database_image_name['extension'];

//    ftp_pasv($connect_it, true);
//    $bool1_response = ftp_put( $connect_it, $remote_file, $image, FTP_BINARY );
// }
// 	else{
// 		$PDF='NULL';
// 	}

$insertqry = 'INSERT INTO session (SessionName,MinCorrectAnswers,EventId,youtube,sessioncredits,ImageName,PDF) 
		VALUES (:SessionName,:minanswers,:EventId,:youtube,:sessioncredits,:ImageName,:PDF)';
$insertstmt = $conx->dbh->prepare($insertqry);
$insertstmt->bindParam(':SessionName', $_POST['SessionName']);
$insertstmt->bindParam(':minanswers', $_POST['minumberofanswers']);
$insertstmt->bindParam(':sessioncredits', $_POST['sessioncredits']);
$insertstmt->bindParam(':EventId', $_POST['EventId']);
$insertstmt->bindParam(':youtube', $youtube);
$insertstmt->bindParam(':ImageName', $ImageName);
$insertstmt->bindParam(':PDF', $PDF);

$insertstmt->execute();
echo "<script>alert('Courses added successfully!');</script>";
echo "<script>window.location.replace('Sessionslist.php');</script>";

var_dump($_POST);
