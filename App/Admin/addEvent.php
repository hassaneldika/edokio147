
<!DOCTYPE HTML>
<html>
<head>
<title>Add Modules</title>
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
        
        <form action="addEvent.php" method="post">
        <div class="col-md-6 form-group1">
              <label class="control-label">Module Name</label>
              <input type="text" placeholder="Module Name" name="EventName" required="">
            </div>
          
              <div class="col-md-6 form-group1">
          <label class="control-label">Module Order</label>
              <input type="number" placeholder="Module Order" name="EventOrder" required="">
            </div>
             <div class="clearfix"> </div>
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

  
     //include("connect.php");
     if(isset($_POST['submit'])){  
        $EventName=$_POST['EventName'];
        $EventOrder=$_POST['EventOrder'];  
        $query = 'INSERT INTO event (EventName,EventOrder) VALUES (:EventName,:EventOrder)';
        $conx->connect();
        $st = $conx->dbh->prepare($query);
        $st->bindParam(':EventName', $EventName);
        $st->bindParam(':EventOrder', $EventOrder);
        $st->execute();
        echo "<script>window.location.href = 'Eventlist.php';</script>";
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