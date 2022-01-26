<?php

$departments = 0;
$students = 0;
$examination = 0;
$subjects = 0;
$categories = 0;
$notice = 0;
$questions = 0;
$banned_students = 0;
$std_fails = 0;
$std_pass = 0;

// $sql = "SELECT * FROM departmenttbl";
// $result = mysql_query($sql);


$stmt = $conx->dbh->prepare("SELECT * FROM departmenttbl");
$stmt->execute();
$departmentsdetails = $stmt->fetchAll();

if (!empty($departmentsdetails)) {
    $departments = count($departmentsdetails);
}

$stmt = $conx->dbh->prepare("SELECT * FROM studenttbl");
$stmt->execute();
$studentsdetails = $stmt->fetchAll();

if (!empty($studentsdetails)) {
    $students = count($studentsdetails);
}


$stmt = $conx->dbh->prepare("SELECT * FROM examtbl");
$stmt->execute();
$examtbldetails = $stmt->fetchAll();

if (!empty($examtbldetails)) {
    $examination = count($studentsdetails);
}


// $sql = "SELECT * FROM examtbl";
// $result = mysql_query($sql);

// if (mysql_num_rows($result) > 0) {
   
//     while($row = mysql_fetch_assoc($result)) {
//      $examination++;
//     }
// } else {

// }
$stmt = $conx->dbh->prepare("SELECT * FROM subjecttbl");
$stmt->execute();
$subjectsdetails = $stmt->fetchAll();

if (!empty($subjectsdetails)) {
    $subjects = count($subjectsdetails);
}

// $sql = "SELECT * FROM subjecttbl";
// $result = mysql_query($sql);

// if (mysql_num_rows($result)> 0) {
   
//     while($row = mysql_fetch_assoc($result)) {
//      $subjects++;
//     }
// } else {

// }

// $sql = "SELECT * FROM categorytbl";
// $result = mysql_query($sql);

// if (mysql_num_rows($result) > 0) {
   
//     while($row = mysql_fetch_assoc($result)) {
//      $categories++;
//     }
// } else {

// }


// $sql = "SELECT * FROM noticetbl";
// $result = mysql_query($sql);

// if (mysql_num_rows($result) > 0) {
   
//     while($row = mysql_fetch_assoc($result)) {
//      $notice++;
//     }
// } else {

// }

// $sql = "SELECT * FROM questiontbl";
// $result = mysql_query($sql);

// if (mysql_num_rows($result) > 0) {
   
//     while(mysql_fetch_assoc($result)) {
//      $questions++;
//     }
// } else {

// }

// $sql = "SELECT * FROM studenttbl WHERE status = '0'";
// $result = mysql_query($sql);

// if (mysql_num_rows($result) > 0) {
   
//     while($row = mysql_fetch_assoc($result)) {
//      $banned_students++;
//     }
// } else {

// }

// $sql = "SELECT * FROM assesmenttbl";
// $result =  mysql_query($sql);

// if (mysql_num_rows($result) > 0) {
   
//     while($row = mysql_fetch_assoc($result)) {
//      $status = $row['status'];
// 	 if ($status == "PASS"){
// 		 $std_pass++;
// 	 }else{
// 		$std_fails++; 
		 
// 	 }
	 
//     }
// } else {

// }



// mysql_close();
?>