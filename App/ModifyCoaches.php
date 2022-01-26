<!DOCTYPE HTML>
<html>
<head>
	<title>Events</title>
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
					$stmt = $conx->dbh->prepare("SELECT * FROM Admins ORDER BY AdminId DESC");
					$stmt->execute();
					$result = $stmt->fetchAll(); ?>
					<div class="agile-grids">
						<div class="agile-tables">
							<div class="w3l-table-info">
								<h2>Managers </h2>
								<table id="table" style="width: auto;">
									<thead>
										<tr>
											<th align="left">Manager Name</th>
											<th align="left">Manager Password</th>
											<th align="left">Manager Link</th>
											<th align="left">Actions</th>
											<th align="center" width="100"></th>
											<th align="center" width="100"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($result as $rows) { ?>
											<form action="EditCoach.php" method="post">
												<tr>
													<input type="hidden" name="AdminId" value="<?php echo $rows['AdminId']; ?>">
													<td><input type="text" name="AdminName" class="form-admin-input" value="<?php echo $rows['AdminName'];?>" required></td>
                                   <td><input type="text" name="AdminPassword" class="form-admin-input" value="<?php echo $rows['AdminPassword'];?>" required></td>
													
													<td>
														<?php
														$status=$rows['AdminStatus'];
														if($status=='0') { ?>
														<a class="btn bg-danger full-width text-white" onclick="confirmactivate(<?php echo $rows['AdminId']; ?>)"> Activate </a>
														<?php }
														else if($status=='1') { ?>
														<a class="btn bg-success full-width text-white" onclick="confirmdeactivate(<?php echo $rows['AdminId']; ?>)"> Deactivate </a>
														<?php } ?>
													</td>
													<td>
														<a class="btn btn-admin-add text-white" href="../SubAdmin/login.php" target="_blank"> Link </a>
													</td>
													<td>
														<a class="btn btn-admin-delete text-white" onclick="confirmdelete(<?php echo $rows['AdminId']; ?>)"> Delete </a>
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
			var result = confirm("Are you sure you want to delete this Coach?");
			if(result){
				window.location.replace('deleteadmin.php?AdminId='+id);
			}
		}
		function confirmactivate(id) {
			var result = confirm("Are you sure you want to activate this Coach?");
			if(result){
				window.location.replace('ActivateCoach.php?AdminId='+id);
			}
		}
		function confirmdeactivate(id) {
			var result = confirm("Are you sure you want to deactivate this Coach?");
			if(result){
				window.location.replace('DeactivateCoach.php?AdminId='+id);
			}
		}
	</script>
</body>
</html>