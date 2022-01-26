<!DOCTYPE HTML>
<html>
<head>
	<title>List of Notifications</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Edokio" />
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
					$stmt = $conx->dbh->prepare("SELECT * FROM Notifications ORDER BY NotificationId DESC");
					$stmt->execute();
					$result = $stmt->fetchAll(); ?>
					<div class="agile-grids">
						<div class="agile-tables">
							<div class="w3l-table-info">
								<h2>Notifications  </h2>
								<table id="table" style="width: auto;">
									<thead>
										<tr>
											<th align="left">Notification Title</th>
											<th align="left" colspan="3">Notification Text</th>
											<th align="left">Notification Link</th>
                                            <th align="left">Notification Date</th>
											<th align="left">Actions</th>
											<th align="center" width="100"></th>
											<th align="center" width="100"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($result as $rows) { ?>
											<form action="editnotification.php" method="post">
												<tr>
				<input type="hidden" name="NotificationId" value="<?php echo $rows['NotificationId']; ?>">
				<td><input type="text" name="NotificationTitle" class="form-admin-input" value="<?php echo $rows['NotificationTitle'];?>" required></td>
                 <td colspan="3"><textarea style="height:200px;" name="NotificationText"><?php echo $rows['NotificationText'];?></textarea>
                    
				 <td><input type="text" name="NotificationLink" class="form-admin-input" value="<?php echo $rows['NotificationLink'];?>" required></td>
				 <td><input type="date" name="NotificationDate" class="form-admin-input" value="<?php echo $rows['NotificationDate'];?>" required></td>
               <td>
			<!-- <a class="btn btn-admin-add text-white" href="SendNotfication.php" target="_blank"> Send </a> -->
            <input type="submit"  name="Send" value="Send">
													</td>
													<!-- <td>
														<a class="btn btn-admin-delete text-white" onclick="confirmdelete(<?php // echo $rows['NotificationId']; ?>)"> Delete </a>
													</td> -->
													<td colspan="2"> 
                                                        <input type="submit" name="Edit"  value="Edit">
														<!-- <button class="btn btn-admin-edit text-white" type="submit" name="lEu9pSFrmo"> Edit </button> -->
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