<?php


    include("connect.php");
    
    $con = new Service;
    $con->connect();
    $query = $con->dbh->prepare("DELETE FROM trainings WHERE Id = :Id;");
    $query->bindParam(":Id", $_GET['Id']);
    $query->execute();
    header("Location: trainingsList.php");
?>