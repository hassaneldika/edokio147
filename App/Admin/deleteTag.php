<?php 


include("connect.php");
$conx = new Service;
$conx->connect();
$tag = $_GET['Tag'];

$stmt = $conx->dbh->prepare("DELETE FROM tags WHERE Tag = '$tag';");
$stmt->execute();
$query = $conx->dbh->prepare("DELETE FROM assigned_tags WHERE Tag = '$tag';");
$query->execute();

header("Location: tags.php");

?>