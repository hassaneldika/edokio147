<?php
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION)) {
	session_start();
	// var_dump($_SESSION);
} ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Edokio | Exams </title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="" />
	<script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->
	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<!-- /Fonts -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
	<!-- //Fonts -->
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

	<?php if (!isset($_SESSION['id'])) {
		echo "<script>alert('Please login to continue.');
		window.location.replace('login.php');</script>";
		exit();
		//echo "NO SessionId";
	} ?>
	<!-- home -->
	<div id="home" class="inner-w3pvt-page">
		<div class="overlay-innerpage">
			<!-- banner -->
			<div class="top_w3pvt_main container">

				<!-- nav -->
				<?php include_once "menu.php" ?>
				<!-- //nav -->

			</div>
			<!-- //banner -->
		</div>
		<!-- //home -->
		<style type="text/css">
			.mc-radioinput {
				width: auto;
				margin: 0px;
				position: unset !important;
				height: auto;
			}

			ul.choices {
				list-style: none;
				padding: 0px;
			}

			.questionname {
				font-size: 24px;
				text-align: right;
			}

			.questionnaire-labels {
				display: inline-block;
			}
		</style>
		</head>
		<?php include_once "service.php" ?>

		<body>

			<?php
			// if (!isset($_SESSION['userid']) || !isset($_GET['sessionid'])) {
			// 	echo "<script>window.location.replace('index.php');</script>";
			// 	exit();
			// } else if (!isset($_SESSION['videowatched'])) {
			// 	echo "<script>alert('Please watch the entire video.');</script>";
			// 	echo "<script>window.location.replace('sessionvideo.php?sessionid=".$_GET['sessionid']."');</script>";
			// 	exit();
			// } else{
			// 	unset($_SESSION['videowatched']);
			// }

			$allquestions =  $service->getAllQuestions($_GET['sessionid']);

			if (empty($allquestions)) {
				echo "<script>window.location.replace('index.php');</script>";
				exit();
			}

			$datetoshow = substr($allquestions[0]['SessionDate'], 0, 10);
			$datetoshow = trim($datetoshow);
			//var_dump($_SESSION);
			?>
			<section id="storyboardBlue">
				<div class="jumbotron subhead" id="overview">
					<div class="container">
						<div class="row Arabic_DIRection" style="direction: rtl !important;">
							<div class="span8">
								<h3><i class="m-icon-big-swapright m-icon-white"></i><?php echo $allquestions[0]['SessionName']; ?></h3>
							</div>
							<div class="span4"></div>
						</div>
					</div>
				</div>
			</section>
			<section id="maincontent">
				<div class="container ContainerHomePage">
					<link rel="stylesheet" href="fonts/font -arabic.css">
					<div class="row pad-row-laws Arabic_DIRection" style="direction: rtl !important;">
						<form action="questionsubmit.php" method="post">
							<!--  <div><p class="VideoText"><?php //echo $allquestions[0]['VideoText'];
															?></p></div> -->
							<input type="hidden" name="sessionid" value="<?php echo $_GET['sessionid']; ?>">
							<input type="hidden" name="admin" value="<?php echo $_SESSION['admin']; ?>">
							<?php
							///var_dump($_SESSION);
							$questioncount = 1;
							foreach ($allquestions as $questiondetails) {
							?>


								<div class="questionname"><?php echo $questioncount . "- " . $questiondetails['questionname']; ?></div>
								<div style="display: block;height: 10px;"></div>
								<ul class="choices">
									<li>
										<input type="radio" class="mc-radioinput" name="question[<?php echo $questiondetails['qid']; ?>]" value="<?php echo $questiondetails['qid']; ?>-1" id="answer1-q<?php echo $questiondetails['qid']; ?>" required>
										<label class="questionnaire-labels" for="answer1-q<?php echo $questiondetails['qid']; ?>"><?php echo $questiondetails['op1']; ?></label>
									</li>
									<li>
										<input type="radio" class="mc-radioinput" name="question[<?php echo $questiondetails['qid']; ?>]" value="<?php echo $questiondetails['qid']; ?>-2" id="answer2-q<?php echo $questiondetails['qid']; ?>" required>
										<label class="questionnaire-labels" for="answer2-q<?php echo $questiondetails['qid']; ?>"><?php echo $questiondetails['op2']; ?></label>
									</li>
									<li>
										<input type="radio" class="mc-radioinput" name="question[<?php echo $questiondetails['qid']; ?>]" value="<?php echo $questiondetails['qid']; ?>-3" id="answer3-q<?php echo $questiondetails['qid']; ?>" required>
										<label class="questionnaire-labels" for="answer3-q<?php echo $questiondetails['qid']; ?>"><?php echo $questiondetails['op3']; ?></label>
									</li>
									<li>
										<input type="radio" class="mc-radioinput" name="question[<?php echo $questiondetails['qid']; ?>]" value="<?php echo $questiondetails['qid']; ?>-4" id="answer4-q<?php echo $questiondetails['qid']; ?>" required>
										<label class="questionnaire-labels" for="answer4-q<?php echo $questiondetails['qid']; ?>"><?php echo $questiondetails['op4']; ?></label>
									</li>
								</ul>
								<div style="display: block;height: 10px;"></div>
							<?php
								$questioncount++;
							}
							?>
							<input type="submit" name="lEu9pSFrmo" value="SUBMIT" class="Blue_Button">
						</form>
					</div>
					<div class="row" style="height:30px"></div>
				</div>
			</section>
			<?php include_once "footer.php" ?>
			<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
			<script type="text/javascript">
			</script>
		</body>

</html>