<!DOCTYPE HTML>
<html>
<head>
	<title>Session Lists</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Upturn Smart Online Exam System" />
	<style type="text/css">
		input{width: 100%}
		.btn{font-size: 12px;}
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
					//var_dump($_SESSION);
					if($_SESSION["userid"]==true) {
					include("header.php"); ?>
					<!-- <ol class="breadcrumb">
						<center><li class="breadcrumb-item"><h4><a href=""> List of Sessions</a></h4></li></center>
					</ol> -->
					<?php
					$conx = new Service;
					$conx->connect();
					$stmt = $conx->dbh->prepare("SELECT * FROM session INNER JOIN AdminModules ON session.EventId=AdminModules.ModuleId Where AdminId=:AdminId ");
					$stmt->bindParam(":AdminId",$_SESSION['userid']);
					$stmt->execute();
					$result = $stmt->fetchAll();
                     //var_dump($result);
					$eventstmt = $conx->dbh->prepare("SELECT * FROM event");
					$eventstmt->execute();
					$allevents = $eventstmt->fetchAll();

				?>
				<div class="agile-grids">
					<div class="agile-tables">
						<div class="w3l-table-info">
							<h2>List of Courses</h2>
						<!-- 	<div style="width: 40%;float: right;margin-right: 1px;margin-bottom: 10px;">
								<input type="text" name="searchname" id="searchname" class="searchinput" placeholder="Module Name" oninput="filter_data()">
								<label class="searchlabel"><i class="fa fa-search" aria-hidden="true"></i> Search: </label>
							</div> -->
							<table width="100%" id="table" style="table-layout: fixed;width: 100%;">
								<thead>
									<tr>
										<th align="left" style="width: 12%">Module Name</th>
										<th align="left" style="width: 12%">Course Name</th>
										<th align="left" style="width: 8%"># Of Correct Answers</th>
										<th align="left" style="width: 8%">Grades</th>

										<th align="left" style="width: 10%">Date</th>
										<!-- <th align="left" style="width: 11%">Questions</th>
										<th align="left" style="width: 8%">Status</th>
										<th align="left" style="width: 6%">Delete</th>
										<th align="left" style="width: 6%">Edit</th>
										<th align="left" style="width: 6%">View</th> -->
									</tr>
								</thead>
								<tbody id="filter-rows"></tbody>
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
		header('location:login.php'); ?>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
	<script type="text/javascript">
		function confirmdelete(id) {
			var result = confirm("Are you sure you want to delete this Module?");
			if(result){
				window.location.replace('deletesession.php?sessionid='+id);
			}
		}
		function confirmactivate(id) {
			var result = confirm("Are you sure you want to activate this Module?");
			if(result){
				window.location.replace('activatesession.php?sessionid='+id);
			}
		}
		function confirmdeactivate(id) {
			var result = confirm("Are you sure you want to deactivate this Module?");
			if(result){
				window.location.replace('deactivatesession.php?sessionid='+id);
			}
		}
		function viewquestions(id) {
			window.location.href = "ExamDetails.php?SessionId="+id;
		}
		function addquestion(id) {
			window.location.href = "addquestion.php?SessionId="+id;
		}

		filter_data();

		function filter_data()
		{
			var action = 'fetch_names';
			var sessionname = $('#searchname').val();

			$.ajax({
				url:"fetch_sessions.php",
				method:"POST",
				data:{action:action, sessionname:sessionname},
				success:function(data){
					$('#filter-rows').html(data);
				}
			});
		}

		function submitedit(id)
		{
			var action = 'editsession';
			var sessionname = $('#sessionname'+id).val();
			var eventid = $('#eventid'+id).val();
			var sessioncorrectanswer = $('#sessioncorrectanswer'+id).val();
			var sessioncredits = $('#sessioncredits'+id).val();
			var sessionid = id;

			console.log(action);
			console.log(sessionid);
			console.log(sessionname);
			console.log(eventid);
			console.log(sessioncorrectanswer);
			console.log(sessioncredits);
			$.ajax({
				url:"editsession.php",
				method:"POST",
				data:{action:action, sessionname:sessionname, eventid:eventid, sessioncorrectanswer:sessioncorrectanswer, sessioncredits:sessioncredits, sessionid:sessionid},
				success:function(data){
					alert('Module Info Updated!');
				}
			});
		}
	</script>
</body>
</html>