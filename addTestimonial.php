<?php
include("Admin/connect.php");
$conx = new Service;
$conx->connect();

if (isset($_POST['comment']) && isset($_POST['Name']) && isset($_POST['Testimonial'])) {
    $secretKey = "6Ldcm0ocAAAAAD12AkmcV974kepDlEJZTdNMgg1h";
    $responseKey = $_POST['g-recaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
    $response = file_get_contents($url);
    $response = json_decode($response);
    if ($response->success) {

        $date = date("Y-m-d");
        $Name = $_POST['Name'];
        $Testimonial = $_POST['Testimonial'];
        $Training_Id = $_POST['Id'];


        if ($_FILES['Image']['size'][0] > 0) {

            $targetDir = "Uploaded Images/";
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');


            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
            $fileNames = array_filter($_FILES['Image']['name']);
            if (!empty($fileNames)) {
                foreach ($_FILES['Image']['name'] as $key => $val) {
                    // File upload path 
                    $fileName = basename($_FILES['Image']['name'][$key]);

                    $targetFilePath = $targetDir . $fileName;

                    // Check whether file type is valid 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) {
                        // Upload file to server 
                        if (move_uploaded_file($_FILES["Image"]["tmp_name"][$key], $targetFilePath)) {
                            // Image db insert sql 
                            $insertValuesSQL .= "('" . $Name . "','" . $Testimonial . "','" . $date . "','" . $fileName . "','" . $Training_Id . "'),";
                        } else {
                            $errorUpload .= $_FILES['Image']['name'][$key] . ' | ';
                        }
                    } else {
                        $errorUploadType .= $_FILES['Image']['name'][$key] . ' | ';
                    }
                }

                // Error message 
                $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
                $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
                $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

                if (!empty($insertValuesSQL)) {
                    $insertValuesSQL = trim($insertValuesSQL, ',');
                    // Insert image file name into database 

                    $insert = $conx->dbh->prepare("INSERT INTO testimonials (Name, Testimonial, Date, Image, Training_Id) VALUES $insertValuesSQL;");
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
            try {
                
                $stmt = $conx->dbh->prepare("INSERT INTO testimonials (Name, Testimonial, Date, Training_Id) VALUES ('$Name','$Testimonial','$date','$Training_Id');");
                // $stmt->bindParam(":Name", $Name);
                // $stmt->bindParam(":Testimonial", $Testimonial);
                // $stmt->bindParam(":Date", $date);

                $stmt->execute();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        
        }
        echo "<script>alert('Your comment has been submitted!');
        window.location.replace('feedback.php?Id=$Training_Id');</script>";
        // header("Location: feedback.php");
    }else{
    echo "<script>alert('Verification failed!');
    window.location.replace('feedback.php?Id=$Training_Id');</script>";
    }
    // header("Location: feedback.php");
}
