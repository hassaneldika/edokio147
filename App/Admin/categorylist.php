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


include("header.php"); ?>

	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">Category List</a></h4></li></center>
            </ol>
<!--grid 
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
	
<?php

include("connect.php");
$sql="select cid,catname,deptname,cstatus from categorytbl ";
$result = mysql_query($sql);
?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>Category</h2>
<table width="100%" id="table">
<thead>
<tr>
               <th align="left">Id</th>
			   <th align="left">Category Name</th>
			   <th align="left">Department Name</th>
			   <th align="left">Action</th>
			    
</tr>
</thead>
<tbody>
<?php while($rows=mysql_fetch_array($result))
{
	?>

    <tr>
    <td><?php echo $rows['cid'];?></td>
	<td><?php echo $rows['catname'];?></td>
    <td><?php echo $rows['deptname'];?></td>
	
	<td>
    <?php
	$status=$rows['cstatus'];
if(($status)=='0')
{
?>
<button class="btn bg-danger">
<a href = "http://www.upturnit.com/product.php" onclick = "getConfirm(this.href);"> Inactivate </a></button>
<?php
}
if(($status)=='1')
{
?>
<button class="btn bg-success text-white ">
<a href = "http://www.upturnit.com/product.php" onclick = "getConfirm(this.href);"> Activate</a></button><?php
}
?>

	<button class="btn btn-dark text-white "><a href = "http://www.upturnit.com/product.php" onclick = "getConfirm(this.href);">Delete </a> </button>
 
	<button class="btn bg-alert dark text-white "><a href = "http://www.upturnit.com/product.php" onclick = "getConfirm(this.href);"> Edit </a></button>
	</td>
    </tr>
<?php }?>
</tbody>
</table>
</div>
</div>
</div>

<!--<button><a href="logout.php">Logout</a></button>-->

<!--
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
<?php

mysql_close($con);
?>
