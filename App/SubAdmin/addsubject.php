<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Upturn Smart Online Exam System by Mayuri <br> [Master in Computer Science]
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
include("connect.php");
include("header.php"); ?>

	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">Add Subject</a></h4></li></center>
            </ol>
<!--grid-->
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <form action="addsubject.php" method="post">
		    <div class="col-md-6 form-group1">
              <label class="control-label">Subject Name</label>
              <input type="text" class="form-control" placeholder="Subject" name="subnm" required="">
            </div>
              <div class="col-md-12 form-group2 ">
              
            <?php $sql = "SELECT deptname FROM departmenttbl where status='1'";
                $result = mysql_query($sql); ?>
            <label class="control-label">Select Department </label>
            <select name="deptnm" id="">
                <option value="" <?php if(!isset($_POST['deptname']) || (isset($_POST['deptname']) && empty($_POST['deptname']))) { ?>selected<?php } ?>>--Select--</option>
                <?php 
                while($row =mysql_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $row['deptname']; ?>" <?php if(isset($_POST['deptname']) && $_POST['deptname'] == $row['deptname']) { ?>selected<?php } ?>><?php echo $row['deptname']; ?></option>
                <?php } ?>
            </select>
			</div>
            <div class="col-md-12 form-group2 group-mail">
              
            <?php $sql1 = "SELECT DISTINCT(catname) AS catname FROM categorytbl where cstatus='1'";
                $result1 = mysql_query($sql1); ?>
            <label class="control-label">Select Category </label>
            <select name="catnm" id="">
                <option value="" <?php if(!isset($_POST['catname']) || (isset($_POST['catname']) && empty($_POST['catname']))) { ?>selected<?php } ?>>--Select--</option>
                <?php 
                while($row =mysql_fetch_assoc($result1)) {
                ?>
                <option value="<?php echo $row['catname']; ?>" <?php if(isset($_POST['catname']) && $_POST['catname'] == $row['catname']) { ?>selected<?php } ?>><?php echo $row['catname']; ?></option>
                <?php } ?>
            </select>
  
           </div>
             <div class="clearfix"> </div>
            <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary" name="Submit" ><a href = "http://www.upturnit.com/product.php" onclick = "getConfirm(this.href);">Submit</a></button>
              <button type="reset" class="btn btn-default" value="reset">Reset</button>
            </div>
		
          <div class="clearfix"> </div>
		  
		  
        </form>
    
 	<!---->
 </div>

</div>
 	<!--//grid-->
	
<?php include("footer.php"); ?>
</div></div>

	<?php include("sidebar.php"); ?>
	<?php }
else
	header('location:login.php');
?>
	</div>
</body>
<!--popup script start -->
<script type = "text/javascript">

function getConfirm(l)
{
  if(arguments[0] != null)
  {
    if(window.confirm('Get Full Source Code at reasonable cost  ' + l + '?\n'))
    {
      location.href = l;
    }
    
    else
    {
      event.cancelBubble = true;
      event.returnValue = false;
      return false;
    }
  }
  
  else
  {
    return false;
  }
  return;
}
</script>

	<!--popup script end -->
</html>