<?php
if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['userid']) || !isset($_POST['Title']) || !isset($_POST['BodyText'])) {
	echo "<script>window.location.replace('feedbacks.php');</script>";
	exit();
}
include("connect.php");
$conx = new Service;
$conx->connect();
$T_id = $_POST['Training_Id'];
if(isset($_POST['edit'])){
// $cont=trim($_POST['BodyText']);

$updatesql = "UPDATE feedback SET Title = :Title , BodyText = :BodyText WHERE Id = :Id;";
$updatestmt = $conx->dbh->prepare($updatesql);
$updatestmt->bindParam(":Title", $_POST['Title']);
$updatestmt->bindParam(":BodyText", $_POST['BodyText']);
$updatestmt->bindParam(":Id", $_POST['Id']);

$updatestmt->execute();
echo "<script>alert('Feedback Updated!');</script>";

}

if (isset($_POST['upload']) && isset($_FILES['files'])) {

	$targetDir = "Uploaded Files/";
	$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');


	$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
	$fileNames = array_filter($_FILES['files']['name']);
	if (!empty($fileNames)) {
		foreach ($_FILES['files']['name'] as $key => $val) {
			// File upload path 
			$fileName = basename($_FILES['files']['name'][$key]);
			$id = $_POST['Id'];
			$targetFilePath = $targetDir . $fileName;

			// Check whether file type is valid 
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			if (in_array($fileType, $allowTypes)) {
				// Upload file to server 
				if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
					// Image db insert sql 
					$insertValuesSQL .= "('". $id . "','" . $fileName . "'),";
				} else {
					$errorUpload .= $_FILES['files']['name'][$key] . ' | ';
				}
			} else {
				$errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
			}
		}

		// Error message 
		$errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
		$errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
		$errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

		if (!empty($insertValuesSQL)) {
			$insertValuesSQL = trim($insertValuesSQL, ',');
			// Insert image file name into database 
			
				$insert = $conx->dbh->prepare("INSERT INTO uploadedfiles (feedback_id,file_url) VALUES $insertValuesSQL");
				$insert->execute();
			
			// if ($insert) {
			// 	$statusMsg = "Files are uploaded successfully." . $errorMsg;
			// } else {
			// 	$statusMsg = "Sorry, there was an error uploading your file.";
			// }
		} else {
			$statusMsg = "Upload failed! " . $errorMsg;
		}
	} else {
		$statusMsg = 'Please select a file to upload.';
	}
	echo "<script>alert('Files Uploaded!');</script>";
	// echo "<pre>";
	// print_r($_FILES['my_image']);
	// echo "</pre>";

	// $img_name = $_FILES['my_image']['name'];
	// $img_size = $_FILES['my_image']['size'];
	// $tmp_name = $_FILES['my_image']['tmp_name'];
	// $error = $_FILES['my_image']['error'];

	// if ($error == 0) {
	// 	$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
	// 	$img_ex_lc = strtolower($img_ex);

	// 	$allowed_exs = array("jpg", "jpeg", "png");

	// 	if (in_array($img_ex_lc, $allowed_exs)) {
	// 		$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
	// 		$img_upload_path = 'uploaded-images/' . $new_img_name;
	// 		move_uploaded_file($tmp_name, $img_upload_path);

	// 		// Insert into Database
	// 		$sql = "INSERT INTO images(image_url) VALUES('$new_img_name')";
	// 		$stmt = $conx->dbh->prepare($sql);
	// 		$stmt->execute();
	// 		header("Location: feedbacks.php");
	// 	} else {
	// 		$em = "You can't upload files of this type";
	// 		header("Location: feedbacks.php?error=$em");
	// 	}
	// } else {
	// 	$em = "unknown error occurred!";
	// 	header("Location: feedbacks.php?error=$em");
	// }
}

echo "<script>window.location.replace('feedbacks.php?Id=$T_id');</script>";
