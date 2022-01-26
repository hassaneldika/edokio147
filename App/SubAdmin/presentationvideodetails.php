<!DOCTYPE HTML>
<html>
<head>
	<title>Presentation Videos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Upturn Smart Online Exam System" />
	<style type="text/css">
		input[type="file"]{
			border: 1px solid #E9E9E9;
			font-size: 0.9em;
			width: 50%;
			outline: none;
			padding: 0.5em 1em;
			color: #999;
			margin-top: 0.5em;
		}

	    button.btn-admin-edit,button.btn-admin-delete,button.btn-admin-add{width: 49%;padding: 7px;}
	</style>
</head> 
<body>
	<div class="page-container">
		<div class="left-content">
			<div class="mother-grid-inner">
				<?php
					session_start();
					if($_SESSION["userid"]==true) {
						if (!isset($_GET['presentationid']) || is_null($_GET['presentationid']) || empty($_GET['presentationid'])) {
							echo "<script>window.location.replace('listpresentationvideos.php');</script>";
						}
					include("header.php");
					$conx = new Service;
					$conx->connect();
					$stmt = $conx->dbh->prepare("SELECT * FROM session WHERE SessionId = ".$_GET['presentationid'].";");
					$stmt->execute();
					$sessiondetails = $stmt->fetch();
					if (empty($sessiondetails)) {
						echo "<script>window.location.replace('listpresentationvideos.php');</script>";
					}
				?>
				<ol class="breadcrumb">
					<center><li class="breadcrumb-item"><h4><?php echo $sessiondetails['SessionName']; ?></h4></li></center>
				</ol>
				<div class="validation-system">
					<div class="validation-form">
						<form action="addpresantationvideos.php" method="post">
							<div class="row">
								<div class="col-md-12 form-group1 group-mail">
									<label class="control-label">Presentation Videos</label>
									<input type="file" name="sessioncredits" accept="video/mp4,video/x-m4v,video/*" required multiple>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="row">
								<div class="col-md-4 form-group">
									<!-- <button type="submit" class="btn btn-primary" name="submit" >Add Presentation</button> -->
									<button type="submit" class="btn btn-admin-add text-white" name="submit">Add Videos</button>
									<button type="reset" class="btn btn-admin-delete text-white" value="reset">Reset</button>
								</div>
							</div>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
				<?php

				?>
				<div class="validation-system">
					<div class="validation-form">
							<h2 style="color: #850202;font-size: 28px;">List of Presentations</h2>
						<form action="addpresantationvideos.php" method="post">
							<div class="row">
								<div class="col-md-12 form-group1 group-mail">
									<label class="control-label">Presentation Videos</label>
									<input type="file" name="sessioncredits" accept="video/mp4,video/x-m4v,video/*" required multiple>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="row">
								<div class="col-md-4 form-group">
									<!-- <button type="submit" class="btn btn-primary" name="submit" >Add Presentation</button> -->
									<button type="submit" class="btn btn-admin-add text-white" name="submit">Add Videos</button>
									<button type="reset" class="btn btn-admin-delete text-white" value="reset">Reset</button>
								</div>
							</div>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
				<?php include("footer.php"); ?>
			</div>
		</div>
		<?php include("sidebar.php"); ?>
		<?php }
		else
		header('location:login.php'); ?>
	</div>
</body>
</html>