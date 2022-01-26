<?php
include("connect.php");
$conx = new Service;
$conx->connect();
$Tag = $_POST['Tag'];

if (isset($_POST['new_tag']) && isset($_POST['Tag'])) {
    $sql = $conx->dbh->prepare("INSERT INTO tags (Tag) VALUES ('$Tag');");
    $sql->execute();
}
header('Location: tags.php');