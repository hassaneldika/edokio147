<!DOCTYPE HTML>
<html>
<head>
	<title>List of students</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Upturn Smart Online Exam System" />
	<style type="text/css">
		.dataTables_length > label{
			margin-right: 15px;
			font-size: 15px;
		}
		.dataTables_length > label > select{
			padding: 5px;
			height: 34px;
		}
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
				<!-- <ol class="breadcrumb">
					<center><li class="breadcrumb-item"><h4><a href="">Student List</a></h4></li></center>
				</ol> -->
			<?php
			$admin=$_SESSION["userid"];
				$conx = new Service;
				$conx->connect();

				$stmt = $conx->dbh->prepare("SELECT * FROM examgrades INNER JOIN tblusers ON examgrades.id = tblusers.id AND  examgrades.admin = tblusers.admin  INNER JOIN session ON examgrades.sessionid = session.SessionId WHERE tblusers.admin=:admin ");
				$stmt->bindParam(":admin",$admin);
				$stmt->execute();
				$result = $stmt->fetchAll();
				//var_dump(count($result));
			?>
			<div class="agile-grids">
				<div class="agile-tables">
					<div class="w3l-table-info">
						<h2>Exam Results</h2>
						<div class=" box">
							<div class="table-responsive">
								<table id="studentlist" class="table table-bordered table-striped">
									<thead>
										<tr> 
											<th>Name</th>
											<th> id</th>
											<th>Presentation name</th>
											<th>Credits</th>
											<th># of correct answers</th>
											<th>Pass/fail</th>
											<th>exam date</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
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
	<link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#studentlist').DataTable({
				"processing" : true,
				"serverSide" : true,
				"ajax" : {
					url:"fetch-results.php",
					type:"POST"
				},
				dom: 'lBfrtip',
				buttons: ['excel'],
			 "lengthMenu": [ [20, 25, 50, -1], [20, 25, 50, "All"] ]
			});
		});
	</script>
</body>
</html>