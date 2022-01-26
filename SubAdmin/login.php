<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html lang="en">
	<head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<!-- Website Font style -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<!-- Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<title>Login</title>
	</head>
	<body>
		<div class="container">
		<?php


if (!isset($_GET["i"] )){
?>

			 
				<div class="main-login main-center">
				<div class="row main">
			
			<!-- 	<div class="panel-heading">
				   <div class="panel-title text-center">
						<h1 class=""><img src=""></h1>
						
					</div>
				</div> -->
				<h1 class="title">Sign in</h1>
					<form class="form-horizontal"  action="adm_loginaction.php" method="post">
						<div class="form-group">
							<label for="txtusername" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="txtusername" id="txtusername"  placeholder="Enter your Username" required />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="txtpassword" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input class="form-control" type="password" name="txtpassword" id="txtpassword"  placeholder="Enter your Password" required />
								</div>
							</div>
						</div>

						<div class="form-group ">
						<input type="submit" value="login" class="btn btn-primary btn-lg btn-block login-button">
						<!--	<button type="button" class="btn btn-primary btn-lg btn-block login-button">Sign in</button>-->
						</div>
					
					</form>
				</div>
			</div>
			<div class="Space_Before_Footer row"></div>
		
			<?php

}
else
{ ?>
<table width="100%" border="1"  bordercolor="#D5D5DF" cellspacing="0" cellpadding="0">
<tr><td>
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td>&nbsp;</td>
	<td><br /><span class="emailsetuptext">Error in username or Paswword</span><br /><br /></td>
  </tr>
</table>
</td></tr>
</table>

<?php


}
?>
		</div>

		<script type="text/javascript" src="login/assets/js/bootstrap.js"></script>
	</body>
</html> 

