<?php 


include("connect.php");
$conx = new Service;
$conx->connect();
$Id = $_GET['Id'];
$file_url = $_GET['file_url'];
$stmt = $conx->dbh->prepare("DELETE FROM posts WHERE Id = $Id;");
$stmt->execute();
if (file_exists("Posts Images/" . $file_url)) {
    
    $sql = $conx->dbh->prepare("SELECT count(*) FROM posts WHERE file_url = :f_url");
    $sql->bindParam(":f_url", $file_url);
    $sql->execute();
    $result = $sql->fetchColumn();
    if ($result == 0)
        unlink("Posts Images/" . $file_url);
}

header("Location: posts.php");

?>