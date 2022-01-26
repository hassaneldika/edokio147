<?php


    include("connect.php");
    
    $con = new Service;
    $con->connect();
    $id = $_GET['Training_Id'];
    $query = $con->dbh->prepare("DELETE FROM feedback WHERE Id = :Id;");
    $query->bindParam(":Id", $_GET['Id']);
    $query->execute();
    header("Location: feedbacks.php?Id=$id")
?>