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
					  $admin=$_SESSION['userid'];
					$conx = new Service;
					$conx->connect();
					$stmt = $conx->dbh->prepare("SELECT * FROM tblusers WHERE admin=:admin ORDER BY id DESC");
					 $stmt->bindParam(':admin',$admin);
					$stmt->execute();
					$result = $stmt->fetchAll(); ?>
					<div class="agile-grids">
						<div class="agile-tables">
							<div class="w3l-table-info">
								<h2>Users </h2>
								<table id="table" style="width: auto;">
									<thead>
										<tr>
											<th align="left">User Name</th>
											<th align="left">User Password</th>
											<th align="left">Actions</th>
											<th align="center" width="100"></th>
											<th align="center" width="100"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($result as $rows) { ?>
											<form action="EditUsers.php" method="post">
												<tr>
													<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
													<td><input type="text" name="email" class="form-admin-input" value="<?php echo $rows['email'];?>" required></td>
                                   <td><input type="text" name="password" class="form-admin-input" value="<?php echo $rows['password'];?>" required></td>
													
												
													<td>
														<a class="btn btn-admin-delete text-white" onclick="confirmdelete(<?php echo $rows['id']; ?>)"> Delete </a>
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
			var result = confirm("Are you sure you want to delete this User?");
			if(result){
				window.location.replace('deleteusers.php?id='+id);
			}
		}
		function confirmactivate(id) {
			var result = confirm("Are you sure you want to activate this User?");
			if(result){
				window.location.replace('ActivateCoach.php?id='+id);
			}
		}
		function confirmdeactivate(id) {
			var result = confirm("Are you sure you want to deactivate this User?");
			if(result){
				window.location.replace('DeactivateCoach.php?id='+id);
			}
		}
	</script>
</body>
</html>