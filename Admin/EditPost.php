<?php
if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['userid']) || !isset($_POST['Title']) || !isset($_POST['Content'])) {
	echo "<script>window.location.replace('posts.php');</script>";
	exit();
}
include("connect.php");
$conx = new Service;
$conx->connect();
if (isset($_POST['edit'])) {
	// $cont=trim($_POST['BodyText']);
	$date = date("Y-m-d");
	$updatesql = "UPDATE posts SET Title = :Title , Content = :Content , Date = :d WHERE Id = :Id;";
	$updatestmt = $conx->dbh->prepare($updatesql);
	$updatestmt->bindParam(":Title", $_POST['Title']);
	$updatestmt->bindParam(":Content", $_POST['Content']);
	$updatestmt->bindParam(":d", $date);
	$updatestmt->bindParam(":Id", $_POST['Id']);

	$updatestmt->execute();
	echo "<script>alert('Post Updated!');</script>";
} else {

	if (isset($_POST['upload']) && ($_FILES['file']['size'] > 0)) {



		$targetDir = "Posts Images/";
		$allowTypes = array('jpg', 'png', 'jpeg', 'gif');


		$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
		$fileNames = $_FILES['file']['name'];
		if (!empty($fileNames)) {

			// File upload path 
			$fileName = basename($_FILES['file']['name']);
			$title = $_POST['Title'];
			$targetFilePath = $targetDir . $fileName;

			// Check whether file type is valid 
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			if (in_array($fileType, $allowTypes)) {
				// Upload file to server 
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
					// Image db insert sql 
					$insertValuesSQL .= "('" . $title . "','" . $fileName . "'),";
				} else {
					$errorUpload .= $_FILES['file']['name'] . ' | ';
				}
			} else {
				$errorUploadType .= $_FILES['file']['name'] . ' | ';
			}


			// Error message 
			$errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
			$errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
			$errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

			if (!empty($insertValuesSQL)) {
				$insertValuesSQL = trim($insertValuesSQL, ',');
				// Insert image file name into database 

				// $insert = $conx->dbh->prepare("INSERT INTO uploadedfiles (Title,file_url) VALUES $insertValuesSQL");
				// $insert->execute();
				$query = $conx->dbh->prepare("UPDATE posts SET file_url = :file_url WHERE Id = :Id ;");
				$query->bindParam(":file_url", $fileName);
				$query->bindParam(":Id", $_POST['Id']);


				if (file_exists("Posts Images/" . $_POST['file_url'])) {
					$query->execute();

					$sql = $conx->dbh->prepare("SELECT count(*) FROM posts WHERE file_url = :f_url");
					$sql->bindParam(":f_url", $_POST['file_url']);
					$sql->execute();
					$result = $sql->fetchColumn();
					if ($result == 0)
						unlink("Posts Images/" . $_POST['file_url']);
				} else $query->execute();
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
	} else echo "<script>alert('No File Found');</script>";
}

echo "<script>window.location.replace('posts.php');</script>";
