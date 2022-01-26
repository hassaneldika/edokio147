<?php
	if (!isset($_SESSION)) {session_start();}
	
	include("connect.php");
	
    if(isset($_POST['lEu9pSFrmo'])){
    	//var_dump($_POST);
    $conx = new Service;
	$conx->connect();  
        $AdminName=$_POST['AdminName']; 
         $AdminId=$_POST['AdminId']; 
          $EventName=$_POST['EventName'];
          $EventId=$_POST['EventId'];
          
        $query = 'INSERT INTO AdminModules (AdminModulesName,AdminName,AdminId,ModuleId) VALUES (:AdminModulesName,:AdminName,:AdminId,:ModuleId)';
        $conx->connect();
        $st = $conx->dbh->prepare($query);
        $st->bindParam(':AdminModulesName', $EventName);
          $st->bindParam(':AdminId', $AdminId);
            $st->bindParam(':AdminName', $AdminName);
             $st->bindParam(':ModuleId', $EventId);
        $st->execute();
        echo "<script>window.location.href = 'AssignDetails.php?CoachId=$AdminId';</script>";
  }
    if(isset($_POST['DeleteAssignment'])){
         $AdminName=$_POST['AdminName']; 
         $AdminId=$_POST['AdminId']; 
          $EventName=$_POST['EventName'];
          $EventId=$_POST['EventId'];
  $conx = new Service;
    	$conx->connect();
	$deletesql = "DELETE FROM AdminModules WHERE AdminId=:AdminId AND ModuleId=:ModuleId ";
	$deletestmt = $conx->dbh->prepare($deletesql);
	$deletestmt->bindParam(":AdminId", $_REQUEST['AdminId']);
	$deletestmt->bindParam(":ModuleId", $EventId);
	$deletestmt->execute();
	echo "<script>alert('Coach Deleted.');</script>";
	echo "<script>window.location.replace('AssignDetails.php?CoachId=$AdminId');</script>";
    }
  
?>