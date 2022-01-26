<!DOCTYPE HTML>
<html>
<head>
	<title>Jobs</title>
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
					include("header.php"); ?>
					<!-- <ol class="breadcrumb">
						<center><li class="breadcrumb-item"><h4><a href="">Events List</a></h4></li></center>
					</ol> -->
					<?php
					$conx = new Service;
					$conx->connect();
					$stmt = $conx->dbh->prepare("SELECT * FROM Jobs ORDER BY JobDate DESC");
					$stmt->execute();
					$result = $stmt->fetchAll(); ?>
					<div class="agile-grids">
						<div class="agile-tables">
							<div class="w3l-table-info">
								<h2>Job </h2>
								<table id="table" style="width: auto;">
									<thead>
										<tr>
											<th align="left">Job Name</th>
											<th align="left">Job Text</th>
											<th align="left">Job Link</th>
											<th align="left">Actions</th>
											<th align="center" width="100"></th>
											<th align="center" width="100"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($result as $rows) { ?>
											<form action="EditJob.php" method="post">
												<tr>
													<input type="hidden" name="JobId" value="<?php echo $rows['JobId']; ?>">
													<td>
									<input type="text" name="JobName" class="form-admin-input" value="<?php echo $rows['JobName'];?>" required></td>
                                   <td><input type="text" name="JobText" class="form-admin-input" value="<?php echo $rows['JobText'];?>" required></td>
									 <td><input type="text" name="JobLink" class="form-admin-input" value="<?php echo $rows['JobLink'];?>" required></td>
													
												
													<td>
														<a class="btn btn-admin-delete text-white" onclick="confirmdelete(<?php echo $rows['JobId']; ?>)"> Delete </a>
													</td>
													<td>
														<button class="btn btn-admin-edit text-white" type="submit" name="lEu9pSFrmo"> Edit </button>
													</td>
												</tr>
											</form>
										<?php } ?>
									</tbody>
								</table>
							</div>
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
	<script type="text/javascript">
		function confirmdelete(id) {
			var result = confirm("Are you sure you want to delete this job?");
			if(result){
				window.location.replace('deletejob.php?JobId='+id);
			}
		}
		
	</script>
</body>
</html>