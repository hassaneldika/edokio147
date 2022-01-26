<!DOCTYPE HTML>
<html>

<head>
	<title>Presentation Videos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Upturn Smart Online Exam System" />
	<style type="text/css">
		input {
			width: 100%
		}

		.btn {
			font-size: 12px;
		}

		.searchinput {
			padding-left: 5px;
			width: 40%;
			float: right;
		}

		.searchlabel {
			float: right;
			padding-top: 3px;
			padding-right: 5px;
		}
	</style>
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
		<div class="left-content">
			<div class="mother-grid-inner">
				<?php
				session_start();
				if ($_SESSION["userid"] == true) {
					include("header.php");
				?>
					<div class="agile-grids">
						<div class="agile-tables">
							<div class="w3l-table-info">
								<h2>List of Presentations - Videos</h2>
								<div style="width: 40%;float: right;margin-right: 1px;margin-bottom: 10px;">
									<input type="text" name="searchname" id="searchname" class="searchinput" placeholder="Presentation Name" oninput="filter_data()">
									<label class="searchlabel"><i class="fa fa-search" aria-hidden="true"></i> Search: </label>
								</div>
								<table width="100%" id="table" style="table-layout: fixed;width: 100%;">
									<thead>
										<tr>
											<th align="left">Presentation Name</th>
											<th align="left">Video Name</th>
											<th align="left" colspan="3">Youtube Link</th>
											<th align="left" colspan="3">Video Text</th>
											<th colspan="1" style="text-align: center;">Actions</th>
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
	<?php } else
					header('location:login.php'); ?>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
	<script type="text/javascript">
		function confirmdelete(id) {
			var result = confirm("Are you sure you want to remove this video?");
			if (result) {
				window.location.replace('deletepresentationvideo.php?sessionid=' + id);
			}
		}

		function viewquestions(id) {
			window.location.href = "ExamDetails.php?SessionId=" + id;
		}

		filter_data();

		function filter_data() {
			var action = 'fetch_names';
			var sessionname = $('#searchname').val();

			$.ajax({
				url: "fetch_session_videos.php",
				method: "POST",
				data: {
					action: action,
					sessionname: sessionname
				},
				success: function(data) {
					$('#filter-rows').html(data);
				}
			});
		}

		function submitedit(id) {
			var action = 'editpresentationvideo';
			var videoname = $('#videoname' + id).val();
			var youtube = $('#youtube' + id).val();
			var VideoText = $('#VideoText' + id).val();
			var sessionid = id;

			$.ajax({
				url: "editpresentationvideo.php",
				method: "POST",
				data: {
					action: action,
					videoname: videoname,
					VideoText: VideoText,
					youtube: youtube,
					sessionid: sessionid
				},
				success: function(data) {
					alert('Presentation Info Updated!');
				}
			});
		}
	</script>
</body>

</html>