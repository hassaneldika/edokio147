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
								<h2>Seccions Traffic </h2>
								
<script type="text/javascript">
window.onload = function() {

var options = {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Seccions Traffic"
	},
	legend:{
		horizontalAlign: "right",
		verticalAlign: "center"
	},
	data: [{
		type: "pie",
		showInLegend: true,
		toolTipContent: "<b>{name}</b>: ${y} (#percent%)",
		indexLabel: "{name}",
		legendText: "{name} (#percent%)",
		indexLabelPlacement: "inside",
		dataPoints: [
		<?php foreach ($result as $rows) { ?>
				{y: <?php echo $rows['TotalRows']; ?>, name: "<?php echo $rows['SessionName'];?>"  },
				<?php } ?>
			// { y: 6566.4, name: "Housing" },
			// { y: 2599.2, name: "Food" },
			// { y: 1231.2, name: "Fun" },
			// { y: 1368, name: "Clothes" },
			// { y: 684, name: "Others"},
			// { y: 1231.2, name: "Utilities" }
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