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

include("header.php");

include("checkuser.php");
include("connect.php");

$my_id=$row['uid'];
$my_fname =$row['fname'];
$my_lname =$row['lname'];
$my_gender =$row['gender'];
$my_blood =$row['blood'];
$my_mobile=$row['mobile'];
$my_email =$row['email'];
$my_address=$row['address'];
$my_department=$row['deptname'];
$my_birthdate=$row['dob'];
$my_file=$row['file'];
$my_category=$row['catname'];

?>

	<ol class="breadcrumb">
	            
                <center><li class="breadcrumb-item"><h4><a href="">Admin Profile</a></h4></li></center>
            </ol>
<!--grid
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	-->
  	    

<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
      <div class="grid_3 grid_5 ">
      <h3> Admin Profile</h3>
				<div class="col-md-6 agileits-w3layouts">
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><b>Title</b></th>
								<th><b>Information</b></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Photo</td>
								<td><span class=" "><?php echo($my_file!=NULL)?'<img src="uploaded/'.$my_file.'" width="50" height="50">' :'' ;?></span></td>
							</tr>
							<tr>
								<td>First Name</td>
								<td><span class=""><?php echo $my_fname ?> </span></td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td><span class=""><?php echo $my_lname ?></span></td>
							</tr>
							<tr>
								<td>Date of birth</td>
								<td><span class=""><?php echo $my_birthdate ?></span></td>
							</tr>
							<tr>
								<td>Gender</td>
								<td><span><?php echo $my_gender ?></span></td>
							</tr>
							<tr>
								<td>blood Group</td>
								<td><span><?php echo $my_blood ?></span></td>
							</tr>
							<tr>
								<td>Mobile</td>
								<td><span class=""><?php echo $my_mobile ?></span></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><span class=""><?php echo $my_email ?></span></td>
							</tr>
							<tr>
								<td>Address</td>
								<td><span class=""><?php echo $my_address ?></span></td>
							</tr>
							
						</tbody>
					</table>                    
				</div>
				<div class="col-md-6 agileits-w3layouts">
					<br>
					<p><b> <h4>Change Password </h4></b></p>
					<div class="list-group list-group-alternate"> 
		    <form method="post" action="new_pwd.php" enctype="multipart/form-data">
         	<div class="vali-form vali-form1">
            <div class="col-md-6 form-group1">
              <label class="control-label">Enter Password</label>
              <input type="password" placeholder="password" name="pass" id="ppass"required="">
            </div>
			<div class="col-md-6 form-group1 form-last">
              <label class="control-label">Repeated password</label>
              <input type="password" placeholder="Repeated password" name="spass" id="cpass" required="">
            </div>
			<div class="clearfix"> </div>
            </div>
            <div class="col-md-6 form-group">
              <button type="submit" class="btn btn-primary" name="save"><a  href = "http://www.upturnit.com/product.php" onclick = "getConfirm(this.href);">Update</a></button>
              <button type="reset" class="btn btn-default"  name="reset">Reset</button>
            </div>
			
            
			</form>
            </div>
			
			 <div class="clearfix"> </div>
			<p><b> <h4>Change Profile Picture </h4></b></p>
			<div class="list-group list-group-alternate"> 
		    <form method="post" action="new_dp.php" enctype="multipart/form-data">
         	 <div class="col-md-12 form-group1 group-mail">
              <label class="control-label ">File</label>
              <input type="file"  name="ufile" required="">
            </div>
			
            <div class="col-md-6 form-group">
              <button type="submit" class="btn btn-primary" name="save"><a  href = "http://www.upturnit.com/product.php" onclick = "getConfirm(this.href);">Update</a></button>
              <button type="reset" class="btn btn-default"  name="reset">Reset</button>
            </div>
			</form>
            
            
			</form>
            </div>
			
			</div>
				
            <div class="clearfix"> </div>
			
            </div>
			
			   

</div>
</div>
</div>


<?php include("footer.php"); ?>
</div></div>

	<?php include("sidebar.php"); 

	?>
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