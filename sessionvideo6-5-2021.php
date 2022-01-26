<?php
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION)) {
	session_start();
	// var_dump($_SESSION);
} ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Edokia | Exams </title>
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
		<?php
		// if (!isset($_SESSION['userid']) || !isset($_GET['sessionid'])) {
		// echo "<script>window.location.replace('index.php');</script>";
		// 	exit();
		//	}

		$_SESSION['videostart'] = "started";

		if (isset($_SESSION['videowatched'])) {
			unset($_SESSION['videowatched']);
		}

		$service = new Service();

		if ($service->ExamTaken($_SESSION['userid'], $_GET['sessionid'])) {
			//	echo "<script>alert('Exam already taken and passed.');</script>";

			//	echo "<script>window.location.replace('index.php');
			//	</script>";
			//exit();
		}
		?>

		<section id="maincontent">
			<div class="container ContainerHomePage">
				<link rel="stylesheet" href="fonts/font -arabic.css">
				<?php
				include_once "service.php";
				$service = new Service();
				$sessiondetails = $service->getSessionDetails($_GET['sessionid']);
				if (!empty($sessiondetails['youtube'])) { ?>
					<div class="row pad-row-laws">
						<?php echo $sessiondetails['youtube']; ?>
					</div>
				<?php	} else { ?>
					<div class="row pad-row-laws">
						<video style="width: 100%;position: relative;left: 50%;transform: translateX(-50%);" autoplay controls>
							<source src="Video/<?php echo $sessiondetails['videoname']; ?>" type="video/mp4">
						</video>
					</div>
				<?php	} ?>
				<div class="row" style="height:30px"></div>
				<div class="row pad-row-laws">
					<p class="Arabic_text"><?php echo $sessiondetails['VideoText']; ?>
						<a href="Questionnaire.php?sessionid=<?php echo $_GET['sessionid']; ?>" class="TestButton">الاختبار</a>
					</p>

				</div>
			</div>
		</section>
		<?php include_once "footer.php" ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("video").attr("volume", "1");
				$('video').on('ended', function() {
					console.log('ended');
					$.ajax({
						url: 'videowatched.php',
						success: function(data) {
							//	console.log('success');
							//	window.location.replace('Questionnaire.php?sessionid=<?php //echo $_GET['sessionid']; 
																						?>');
						}
					});
				});
			});
		</script>
		<style type="text/css">
			.TestButton {
				/*width: 100px; */
				/* height: 59px; */
				text-align: center;
				background: #fc636b;
				color: white;
				border: 1px solid white;
				padding-right: 20px;
				margin: auto;
				/* padding: 5px; */
				padding-left: 20px;
			}
		</style>
</body>

</html>