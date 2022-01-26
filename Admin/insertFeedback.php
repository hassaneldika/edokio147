<?php



if (!isset($_POST['submit']) || !isset($_POST['Title']) || !isset($_POST['BodyText'])) {
    echo "<script>window.location.replace('trainingsList.php');</script>";
    exit();
}

include("connect.php");




$conx = new Service;
$conx->connect();
$id = $_POST['Id'];
$query = "INSERT INTO feedback (Id,Title,BodyText,Training_Id) VALUES (NULL,:title,:bodytext,:Training_Id);";
$stmt = $conx->dbh->prepare($query);
$stmt->bindParam(":title", $_POST['Title']);
$stmt->bindParam(":bodytext", $_POST['BodyText']);
$stmt->bindParam(":Training_Id", $id);
$stmt->execute();

if (isset($_POST['submit']) && isset($_FILES['files'])) {

    $targetDir = "Uploaded Files/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');


    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames)) {
        foreach ($_FILES['files']['name'] as $key => $val) {
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]);
            $title = $_POST['Title'] ;
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server 
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                    // Image db insert sql 
                    $insertValuesSQL .= "('" . $title . "','" . $fileName . "'),";
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

            $insert = $conx->dbh->prepare("INSERT INTO uploadedfiles (Title,file_url) VALUES $insertValuesSQL");
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
    header("Location: trainingsList.php");
}
echo "<script>alert('Section Added! Check View Feedbacks');  window.location.replace('trainingsList.php');</script>";
