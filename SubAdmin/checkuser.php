<?php
//session_start();// Starting Session
$user_check= $_SESSION["userid"];// Storing Session
// SQL Query To Fetch Complete Information Of User

    $conx = new Service;
	$conx->connect();
	$stmt = $conx->dbh->prepare("SELECT * FROM opladmin-usertable WHERE uid='" . $_SESSION["userid"] . "'");
	$stmt->execute();
	$row=$stmt->fetch();
// echo $user_check;

// $my_id=$row['uid'];
// $my_fname =$row['fname'];
// $my_lname =$row['lname'];
// $my_gender =$row['gender'];
// $my_blood =$row['blood'];
// $my_mobile=$row['mobile'];
// $my_email =$row['email'];
// $my_address=$row['address'];
// $my_department=$row['deptname'];
// $my_birthdate=$row['dob'];
// $my_file=$row['file'];
// $my_category=$row['catname'];
?>
