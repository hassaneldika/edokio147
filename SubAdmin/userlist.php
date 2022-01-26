
<!DOCTYPE HTML>
<html>
<head>
<title>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


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

//include("connect.php");
  $conx = new Service;
	$conx->connect();

$stmt = $conx->dbh->prepare("select * from usertbl");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
<h2>List of Users</h2>
<table width="100%" id="table">
<thead>
<tr>
               <th align="left">Id</th>
			   <th align="left">First Name</th>
			   <th align="left">Last Name</th>
			   <!--<th align="left">Gender</th>
			   <th align="left">Blood Group</th>
			   <th align="left">Email</th>-->
			   <th align="left">Mobile</th>
			   <!--<th align="left">Date of birth</th>
			   <th align="left">Address</th>-->
			   <th align="left">Department</th>
			   <th align="left">Category</th>
			   <th align="left">File</th>
			   <th align="left">Action</th>
			    
</tr>
</thead>
<tbody>
<?php foreach ($result as $rows) {

	
	?>

    <tr>
    <td><?php echo $rows['uid'];?></td>
	<td><?php echo $rows['fname'];?></td>
    <td><?php echo $rows['lname'];?></td>
	<!--<td><?php //echo $rows['gender'];?></td>
	<<td><?php// echo $rows['blood'];?></td>
	<td><?php //echo $rows['email'];?></td>-->
	<td><?php echo $rows['mobile'];?></td>
	<!--<td><?php// echo $rows['dob'];?></td>
	<td><?php// echo $rows['address'];?></td>-->
	<td><?php echo $rows['deptname'];?></td>
	<td><?php echo $rows['catname'];?></td>
	<td><?php echo($rows['file']!=NULL)?'<img src="uploaded/'.$rows['file'].'" width="50" height="50">' :'' ;?></td>
	<td>
    <?php
$status=$rows['status'];
if(($status)=='0')
{
?>
<button class="btn bg-danger">
<a href="uaction.php?status=<?php echo $rows['uid'];?>" 
  onclick="return confirm('Activate <?php echo $rows['fname'];?>');"> Inactivate </a></button>
<?php
}
if(($status)=='1')
{
?>
<button class="btn bg-success text-white ">
<a href="uaction.php?status=<?php echo $rows['uid'];?>" 
 onclick="return confirm('In-activate <?php echo $rows['fname'];?>');"> Activate</a></button><?php
}
?>

	<button class="btn btn-dark text-white "><a href="deleteuser.php?id=<?php echo $rows['uid']; ?>" 
    onclick="return confirm('Are you sure you wish to delete this Record?');">Delete </a> </button>
 
	<button class="btn bg-alert dark text-white "><a href = "http://www.upturnit.com/product.php" onclick = "getConfirm(this.href);" > Edit </a></button>
	</td>
    </tr>
<?php }?>
</tbody>
</table>
</div>
</div>
</div>
	
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