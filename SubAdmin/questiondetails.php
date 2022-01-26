<!DOCTYPE HTML>
<html>
<head>
	<title>Edit Question</title>
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
		if($_SESSION["userid"]==true) {
			if (!isset($_GET['qid'])) {
				echo "<script>window.location.replace('addquestion.php');</script>";
				exit();
			}
			include("header.php"); ?>
			<ol class="breadcrumb">
				<center><li class="breadcrumb-item"><h4><a href="">Add Question</a></h4></li></center>
			</ol>
			<div class="validation-system">
				<div class="validation-form">
					<form action="editquestion.php" method="post">
						<div class="col-md-12 form-group2 group-mail">
							<?php
								$conx = new Service;
								$conx->connect();
								$questionsql = "SELECT * FROM questiontbl WHERE qid =:qid";
								$questionstmt = $conx->dbh->prepare($questionsql);
								$questionstmt->bindParam(':qid', $_GET['qid']);
								$questionstmt->execute();
								$questiondetails = $questionstmt->fetch();

								if (empty($questiondetails)) {
									echo "<script>window.location.replace('Sessionslist.php');</script>";
									exit();
								}
								$stmt = $conx->dbh->prepare("select * from session");
								$stmt->execute();
								$result = $stmt->fetchAll();
							?>
							<label class="control-label">Select Session</label>
							<select name="SessionId">
								<?php foreach ($result as $rows) { ?>
								<option value="<?php echo $rows['SessionId']; ?>" <?php if($rows['SessionId'] == $questiondetails['SessionId']){echo "selected";} ?>><?php echo $rows['SessionName']; ?></option>
								<?php } ?>
							</select>
						</div>
						<input type="hidden" name="qid" value="<?php echo $_GET['qid']; ?>">
						<div class="clearfix"></div>
						<div class="col-md-12 form-group1 group-mail">
							<label class="control-label">Question ?</label>
							<textarea class="form-control" rows="3" name="questionname" required><?php echo $questiondetails['questionname']; ?></textarea>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group2 group-mail">
							<label class="control-label">Grades</label>
							<input type="text" class="form-control" rows="3" name="Grades" required value="<?php echo $questiondetails['Grades']; ?>">
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group2 group-mail">
							<label class="control-label">Answer 1</label>
							<textarea class="form-control" rows="3" name="op1" required><?php echo $questiondetails['op1']; ?></textarea>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group2 group-mail">
							<label class="control-label">Answer 2</label>
							<textarea class="form-control" rows="3" name="op2" required><?php echo $questiondetails['op2']; ?></textarea>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group2 group-mail">
							<label class="control-label">Answer 3</label>
							<textarea class="form-control" rows="3" name="op3" required><?php echo $questiondetails['op3']; ?></textarea>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group2 group-mail">
							<label class="control-label">Answer 4</label>
							<textarea class="form-control" rows="3" name="op4" required><?php echo $questiondetails['op4']; ?></textarea>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group2 group-mail">
							<label class="control-label">Correct Answer Number</label>
							<!-- <input type="text" class="form-control"  name="correctop" required="required"> -->
							<select name="correctop">
								<option value="1" <?php if($questiondetails['correctop'] == 1){echo "selected";} ?>>1</option>
								<option value="2" <?php if($questiondetails['correctop'] == 2){echo "selected";} ?>>2</option>
								<option value="3" <?php if($questiondetails['correctop'] == 3){echo "selected";} ?>>3</option>
								<option value="4" <?php if($questiondetails['correctop'] == 4){echo "selected";} ?>>4</option>
							</select>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 form-group">
							<button type="submit" class="btn btn-admin-edit text-white" name="submit"> Edit Question </button>
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