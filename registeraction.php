<?php ini_set("error_reporting", E_ALL & ~E_NOTICE);?>
<?php session_start();?>
<?php 	include_once"service.php";
$service = new Service(); 
$service->connect(); ?>
<?php 
$CoachName=$_POST['CoachName'];
$FullName=$_POST['FullName']; 
$Phone=$_POST['Phone'];
$activated=1;
 //var_dump($_POST);
 $service->connect();
 $CheckUser=$service->CheckUserExists($CoachName, $Phone);
 //var_dump($CheckUser[0]['admin']);
 $CheckAdmin=$CheckUser[0]['admin'];
 $CheckPhone=$CheckUser[0]['password'];
 //var_dump($CheckUser[0]['password']);
if ($CheckPhone==$Phone && $CheckAdmin==$CoachName ) {
//echo "equal";
	echo '<script type="text/javascript">alert("The User is Already Exists ");window.location.href="register.php";</script>';
}
else{
$service->connect();
$Admins = $service->InsertNewUsers($FullName,$Phone,$CoachName,$activated);		
echo '<script type="text/javascript">alert("The new user has been added ");window.location.href="login.php";</script>';

	}	
		
?>
       
