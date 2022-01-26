<?php

include("connect.php");
$conx = new Service;
$conx->connect();
$training_id = $_GET['Training_Id'];
$getPublished = "SELECT count(*) FROM testimonials WHERE isPublished = 1 AND Training_Id = $training_id";
$statement = $conx->dbh->prepare($getPublished);
$statement->execute();
$result = $statement->fetchColumn();
if ($result < 3) {

    $query = "UPDATE testimonials SET isPublished = 1 WHERE Id = :Id";
    $stmt = $conx->dbh->prepare($query);
    $stmt->bindParam(":Id", $_GET['Id']);
    $stmt->execute();
    //echo "<script>alert('Comment Published!');</script>";
    header("Location: testimonials.php?Id=$training_id");
} else {
    echo "<script>alert('You have reached the max limit of published Recommendations (3)');
    window.location.replace('testimonials.php?Id=$training_id');</script>";
    // header("Location: testimonials.php");
    
}
