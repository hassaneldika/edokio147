<?php
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION)) {
	session_start();
	// var_dump($_SESSION);
} ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Edokia | Market opportunities </title>
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
		//echo "<script>alert('Please login to continue.');
		//window.location.replace('login.php');</script>";
		//exit();
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

		<section id="maincontent">
			<div class="container ContainerHomePage">
				<div style="height: 30px; display: block;width: 100%"></div>
				<h3 class="tittle-wthree text-center">Market opportunities/وظائف شاغرة</h3>
				<div style="height: 30px; display: block;width: 100%"></div>
				<?php
				include_once "service.php";
				$service = new Service();
				$alljobs =  $service->GetAllJobs();
				//var_dump($alljobs);
				?>
				<div class="row pad-row-laws">
					<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js">

					</script>
					<div class="container" style="padding-right: 0px !important;padding-left: 0px !important">
						<div class="accordion" id="accordion2">
							<?php foreach ($alljobs as $jobs) {
								$datetoshow = substr($jobs['JobDate'], 0, 10);
								$datetoshow = trim($datetoshow); ?>

								<div class="accordion-container">
									<div class="accordion-toggle" id="event<?php echo $jobs['JobId'] ?>">
										<p class="ModuleTitle">
											<?php echo $jobs['JobName'] ?>- <?php echo $datetoshow; ?>

										</p>
									</div>
									<div class="accordion-content" style="display: none;">
										<p style="text-align: right;"> <?php echo $jobs['JobText'] ?> </p>
										<a href="<?php echo $jobs['JobLink'] ?>" class="sessionlistlinks" target="_blank">
											التفاصيل</a>

									</div>
									<!--/.accordion-content-->
								</div>

							<?php } ?>
						</div>
					</div>
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
					<script type="text/javascript">
						$(document).ready(function() {
							$('.accordion-toggle').on('click', function(event) {
								event.preventDefault();
								// create accordion variables
								var accordion = $(this);
								var accordionContent = accordion.next('.accordion-content');
								var accordionToggleIcon = $(this).children('.toggle-icon');

								// toggle accordion link open class
								accordion.toggleClass("open");
								// toggle accordion content
								accordionContent.slideToggle(250);
							});
						});
					</script>
				</div>
				<div class="row" style="height:30px"></div>
			</div>
		</section>
		<?php include_once "footer.php" ?>
</body>

</html>