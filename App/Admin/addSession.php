<!DOCTYPE HTML>
<html>
<head>
	<title>Add Sessions</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Upturn Smart Online Exam System" />
	<style type="text/css">
		input[type="number"]{
			border: 1px solid #E9E9E9;
			font-size: 0.9em;
			width: 100%;
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
				include("header.php"); ?>
				<ol class="breadcrumb">
					<center><li class="breadcrumb-item"><h4>Add Courses</h4></li></center>
				</ol>
				<div class="validation-system">
					<div class="validation-form">
						<form action="AddSessionAction.php" method="post" method="post" enctype="multipart/form-data">
							<div class="col-md-12 form-group2 group-mail">
								<?php 
									$conx = new Service;
									$conx->connect();
									$stmt = $conx->dbh->prepare("select * from event ");
									$stmt->execute();
									$result = $stmt->fetchAll();
								?>
								<label class="control-label">Select Module Name</label>
								<select name="EventId" id="" required="required">
									<option value="0">--Select--</option>
									<?php foreach ($result as $rows) {?>
									<option value="<?php echo $rows['EventId']; ?>"><?php echo $rows['EventName']; ?></option>
									<?php }?>
								</select>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12 form-group1 group-mail">
								<label class="control-label">Courses Name</label>
								<input type="text" name="SessionName" required>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12 form-group1 group-mail">
								<label class="control-label">Minimum Number of Correct Answers</label>
								<input type="number" name="minumberofanswers" required>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12 form-group1 group-mail">
								<label class="control-label">Courses Grades</label>
								<input type="number" name="sessioncredits" required value="10">
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12 form-group1 group-mail">
								<label class="control-label">Courses Video Name</label>
								<input type="text" name="videoname" >
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12 form-group1 group-mail">
								<label class="control-label">Youtube Link</label>
								<input type="text" name="youtube" >
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12 form-group1 group-mail">
								<label class="control-label">Image Name</label>
								<input  type="file" class="form-control border-input" accept="image/*" name="filename" id="filename" >
								
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12 form-group1 group-mail">
								<label class="control-label">PDF Name</label>
								<input type="text" name="PDF" >
							</div>
							<div class="clearfix"></div>
							<div class="col-md-4 form-group">
								<!-- <button type="submit" class="btn btn-primary" name="submit" >Add Courses</button> -->
								<button type="submit" class="btn btn-admin-add text-white" name="submit">Add Courses</button>
								<button type="reset" class="btn btn-admin-delete text-white" value="reset">Reset</button>
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