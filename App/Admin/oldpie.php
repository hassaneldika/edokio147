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
				if($_SESSION["userid"]==true) {
					include("header.php"); ?>
					<!-- <ol class="breadcrumb">
						<center><li class="breadcrumb-item"><h4><a href="">Events List</a></h4></li></center>
					</ol> -->
					<?php
					$conx = new Service;
					$conx->connect();
					$stmt = $conx->dbh->prepare("SELECT S.SessionName, COUNT(*) AS TotalRows FROM session S JOIN examgrades E ON E.sessionid = S.SessionId GROUP BY S.SessionName");
					$stmt->execute();
					$result = $stmt->fetchAll(); ?>
					<div class="agile-grids">
						<div class="agile-tables">
							<div class="w3l-table-info">
								<h2>Modules Traffic </h2>
								<script type="text/javascript">
window.onload = function() {

var options = {
	title: {
		text: "Modules Traffic"
	},
	data: [{
			type: "pie",
			startAngle: 45,
			showInLegend: "true",
			legendText: "{label}",
			indexLabel: "{label} ({y})",
			yValueFormatString:"#,##0.#"%"",
			dataPoints: [<?php foreach ($result as $rows) { ?>
				{ label: "<?php echo $rows['SessionName'];?>", y: <?php echo $rows['TotalRows']; ?> },
				// { label: "Email Marketing", y: 31 },
				// { label: "Referrals", y: 7 },
				// { label: "Twitter", y: 7 },
				// { label: "Facebook", y: 6 },
				// { label: "Google", y: 12 },
				// { label: "Others", y: 1 }
					<?php } ?>
			]
	}]
};
$("#chartContainer").CanvasJSChart(options);

}

// window.onload = function () {

// var options = {
// 	animationEnabled: true,
// 	exportEnabled: true,
// 	title: {
// 		text: "Product Manufacturing Expenses"
// 	},
// 	data: [{
// 		type: "pyramid",
// 		indexLabelFontSize: 18,
// 		showInLegend: true,
// 		legendText: "{indexLabel}",
// 		toolTipContent: "<b>{indexLabel}:</b> {y}%",
// 		dataPoints: [
// 			{ y: 30, indexLabel: "Research and Design" },
// 			{ y: 30, indexLabel: "Manufacturing" },
// 			{ y: 15, indexLabel: "Marketing" },
// 			{ y: 13, indexLabel: "Shipping" },
// 			{ y: 12, indexLabel: "Retail" }
// 		]
// 	}]
// };
// $("#chartContainer").CanvasJSChart(options);

// }
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
</body>
</html>