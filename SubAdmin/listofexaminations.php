<!DOCTYPE HTML>
<html>
	<head>
		<title>Exam Questions</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Upturn Smart Online Exam System" />
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
				<center><li class="breadcrumb-item"><h4><a href=""> List of Examinations</a></h4></li></center>
				</ol>
				<?php
				$conx = new Service;
				$conx->connect();
				$stmt = $conx->dbh->prepare("SELECT * FROM session INNER JOIN questiontbl ON session.SessionId=questiontbl.SessionId");
				$stmt->execute();
				$result = $stmt->fetchAll();
				?>
				<div class="agile-grids">
					<div class="agile-tables">
						<div class="w3l-table-info">
							<h2>List of Examinations </h2>
							<table width="100%" id="table">
								<thead>
									<tr>
										<th align="left">Session Name</th>
										<th align="left">Event Name</th>
										<th align="left" colspan="4"></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($result as $rows) {
									?>
									<tr>
									<td><?php echo $rows['SessionName'];?></td>
									<td><?php echo $rows['questionname'];?></td>
									<td><a href="ExamDetails.php?SessionId=<?php echo $rows['SessionId']; ?>">View</a></td>
									<td><a href="deletesession.php?SessionId=<?php echo $rows['SessionId']; ?>">Delete</a></td>
									</tr>
									<?php }?>
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
</body>
</html>