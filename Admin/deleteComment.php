<?php 

include("connect.php");

$conx = new Service;
$conx->connect();
$training_id = $_GET['Training_Id'];
$query = "DELETE FROM testimonials WHERE Id = :Id;";
$stmt = $conx->dbh->prepare($query);
$stmt->bindParam(":Id", $_GET['Id']);
$stmt->execute();
echo "<script>alert('Comment Deleted!');
window.location.replace('testimonials.php?Id=$training_id');</script>";
// header("Location: testimonials.php");
?>