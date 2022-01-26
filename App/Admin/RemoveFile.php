<?php


include("connect.php");

$con = new Service;
$con->connect();
$query = $con->dbh->prepare("DELETE FROM uploadedfiles WHERE file_url = :file_url AND feedback_id = :id;");
$query->bindParam(":file_url", $_GET['file_url']);
$query->bindParam(":id", $_GET['id']);
if (file_exists("Uploaded Files/" . $_GET['file_url'])) {
    $query->execute();

    $sql = $con->dbh->prepare("SELECT count(*) FROM uploadedfiles WHERE file_url = :f_url");
    $sql->bindParam(":f_url", $_GET['file_url']);
    $sql->execute();
    $result = $sql->fetchColumn();
    if ($result == 0)
        unlink("Uploaded Files/" . $_GET['file_url']);
} else $query->execute();
header('Location: ' . $_SERVER['HTTP_REFERER']);
