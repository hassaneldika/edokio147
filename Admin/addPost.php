<?php
include("connect.php");
$conx = new Service;
$conx->connect();
$Title = $_POST['Title'];
$Content = $_POST['Content'];
$date = date("Y-m-d");

if (isset($_POST['new_post']) && isset($_POST['Title']) && isset($_POST['Content'])) {



	// if ($sql) {
	// 	echo "<script>alert('Post Created Successfully!');</script>";
	// }
	if ($_FILES['files']['size'] > 0) {

		$targetDir = "Posts Images/";
		$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4');


		$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
		$fileNames = $_FILES['files']['name'];
		if (!empty($fileNames)) {

			// File upload path 
			$fileName = basename($_FILES['files']['name']);
			$title = $_POST['Title'];
			$targetFilePath = $targetDir . $fileName;

			// Check whether file type is valid 
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			if (in_array($fileType, $allowTypes)) {
				// Upload file to server 
				if (move_uploaded_file($_FILES["files"]["tmp_name"], $targetFilePath)) {
					// Image db insert sql 
					$insertValuesSQL .= "('" . $title . "','" . $fileName . "'),";
				} else {
					$errorUpload .= $_FILES['files']['name'] . ' | ';
				}
			} else {
				$errorUploadType .= $_FILES['files']['name'] . ' | ';
			}


			// Error message 
			$errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
			$errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
			$errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

			if (!empty($insertValuesSQL)) {
				$insertValuesSQL = trim($insertValuesSQL, ',');
				// Insert image file name into database 
				$query1 = "INSERT INTO posts (Title, Content, Date, file_url) VALUES (:title,:content,:d,:fname);";
				$insert = $conx->dbh->prepare($query1);
				$insert->bindParam(":title", $Title);
				$insert->bindParam(":content", $Content);
				$insert->bindParam(":d", $date);
				$insert->bindParam(":fname", $fileName);
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
	} else {
		$query0 = "INSERT INTO posts (Title, Content, Date) VALUES (:title,:content,:d);";
		$sql = $conx->dbh->prepare($query0);
		$sql->bindParam(":title", $Title);
		$sql->bindParam(":content", $Content);
		$sql->bindParam(":d", $date);
		$sql->execute();
	}

	// if ($sql) {
	// 	echo "<script>alert('Post Created Successfully!');</script>";
	// }
	// echo "<script>alert('Uploaded Successfully!');</script>";
}
//echo "<script>window.location.replace('createPost.php');</script>";
header('Location: posts.php');
