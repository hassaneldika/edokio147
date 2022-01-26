<?php
if (!isset($_SESSION)) {
	session_start();
}
$trainingId = $_POST['trainingId'];

include("connect.php");
$conx = new Service;
$conx->connect();
if(isset($_POST['Edit'])){
// $cont=trim($_POST['BodyText']);

$updatesql = "UPDATE testimonials SET Name = :N , Testimonial = :T WHERE Id = :Id;";
$updatestmt = $conx->dbh->prepare($updatesql);
$updatestmt->bindParam(":N", $_POST['Name']);
$updatestmt->bindParam(":T", $_POST['Testimonial']);
$updatestmt->bindParam(":Id", $_POST['Id']);

$updatestmt->execute();
echo "<script>alert('Testimonial has been successfully updated!');</script>";

}
echo "<script>window.location.replace('testimonials.php?Id=".$trainingId."');</script>";