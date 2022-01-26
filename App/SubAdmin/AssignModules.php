
<!DOCTYPE HTML>
<html>
<head>
<title>Assign Modules</title>
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

include("header.php"); 

$conx = new Service;
          $conx->connect();
          $stmt = $conx->dbh->prepare("SELECT * FROM Admins ORDER BY AdminId DESC");
          $stmt->execute();
          $Admins = $stmt->fetchAll(); 
                    ?>

<!--   <ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">Add Event</a></h4></li></center>
            </ol> -->
<!--grid-->
  <div class="validation-system">
    
    <div class="validation-form">
  <!---->
        
        <form action="AssignDetails.php" method="post">
        <div class="col-md-6  form-group2 group-mail">
              <label class="control-label">Select your Manager </label>
           
            

              <select name="AdminId" required="required"  class="form-control">

                <option value=""></option>
                    <?php foreach ($Admins as $Admin) {?>   
                        <?php ?>
                        <option  class="form-control" value="<?php echo $Admin['AdminId']; ?>"><?php echo $Admin['AdminName']; ?></option>
                          
             <?php }?>
         </select>
       </div>
         <div class="col-md-6  form-group2 group-mail">
         </div>
        
              <div class="col-md-12 form-group2 group-mail">
         
            </div>
             <div class="clearfix"> </div>
            <div class="col-md-4 form-group">
            
              <button type="submit" class="btn btn-admin-delete text-white" value="submit">Submit</button>
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
        $query = 'INSERT INTO event (EventName) VALUES (:EventName)';
        $conx->connect();
        $st = $conx->dbh->prepare($query);
        $st->bindParam(':EventName', $EventName);

        $st->execute();
        echo "<script>window.location.href = 'EventList.php';</script>";
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