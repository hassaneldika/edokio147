<?php

include("connect.php");
$conx = new Service;
$conx->connect();
$training_id = $_GET['Training_Id'];
$query = "UPDATE testimonials SET isPublished = 0 WHERE Id = :Id";
$stmt = $conx->dbh->prepare($query);
$stmt->bindParam(":Id", $_GET['Id']);
$stmt->execute();
//echo "<script>alert('Comment Unpublished!');</script>";
header("Location: testimonials.php?Id=$training_id");

?>