<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['userid']) || !isset($_POST['tag'])) {
    echo "<script>window.location.replace('posts.php');</script>";
    exit();
}
include("connect.php");
$conx = new Service;
$conx->connect();
if (isset($_POST['edit'])) {
    $updatesql = "UPDATE tags SET Tag = :Tag WHERE Id = :Id;";
    $updatestmt = $conx->dbh->prepare($updatesql);
    $updatestmt->bindParam(":Tag", $_POST['tag']);
    $updatestmt->bindParam(":Id", $_POST['Id']);
    $updatestmt->execute();
    echo "<script>alert('Updated!');</script>";
}

echo "<script>window.location.replace('tags.php');</script>";
