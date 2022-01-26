<?php

include("connect.php");
$conx = new Service;
$conx->connect();
$Id = $_GET['Id'];
$query = $conx->dbh->prepare("UPDATE trainings SET Status = 0 WHERE Id = '$Id'");
$query->execute();
echo "<script>alert('Program Disabled');
    window.location.replace('trainingsList.php');</script>";