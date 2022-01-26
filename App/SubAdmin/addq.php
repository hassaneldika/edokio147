
<!DOCTYPE HTML>
<html>
<head>
<title>Add Questions
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Upturn Smart Online Exam System" />

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
//include("connect.php");
include("header.php"); ?>
<?php
if (isset($_GET['eid'])) {
	$examid1=$_GET['eid'];
}
?>
	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">Add Question</a></h4></li></center>
            </ol>
<!--grid-->
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <form action="addq.php" method="post">
		     
		  
		  <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Question ?</label>
              <textarea class="form-control" rows="3"  name="questionname" ></textarea>
          </div>
		  <div class="clearfix"> </div>
            
          <div class="col-md-12 form-group2 group-mail">
              <label class="control-label">Option 1</label>
              <textarea class="form-control" rows="3" name="op1" ></textarea>
          </div>
		  <div class="clearfix"> </div>
            
          <div class="col-md-12 form-group2 group-mail">
               <label class="control-label">Option 2</label>
               <textarea class="form-control" rows="3" name="op2" ></textarea>
          </div>
		  <div class="clearfix"> </div>
          <div class="col-md-12 form-group2 group-mail">
               <label class="control-label">Option 3</label>
               <textarea class="form-control" rows="3"  name="op3" ></textarea>
          </div>
		  <div class="clearfix"> </div>
          <div class="col-md-12 form-group2 group-mail">
               <label class="control-label">Option 4</label>
               <textarea class="form-control" rows="3" name="op4" ></textarea>
          </div> 
          <div class="clearfix"> </div>		  
          <div class="col-md-12 form-group2 group-mail">
               <label class="control-label">Correct Option Name</label>
               <input type="text" class="form-control"  name="correctop" required="required">
          </div>
		  <div class="clearfix"> </div>
          </div> 
			  
			  
		  
            <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              <button type="reset" class="btn btn-default" value="reset">Reset</button>
            </div>
		
          <div class="clearfix"> </div>
		  
		  <input type="hidden" name="examid" value="<?php if(isset($examid1)){ echo $examid1;} ?>">
		  
        </form>
    
 	<!---->
 </div>

</div>
 	<!--//grid-->
 

 <?php 
	

// 	   if(isset($_POST['submit']))
//        {  
//            $examid = $_POST['examid'];
// 		   $question=$_POST['q_name'];
// 		   $op1=$_POST['opt_1'];
// 		   $op2=$_POST['opt_2'];
// 		   $op3=$_POST['opt_3'];
// 		   $op4=$_POST['opt_4'];
// 		   $correct_op=$_POST['correct_op'];
// 	       $query="insert into questiontbl(qid,examid,questionname,op1,op2,op3,op4,correctop)values('','$examid','$question','$op1','$op2','$op3','$op4','$correct_op')";
	 
//            $result= mysql_query($query);
	       
// 	       if($result)
// 			   //header("location:addq.php?eid='$examid1'");
// 		      echo "record inserted successfully";
// 	       else
// 		   echo mysql_error();
	   
	   
// 	       mysql_close($con);
// }
	   if(isset($_POST['submit']))
       {  
       	$examid = $_POST['examid'];
		   $questionname=$_POST['questionname'];
		   $op1=$_POST['op1'];
		   $op2=$_POST['op2'];
		   $op3=$_POST['op3'];
		   $op4=$_POST['op4'];
		   $correctop=$_POST['correctop'];
       var_dump($_POST);
  $query = 'INSERT INTO questiontbl (examid,questionname,op1,op2,op3,op4,correctop) VALUES (:examid,:questionname,:op1,:op2,:op3,:op4,:correctop)';
  $conx->connect();
  $st = $conx->dbh->prepare($query);
  $st->bindParam(':examid', $examid);
  $st->bindParam(':questionname', $questionname);
    $st->bindParam(':op1', $op1);
      $st->bindParam(':op2', $op2);
          $st->bindParam(':op3', $op3);
          $st->bindParam(':op4', $op4);
          $st->bindParam(':correctop', $correctop);
            $st->execute();
 //header("location:addq.php?eid='$examid1'");
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