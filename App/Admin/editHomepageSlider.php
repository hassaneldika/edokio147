<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['userid'])) {
    echo "<script>window.location.replace('homepage-images.php');</script>";
    exit();
}

include("connect.php");
$conx = new Service;
$conx->connect();
$link = $_POST['link'];
$link1 = $_POST['link1'];
$link2 = $_POST['link2'];
$id = $_POST['id'];
$id1 = $_POST['id1'];
$id2 = $_POST['id2'];
if (isset($_POST['edit'])) {
    $query = "UPDATE homepage_slider SET link = :link WHERE id = :id;";
    $update = $conx->dbh->prepare($query);
    $update->bindParam(":link", $link);
    $update->bindParam(":id", $id);

    $update->execute();
    echo "<script>alert('Link Updated!');</script>";
} else
if (isset($_POST['edit1'])) {
    $query = "UPDATE homepage_slider SET link = :link WHERE id = :id;";
    $update = $conx->dbh->prepare($query);
    $update->bindParam(":link", $link1);
    $update->bindParam(":id", $id1);

    $update->execute();
    echo "<script>alert('Link Updated!');</script>";
} else
if (isset($_POST['edit2'])) {
    $query = "UPDATE homepage_slider SET link = :link WHERE id = :id;";
    $update = $conx->dbh->prepare($query);
    $update->bindParam(":link", $link2);
    $update->bindParam(":id", $id2);

    $update->execute();
    echo "<script>alert('Link Updated!');</script>";
} else
if (isset($_POST['upload']) && ($_FILES['file']['size'] > 0)) {

    $targetDir = "homepageImages/";
    $allowTypes = array('jpg');


    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = $_FILES['file']['name'];
    if (!empty($fileNames)) {

        // File upload path 
        $fileName = basename($_FILES['file']['name']);
        $fileName = "banner1.jpg";
        $targetFilePath = $targetDir . $fileName;

        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server 
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // Image db insert sql 
                $insertValuesSQL .= "('" . $fileName . "'),";
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

            $query = $conx->dbh->prepare("UPDATE homepage_slider SET image = :image WHERE id = :id ;");
            $query->bindParam(":image", $fileName);
            $query->bindParam(":id", $id);


            if (file_exists("homepageImages/" . $_POST['oldFile'])) {
                $query->execute();

                $sql = $conx->dbh->prepare("SELECT count(*) FROM homepage_slider WHERE image = :image");
                $sql->bindParam(":image", $_POST['oldFile']);
                $sql->execute();
                $result = $sql->fetchColumn();
                if ($result == 0)
                    unlink("homepageImages/" . $_POST['oldFile']);
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
    echo "<script>alert('File Uploaded!');</script>";
} else
if (isset($_POST['upload1']) && ($_FILES['file1']['size'] > 0)) {

    $targetDir = "homepageImages/";
    $allowTypes = array('jpg');


    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = $_FILES['file1']['name'];
    if (!empty($fileNames)) {

        // File upload path 
        $fileName = basename($_FILES['file1']['name']);
        $fileName = "banner2.jpg";
        $targetFilePath = $targetDir . $fileName;

        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server 
            if (move_uploaded_file($_FILES["file1"]["tmp_name"], $targetFilePath)) {
                // Image db insert sql 
                $insertValuesSQL .= "('" . $fileName . "'),";
            } else {
                $errorUpload .= $_FILES['file1']['name'] . ' | ';
            }
        } else {
            $errorUploadType .= $_FILES['file1']['name'] . ' | ';
        }


        // Error message 
        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');

            $query = $conx->dbh->prepare("UPDATE homepage_slider SET image = :image WHERE id = :id ;");
            $query->bindParam(":image", $fileName);
            $query->bindParam(":id", $id1);


            if (file_exists("homepageImages/" . $_POST['oldFile1'])) {
                $query->execute();

                $sql = $conx->dbh->prepare("SELECT count(*) FROM homepage_slider WHERE image = :image");
                $sql->bindParam(":image", $_POST['oldFile1']);
                $sql->execute();
                $result = $sql->fetchColumn();
                if ($result == 0)
                    unlink("homepageImages/" . $_POST['oldFile1']);
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
    echo "<script>alert('File Uploaded!');</script>";
} else
if (isset($_POST['upload2']) && ($_FILES['file2']['size'] > 0)) {

    $targetDir = "homepageImages/";
    $allowTypes = array('jpg');


    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = $_FILES['file2']['name'];
    if (!empty($fileNames)) {

        // File upload path 
        $fileName = basename($_FILES['file2']['name']);
        $fileName = "banner3.jpg";
        $targetFilePath = $targetDir . $fileName;

        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server 
            if (move_uploaded_file($_FILES["file2"]["tmp_name"], $targetFilePath)) {
                // Image db insert sql 
                $insertValuesSQL .= "('" . $fileName . "'),";
            } else {
                $errorUpload .= $_FILES['file2']['name'] . ' | ';
            }
        } else {
            $errorUploadType .= $_FILES['file2']['name'] . ' | ';
        }


        // Error message 
        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');

            $query = $conx->dbh->prepare("UPDATE homepage_slider SET image = :image WHERE id = :id ;");
            $query->bindParam(":image", $fileName);
            $query->bindParam(":id", $id2);


            if (file_exists("homepageImages/" . $_POST['oldFile2'])) {
                $query->execute();

                $sql = $conx->dbh->prepare("SELECT count(*) FROM homepage_slider WHERE image = :image");
                $sql->bindParam(":image", $_POST['oldFile2']);
                $sql->execute();
                $result = $sql->fetchColumn();
                if ($result == 0)
                    unlink("homepageImages/" . $_POST['oldFile2']);
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
    echo "<script>alert('File Uploaded!');</script>";
}

else echo "<script>alert('No File Found');</script>";


echo "<script>window.location.replace('homepage-images.php');</script>";
