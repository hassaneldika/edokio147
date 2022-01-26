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
		//var_dump($_SESSION);
		if (!isset($_SESSION['userid'])) {
			//echo "<script>window.location.replace('index.php');</script>";
			//exit();
			//echo "HERER";
		} else if (!isset($_SESSION['examsessionname']) || !isset($_SESSION['examnumofcorrect']) || !isset($_SESSION['examnumofquestions']) || !isset($_SESSION['examcredits']) || !isset($_SESSION['examstatus'])  || !isset($_SESSION['examsessionid'])) {
			//echo "<script>window.location.replace('index.php');</script>";
			//	 exit();
			//var_dump($_SESSION);
			//echo "HERER2";
		}
		$id = $_SESSION['id'];
		//var_dump($id);
		$UserName = $service->GetUserName($id);
		//var_dump($UserName);
		//var_dump($_SESSION);
		?>

		<section id="maincontent">
			<div class="container ContainerHomePage">
				<div style="height: 30px; display: block;width: 100%"></div>
				<h3 class="tittle-wthree text-center ">Results</h3>
				<div style="height: 30px; display: block;width: 100%"></div>
				<div class="row pad-row-laws" style=";display:block;    padding-right: 15px;
    padding-left: 15px;">
					<?php
					//var_dump($_SESSION);
					$examsessionid = $_SESSION['examsessionid'];
					$getQuizDetails = $service->getQuizDetails($examsessionid);
					//echo'<br>';
					//var_dump($getQuizDetails);
					//echo'hiiiii';
					//	echo'<br>';
					//	echo'My session Id is';
					$SessionId = $getQuizDetails[0]['SessionId'];
					$Direction = $service->GetDirection($SessionId);
					//echo'<br>';
					$TextDirection = $Direction[0]['direction'];

					//	echo'<br>';
					if ($_SESSION['examstatus'] == 'P') {
						if ($TextDirection == 'Arabic' || $TextDirection == 'arabic' || $TextDirection == 'Ar'  || $TextDirection == 'ar') {
					?>
							<!-- PASSED -->

							<h2 class="pagetitle Arabic_DIRection">&nbsp;&nbsp;<img src="img/green-tick.png" style="width: 50px;">مبروك
							</h2>
							<p class="messagetext Arabic_DIRection"><br><span style="color:#007bff !important;text-decoration: underline;display: contents;">&nbsp;<?php echo $UserName[0]['email']; ?></span>,<br></p>
							<p class="messagetext Arabic_DIRection">&nbsp;لقد اجتزت التقييم بنجاح<br><?php echo $_SESSION['examsessionname']; ?><br></p>
							<p class="messagetext Arabic_DIRection">إذ لقد جاوبت بشكل صحيح على<?php echo $_SESSION['examnumofcorrect']; ?>من<?php echo $_SESSION['examnumofquestions']; ?> فقط<br></p>

						<?php } else { ?>

							<h2 class="pagetitle EnglishDir">&nbsp;&nbsp;<img src="img/green-tick.png" style="width: 50px;">Congratulations
							</h2>
							<p class="messagetext2 EnglishDir"><br><span style="color:#007bff !important;text-decoration: underline;display: contents;">&nbsp;<?php echo $UserName[0]['email']; ?></span>,<br></p>
							<p class="messagetext2 EnglishDir">&nbsp;You passed the quiz <br><?php echo $_SESSION['examsessionname']; ?><br></p>
							<p class="messagetext2 EnglishDir"> <?php echo $_SESSION['examnumofcorrect']; ?> out <?php echo $_SESSION['examnumofquestions']; ?> <br></p>


						<?php }
					} else if ($_SESSION['examstatus'] == 'F') {
						if ($TextDirection == 'Arabic' || $TextDirection == 'arabic' || $TextDirection == 'Ar'  || $TextDirection == 'ar') { ?>
							<!-- FAIL --><br>
							<h2 class="pagetitle Arabic_DIRection">
								<img src="img/red-x.png" style="width: 50px;">
								للأسف
							</h2>
							<p class="messagetext Arabic_DIRection"><br><span style="color:#007bff !important;text-decoration: underline;display: contents;">&nbsp;<?php echo $UserName[0]['email']; ?></span>,<br></p>
							<p class="messagetext Arabic_DIRection"> لم تجتز التقييم&nbsp;<br> <?php echo $_SESSION['examsessionname']; ?><br></p>
							<p class="messagetext Arabic_DIRection">إذ لقد جاوبت بشكل صحيح على<?php echo $_SESSION['examnumofcorrect']; ?>من<?php echo $_SESSION['examnumofquestions']; ?> فقط<br></p>
							<div class="row" style="height:20px"></div>

						<?php } else { ?>
							<h2 class="pagetitle EnglishDir">
								<img src="img/red-x.png" style="width: 50px;">
								Sorry
							</h2>
							<p class="messagetext2 EnglishDir"><br><span style="color:#007bff !important;text-decoration: underline;display: contents;">&nbsp;<?php echo $UserName[0]['email']; ?></span>,<br></p>
							<p class="messagetext2 EnglishDir"> You failed the quiz&nbsp;<br> <?php echo $_SESSION['examsessionname']; ?><br></p>
							<p class="messagetext2 EnglishDir">You provided correct answers <?php echo $_SESSION['examnumofcorrect']; ?> out <?php echo $_SESSION['examnumofquestions']; ?> <br></p>
							<div class="row" style="height:20px"></div>

						<?php }
					}

					if ($TextDirection == 'Arabic' || $TextDirection == 'arabic' || $TextDirection == 'Ar'  || $TextDirection == 'ar') { ?>

						<div class="Arabic_DIRection" style="">
							<?php foreach ($getQuizDetails as $getQuizDetail) {
								echo '  :السؤال';
								echo '<br>';
								echo $getQuizDetail['questionname'];

								echo '<br>';






								if ($getQuizDetail['correctop'] == '1') {
									$CorrectAnswer = $getQuizDetail['op1'];
								} elseif ($getQuizDetail['correctop'] == '2') {
									$CorrectAnswer = $getQuizDetail['op2'];
								} elseif ($getQuizDetail['correctop'] == '3') {
									$CorrectAnswer = $getQuizDetail['op3'];
								} elseif ($getQuizDetail['correctop'] == '4') {
									$CorrectAnswer = $getQuizDetail['op4'];
								}
								echo '  :الجواب الصحيح';
								echo '<br>';
								echo $CorrectAnswer;

								echo '<div class="row" style="height:20px"></div>';
								echo '<p class="messagetext Arabic_DIRection"><br>
								<a href="examsessions.php" class="btn btn-primary submit mb-4">الرجوع للقائمة</a></p>';
							} ?>



						</div>
					<?php } else { ?>

						<div class="EnglishDir">
						<?php foreach ($getQuizDetails as $getQuizDetail) {
							echo 'The question: ';
							echo '<br>';
							echo $getQuizDetail['questionname'];

							echo '<br>';






							if ($getQuizDetail['correctop'] == '1') {
								$CorrectAnswer = $getQuizDetail['op1'];
							} elseif ($getQuizDetail['correctop'] == '2') {
								$CorrectAnswer = $getQuizDetail['op2'];
							} elseif ($getQuizDetail['correctop'] == '3') {
								$CorrectAnswer = $getQuizDetail['op3'];
							} elseif ($getQuizDetail['correctop'] == '4') {
								$CorrectAnswer = $getQuizDetail['op4'];
							}
							echo 'The correct answer:';
							echo '<br>';
							echo $CorrectAnswer;

							echo '<div class="row" style="height:20px"></div>';
							echo '<p class="messagetext Arabic_DIRection"><br>
										<a href="examsessions.php" class="btn btn-primary submit mb-4">Back</a></p>';
						}
					}
						?>



						<?php  //echo $getQuizDetail['questionname'];
						?>




						</div>
						<div class="row" style="height:30px"></div>
				</div>
		</section>
		<?php include_once "footer.php" ?>
</body>

</html>

<style type="text/css">
	/* p.messagetext {
    display: contents;
} */
</style>