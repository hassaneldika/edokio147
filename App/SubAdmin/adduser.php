
<!DOCTYPE HTML>
<html>
<head>
<title>Add Users</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Upturn Smart Online Exam System" />
  <style type="text/css">
    button.btn-admin-edit,button.btn-admin-delete,button.btn-admin-add{width: 49%;padding: 7px;}
  </style>
</head> 
<body>
<div class="page-container">
   <!--/content-inner-->
<div class="left-content">
<div class="mother-grid-inner">
<?php 
session_start();
if($_SESSION["userid"]==true)
{

include("header.php"); ?>

<!--   <ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">Add Event</a></h4></li></center>
            </ol> -->
<!--grid-->
  <div class="validation-system">
    
    <div class="validation-form">
  <!---->
        
        <form action="adduser.php" method="post">
        <div class="col-md-4 form-group1">
              <label class="control-label">User Name</label>
              <input type="text" placeholder="User Name" name="email" required="">
            </div>
              <div class="col-md-4 form-group1">
              <label class="control-label">User Password</label>
              <input type="text" placeholder="User Password" name="password" required="">
            </div>
              <div class="col-md-4 form-group2 group-mail">
         
            </div>
             <div class="clearfix"> </div>
             <div style="height:30px;display: block;width: 100%"></div>
            <div class="col-md-4 form-group">
              <button type="submit" class="btn btn-admin-add text-white" name="submit">Submit</button>
              <button type="reset" class="btn btn-admin-delete text-white" value="reset">Reset</button>
            </div>
    
          <div class="clearfix"> </div>
      
      
        </form>
    
  <!---->
 </div>

</div>
  <!--//grid-->
  <?php
   //  include("connect.php");

  var_dump($_SESSION);
  $admin=$_SESSION['userid'];
     //include("connect.php");
     if(isset($_POST['submit'])){  
        $email=$_POST['email'];  
        $password= $_POST['password'];
        $query = 'INSERT INTO tblusers (email,password,admin) VALUES (:email,:password,:admin)';
        $conx->connect();
        $st = $conx->dbh->prepare($query);
        $st->bindParam(':email',$email);
        $st->bindParam(':password',$password);
         $st->bindParam(':admin',$admin); 

        $st->execute();
        echo "<script>alert('New User has been added!');</script>";
        echo "<script>window.location.href = 'adduser.php';</script>";
  }

  ?>
<?php include("footer.php"); ?>
</div></div>

  <?php include("sidebar.php"); ?>
  <?php }
else
  header('location:login.php');
?>
  </div>
</body>
</html>