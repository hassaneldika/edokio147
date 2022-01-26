<link href="css2/form.css" rel="stylesheet">
<form action="loginaction.php" method="POST" class="pages-content">
	<?php //if($_GET['active']==1){?>
	<?php //}?>
	<div class="row pad-row-laws  Margin_InputMobile">
		<input type="hidden" name="lang" value="en" />
		<div class="col-xs-12 col-sm-3 col-md-3 FormEdgesMobile Left_Edge_inputs">	<span  class="label-form">Email Address:&nbsp;</span>
			<input type="email" name="pharmacistemailaddress" <?php if (isset($_SESSION['pharmacistemailaddress'])): ?>value="<?php echo $_SESSION['pharmacistemailaddress'];?>"<?php endif ?> class="widthInput" required>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12"></div>
		<div class="col-md-3 col-sm-3 col-xs-12"></div>
	</div>
	<div class="row pad-row-laws  Margin_InputMobile">
		<div class="col-xs-12 col-sm-3 col-md-3 FormEdgesMobile Left_Edge_inputs">
			<span class="label-form">Password:</span>
			<input type="password" name="txtpassword" class="widthInput" required>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12"></div>
		<div class="col-md-3 col-sm-3 col-xs-12"></div>
	</div>
	<div class="row pad-row-laws  Margin_InputMobile">
		<a href="changepassword.php" style="color: #14569e">Forgot your password?</a>
	</div>
	<div class="row" style="height:10px; display:block"></div>
	<div class="col-xs-12 col-sm-3 col-md-3 FormEdgesMobile Left_Edge_inputs">
		<div class="btn-group">
			<input class="group_Inputs" value="LOGIN" name="loginsubmit" type="submit">
			<a href="createaccount.php">
				<input class="group_Inputs" value="NOT YET REGISTERED" type="button" >
			</a>
		<!-- 	<input  class="group_Inputs" value="ACTIVATE YOUR EMAIL" type="button" > -->
		</div>
	</div>
</form>