<!DOCTYPE HTML>
<html>
<head>
	<title>Session Traffic</title>
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
				$admin=$_SESSION['userid'];
				if($_SESSION["userid"]==true) {
					include("header.php"); ?>
					<!-- <ol class="breadcrumb">
						<center><li class="breadcrumb-item"><h4><a href="">Events List</a></h4></li></center>
					</ol> -->
					<?php
					$conx = new Service;
					$conx->connect();
					$stmt = $conx->dbh->prepare("SELECT S.SessionName, COUNT(*) AS TotalRows FROM session S JOIN examgrades E ON E.sessionid = S.SessionId WHERE E.examstatus= 'F' AND E.admin=:admin GROUP BY S.SessionName");
					$stmt->bindParam(":admin",$admin);
					$stmt->execute();
					$result = $stmt->fetchAll(); 
				//	var_dump($result );
					$stmt = $conx->dbh->prepare("SELECT * FROM examgrades Where admin=:admin AND examstatus= 'F'");
					$stmt->bindParam(':admin',$admin);
					$stmt->execute();
					$Counter = $stmt->fetchAll();
					//var_dump($result);
					$Counter= count($Counter);
					?>
					<div class="agile-grids">
						<div class="agile-tables">
							<div class="w3l-table-info">
								<h2>Failed Course Traffic: (<?php echo $Counter;?>) Users </h2>
								<script type="text/javascript">
// window.onload = function() {

// var options = {
// 	title: {
// 		text: "Passed Course Traffic"
// 	},
// 	data: [{
// 			type: "pie",
// 			startAngle: 45,
// 			showInLegend: "true",
// 			legendText: "{label}",
// 			indexLabel: "{label} ({y})",
// 			yValueFormatString:"#,##0.#"%"",
// 			dataPoints: [<?php //foreach ($result as $rows) { ?>
// 				{ label: "<?php //echo $rows['SessionName'];?>", y: <?php //echo $rows['TotalRows']; ?> },
				// { label: "Email Marketing", y: 31 },
				// { label: "Referrals", y: 7 },
				// { label: "Twitter", y: 7 },
				// { label: "Facebook", y: 6 },
				// { label: "Google", y: 12 },
				// { label: "Others", y: 1 }
					<?php //} ?>
// 			]
// 	}]
// };
// $("#chartContainer").CanvasJSChart(options);

// }
window.onload = function () {

var options = {
	title: {
		text: "Failed Course Traffic"
	},

	data: [{
		type: "column",
		yValueFormatString: "#,###",
		indexLabel: "{y}",
      	color: "#546BC1",
		dataPoints: [<?php foreach ($result as $rows) { ?>
			{ label: "<?php echo $rows['SessionName'];?>", y: <?php echo $rows['TotalRows']; ?> },
			// { label: "Gallery", y: 263 },
			// { label: "Dashboards", y: 134 },
			// { label: "Docs", y: 216 },
			// { label: "Support", y: 174 },
			// { label: "Blog", y: 122 },
			// { label: "Others", y: 182 }
		<?php } ?>
		]
	}]
};
$("#chartContainer").CanvasJSChart(options);



}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<?php //include("footer.php"); ?>
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
</body>
</html>