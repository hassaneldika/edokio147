<?php

include("connect.php");
$conx = new Service;
$conx->connect();
$tag = $_GET['Tag'];
$title = $_GET['Title'];
$selectTag = "DELETE FROM assigned_tags WHERE Tag = '$tag' AND Title = '$title';";
$statement = $conx->dbh->prepare($selectTag);
$statement->execute();

if ($statement) {

    echo "<script>window.location.replace('chooseTags.php?Title=$title');</script>";
    // header("Location: chooseTags.php?Title=$title");
} else {
    echo "<script>alert('Didn't work');
    window.location.replace('chooseTags.php?Title=$title');</script>";
    // header("Location: testimonials.php");
    
}