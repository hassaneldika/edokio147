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
					//var_dump($_SESSION);
					$AdminId=$_SESSION['userid'];
					$conx = new Service;
					$conx->connect();
					$stmt = $conx->dbh->prepare("SELECT * FROM AdminModules Where AdminId=:AdminId ");
					$stmt->bindParam(":AdminId",$_SESSION['userid']);
					$stmt->execute();
					$result = $stmt->fetchAll(); ?>
					<div class="agile-grids">
						<div class="agile-tables">
							<div class="w3l-table-info">
								<h2>Modules List</h2>
								<table id="table" style="width: auto;">
									<thead>
										<tr>
											<th align="left">Module Name</th>
										<!-- 	<th align="left">Module Order</th>
											<th align="left">Actions</th>
											<th align="center" width="100"></th>
											<th align="center" width="100"></th> -->
										</tr>
									</thead>
									<tbody>
										<?php foreach ($result as $rows) { ?>
											<!-- <form action="editevent.php" method="post"> -->
												<form action="#" method="post">
												<tr>
													<input type="hidden" name="ModuleId" value="<?php echo $rows['ModuleId']; ?>">
													<td><input type="text" name="AdminModulesName" class="form-admin-input" value="<?php echo $rows['AdminModulesName'];?>" required></td>
													<!-- <td><input type="number" name="EventOrder" class="form-admin-input" value="<?php //echo $rows['EventOrder'];?>" required></td> -->
												<!-- 	<td> -->
														<?php
														// $status=$rows['EventStatus'];
														// if($status=='0') { ?>
														<!-- <a class="btn bg-danger full-width text-white" onclick="confirmactivate(<?php //echo $rows['ModuleId']; ?>)"> Activate </a>
														<?php //}
														//else if($status=='1') { ?>
														<a class="btn bg-success full-width text-white" onclick="confirmdeactivate(<?php //echo $rows['ModuleId']; ?>)"> Deactivate </a>
														<?php //} ?> -->
													<!-- </td> -->
												<!-- 	<td>
														<a class="btn btn-admin-delete text-white" onclick="confirmdelete(<?php //echo $rows['ModuleId']; ?>)"> Delete </a>
													</td> -->
													<!-- <td>
														<button class="btn btn-admin-edit text-white" type="submit" name="lEu9pSFrmo"> Edit </button>
													</td> -->
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
			var result = confirm("Are you sure you want to delete this Module?");
			if(result){
				window.location.replace('deleteevent.php?eventid='+id);
			}
		}
		function confirmactivate(id) {
			var result = confirm("Are you sure you want to activate this Module?");
			if(result){
				window.location.replace('activateevent.php?eventid='+id);
			}
		}
		function confirmdeactivate(id) {
			var result = confirm("Are you sure you want to deactivate this Module?");
			if(result){
				window.location.replace('deactivateevent.php?eventid='+id);
			}
		}
	</script>
</body>
</html>