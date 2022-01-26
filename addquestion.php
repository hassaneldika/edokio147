<!DOCTYPE HTML>
<html>
<head>
	<title>Add Questions</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Upturn Smart Online Exam System" />
	<style type="text/css">
		button.btn-admin-edit,button.btn-admin-delete{width: 49%;padding: 7px;}
	</style>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-T54Y1DPZ01"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-T54Y1DPZ01');
</script>
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
				<center><li class="breadcrumb-item"><h4><a href="">Add Question</a></h4></li></center>
			</ol>
			<div class="validation-system">
				<div class="validation-form">
					<form action="addquestionAction.php" method="post">
						<div class="col-md-12 form-group2 group-mail">
							<?php
								$conx = new Service;
								$conx->connect();
								$stmt = $conx->dbh->prepare("select * from session");
								$stmt->execute();
								$result = $stmt->fetchAll();
							?>
							<label class="control-label">Select Course</label>
							<select name="SessionId" id="">
								<option value="0">--Select--</option>
								<?php foreach ($result as $rows) {?>
								<option value="<?php echo $rows['SessionId']; ?>" <?php if(isset($_GET) && !empty($_GET['SessionId'])){if($_GET['SessionId'] == $rows['SessionId']){echo "selected";}} ?>><?php echo $rows['SessionName']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="clearfix"></div>

						<div class="col-md-12 form-group2 group-mail">
							<label class="control-label">Grades</label>
							<input type="text" class="form-control"  name="Grades" required="required">
						
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group1 group-mail">
							<label class="control-label">Question ?</label>
							<textarea class="form-control" rows="3" name="questionname" required></textarea>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group2 group-mail">
							<label class="control-label">Answer 1</label>
							<textarea class="form-control" rows="3" name="op1" required></textarea>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group2 group-mail">
							<label class="control-label">Answer 2</label>
							<textarea class="form-control" rows="3" name="op2" required></textarea>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group2 group-mail">
							<label class="control-label">Answer 3</label>
							<textarea class="form-control" rows="3" name="op3" required></textarea>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group2 group-mail">
							<label class="control-label">Answer 4</label>
							<textarea class="form-control" rows="3" name="op4" required></textarea>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group2 group-mail">
							<label class="control-label">Correct Answer Number</label>
							<!-- <input type="text" class="form-control"  name="correctop" required="required"> -->
							<select name="correctop">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-5 form-group">
							<button type="submit" class="btn btn-admin-edit text-white" name="submit"> Submit </button>
							<button type="reset" class="btn btn-admin-delete text-white" value="reset"> Reset </button>
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
	header('location:login.php');
	?>
	</div>
</body>
</html>