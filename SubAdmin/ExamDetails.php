<!DOCTYPE HTML>
<html>
<head>
	<title>Exam Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Upturn Smart Online Exam System" />
	<style type="text/css">
		.searchinput{padding-left: 5px;width: 40%;float: right;}
		.searchlabel{float: right;padding-top: 3px;padding-right: 5px;}
	</style>
</head> 
<body>
	<div class="page-container">
		<div class="left-content">
			<div class="mother-grid-inner">
				<?php 
				session_start();
				if($_SESSION["userid"]==true) {
				$SessionId=$_GET['SessionId'];
				include("header.php"); ?>
				<!-- <ol class="breadcrumb">
					<center><li class="breadcrumb-item"><h4><a href=""> List of Examinations</a></h4></li></center>
				</ol> -->
				<?php
					$conx = new Service;
					$conx->connect();
					$stmt = $conx->dbh->prepare('SELECT * FROM session INNER JOIN questiontbl ON session.SessionId=questiontbl.SessionId where session.SessionId = "'.$SessionId.'"');
					$stmt->execute();
					$result = $stmt->fetchAll();

					$stmtsession = $conx->dbh->prepare('SELECT * FROM session WHERE SessionId = "'.$SessionId.'"');
					$stmtsession->execute();
					$sessiondetails = $stmtsession->fetch();
				?>
				<div class="agile-grids">
					<div class="agile-tables">
						<div class="w3l-table-info">
							<h2><?php echo $sessiondetails['SessionName'];?></h2>
							<div style="width: 10%;float: right;margin-right: 1px;margin-top: -40px;">
								<a class="btn btn-admin-edit text-white" onclick="addquestion(<?php echo $SessionId;?>)"> Add Question </a>
								<!-- <input type="text" name="searchname" id="searchname" class="searchinput" placeholder="Presentation Name"> -->
							</div>
							<table width="100%" id="table">
								<thead>
									<tr>
										<th align="left" colspan="8">Question Name</th>
									</tr>
									<tr>
										<th align="left" colspan="">Grades</th>
										<th align="left" colspan="">First Option</th>
										<th align="left">Second Option</th>
										<th align="left">Third Option</th>
										<th align="left">Fourth Option</th>
										<th align="left">Correct Option</th>
										<th align="left">Actions</th>
										<th align="left"></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($result as $rows) { ?>
									<tr>
										<td colspan="8"><?php echo $rows['questionname'];?></td>
									</tr>
									<tr>
										<td style="border-bottom: 1px solid #0454ab"><?php echo $rows['Grades'];?></td>
										<td style="border-bottom: 1px solid #0454ab" colspan=""><?php echo $rows['op1'];?></td>
										<td style="border-bottom: 1px solid #0454ab"><?php echo $rows['op2'];?></td>
										<td style="border-bottom: 1px solid #0454ab"><?php echo $rows['op3'];?></td>
										<td style="border-bottom: 1px solid #0454ab"><?php echo $rows['op4'];?></td>
										<td style="border-bottom: 1px solid #0454ab"><?php echo $rows['correctop'];?></td>

										<td style="border-bottom: 1px solid #0454ab">
											<a href="questiondetails.php?qid=<?php echo $rows['qid']; ?>" class="btn btn-admin-add text-white"> View </a>
										</td>
										<td style="border-bottom: 1px solid #0454ab">
											<!-- <a href="deletesession.php?sessionid=<?php echo $rows['SessionId']; ?>">Delete</a> -->
											<a class="btn btn-admin-delete text-white" onclick="confirmdelete(<?php echo $rows['qid']; ?>,<?php echo $_GET['SessionId']; ?>)"> Delete </a>
										</td>
									</tr>
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
		function confirmdelete(id,id2) {
			var result = confirm("Are you sure you want to delete this question?");
			if(result){
				window.location.replace('deletequestion.php?qid='+id+'&sessionid='+id2);
			}
		}
		function addquestion(id) {
			window.location.href = "addquestion.php?SessionId="+id;
		}
	</script>
</body>
</html>