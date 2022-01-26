<!DOCTYPE HTML>
<html>
<head>
	<title>Modules Traffic</title>
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
								<h2>Seccion Traffic </h2>
				<script type="text/javascript">
window.onload = function () {

//Better to construct options first and then pass it as a parameter
var options = {
	animationEnabled: true,
	title:{
		text: "Coal Reserves of Countries"   
	},
	axisY:{
		title:"Coal (mn tonnes)"
	},
	toolTip: {
		shared: true,
		reversed: true
	},
	data: [{
		type: "stackedColumn",
		name: "Anthracite and Bituminous",
		showInLegend: "true",
		yValueFormatString: "#,##0mn tonnes",
		dataPoints: [
			{ y: 111338 , label: "USA" },
			{ y: 49088, label: "Russia" },
			{ y: 62200, label: "China" },
			{ y: 90085, label: "India" },
			{ y: 38600, label: "Australia" },
			{ y: 48750, label: "SA" }
		]
	},
	{
		type: "stackedColumn",
		name: "SubBituminous and Lignite",
		showInLegend: "true",
		yValueFormatString: "#,##0mn tonnes",
		dataPoints: [
			{ y: 135305 , label: "USA" },
			{ y: 107922, label: "Russia" },
			{ y: 52300, label: "China" },
			{ y: 3360, label: "India" },
			{ y: 39900, label: "Australia" },
			{ y: 0, label: "SA" }
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