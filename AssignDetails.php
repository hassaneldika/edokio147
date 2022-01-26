<!DOCTYPE HTML>
<html>

<head>
	<title>Events</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Upturn Smart Online Exam System" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-T54Y1DPZ01"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
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
				if ($_SESSION["userid"] == true) {
					include("header.php"); ?>
					<!-- <ol class="breadcrumb">
						<center><li class="breadcrumb-item"><h4><a href="">Events List</a></h4></li></center>
					</ol> -->
					<?php
					//var_dump($_POST);
					if (isset($_POST['AdminId'])) {
						$AdminId = $_POST['AdminId'];
					} else {
						$AdminId = $_GET['CoachId'];
					}

					$conx = new Service;
					$conx->connect();
					$stmt = $conx->dbh->prepare("SELECT * FROM Admins WHERE AdminId=:AdminId");
					$stmt->bindParam(":AdminId", $AdminId);
					$stmt->execute();
					$Admins = $stmt->fetchAll();
					// var_dump($Admins);
					$conx = new Service;
					$conx->connect();
					$stmt = $conx->dbh->prepare("SELECT * FROM event ORDER BY EventId DESC");
					$stmt->execute();
					$result = $stmt->fetchAll();


					?>
					<div class="agile-grids">
						<div class="agile-tables">
							<div class="w3l-table-info">
								<h2>Assign Coaches</h2>
								<table id="table" style="width: auto;">
									<thead>
										<tr>
											<th align="left">Coach Name</th>
											<th align="left">Module Name</th>
											<th align="left">Actions</th>
											<th align="center" width="100"></th>
											<th align="center" width="100"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($result as $rows) { ?>
											<form action="AssignActions.php?CoachId=<?php echo $Admins[0]['AdminId']; ?>" method="post">
												<tr>
													<input type="hidden" name="EventId" value="<?php echo $rows['EventId']; ?>">


													<td>


														<input type="text" name="AdminName" class="form-admin-input" value="<?php echo $Admins[0]['AdminName']; ?>" required>


														<input type="hidden" name="AdminId" value="<?php echo $Admins[0]['AdminId']; ?>">
													</td>
													<td><input type="text" name="EventName" class="form-admin-input" value="<?php echo $rows['EventName']; ?>" required></td>

													<td>
														<?php
														$conx->connect();
														$stmt = $conx->dbh->prepare("SELECT * FROM AdminModules WHERE AdminId=:AdminId AND ModuleId=:ModuleId");
														$stmt->bindParam(":AdminId", $AdminId);
														$stmt->bindParam(":ModuleId", $rows['EventId']);
														$stmt->execute();
														$Modules = $stmt->fetchAll();


														$status = count($Modules);
														if ($status > 0) { ?>

															<button class="btn bg-danger full-width text-white" type="submit" name="DeleteAssignment"> Assigned </button>
														<?php } else if ($status < 1) { ?>

															<button class="btn bg-success full-width text-white" type="submit" name="lEu9pSFrmo"> Click to Assign </button>
														<?php } ?>
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
	<?php } else
					header('location:login.php');
	?>
	</div>
	<script type="text/javascript">
		function confirmdelete(id) {
			var result = confirm("Are you sure you want to delete this Module?");
			if (result) {
				window.location.replace('deleteevent.php?eventid=' + id);
			}
		}

		function confirmactivate(id) {
			var result = confirm("Are you sure you want to activate this Module?");
			if (result) {
				window.location.replace('activateevent.php?eventid=' + id);
			}
		}

		function confirmdeactivate(id) {
			var result = confirm("Are you sure you want to deactivate this Module?");
			if (result) {
				window.location.replace('deactivateevent.php?eventid=' + id);
			}
		}
	</script>
</body>

</html>