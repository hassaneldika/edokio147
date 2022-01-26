<?php



if (!isset($_POST['submit']) || !isset($_POST['Title']) || !isset($_POST['Overview']) || !isset($_POST['Module']) || !isset($_POST['Days']) || !isset($_POST['Level']) || !isset($_POST['Language']) || !isset($_POST['Category']) || !isset($_FILES['File'])) {
    echo "<script>window.location.replace('trainingsList.php');</script>";
    exit();
}

include("connect.php");

$conx = new Service;
$conx->connect();
$title = $_POST['Title'];
$overview = $_POST['Overview'];
$module = $_POST['Module'];
$d = $_POST['Days'];
$lvl = $_POST['Level'];
$lang = $_POST['Language'];
$category = $_POST['Category'];

if ($_FILES['File']['size'] > 0) {

    $targetDir = "Uploaded Files/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4');


    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = $_FILES['File']['name'];
    if (!empty($fileNames)) {

        // File upload path 
        $fileName = basename($_FILES['File']['name']);
        $title = $_POST['Title'];
        $targetFilePath = $targetDir . $fileName;

        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server 
            if (move_uploaded_file($_FILES["File"]["tmp_name"], $targetFilePath)) {
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
            $query = "INSERT INTO trainings (Title, Overview, NumberOfModules, Days, Level, Language, Category, File) VALUES (:Title,:Overview,:NbrOfModules,:d,:lvl,:lang,:Category,:fname);";
            $stmt = $conx->dbh->prepare($query);
            $stmt->bindParam(":Title", $title);
            $stmt->bindParam(":Overview", $overview);
            $stmt->bindParam(":NbrOfModules", $module);
            $stmt->bindParam(":d", $d);
            $stmt->bindParam(":lvl", $lvl);
            $stmt->bindParam(":lang", $lang);
            $stmt->bindParam(":Category", $category);
            $stmt->bindParam(":fname", $fileName);
            $stmt->execute();
            echo "<script>alert('Program Created Successfully!'); window.location.replace('trainingsList.php');</script>";

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
    echo "<script>alert('No File Found'); window.location.replace('trainingsList.php');</script>";
}
