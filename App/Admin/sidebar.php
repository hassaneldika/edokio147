<!DOCTYPE HTML>
<html>

<head>
	<title>Edokio Backend</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Upturn Smart Online Exam System" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/morris.css" type="text/css" />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<!-- <script src="js/jquery-2.1.4.min.js"></script> -->
	<!-- //jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
</head>

<body>
	<div class="sidebar-menu">
		<!-- <header class="">
		bestsmartsolution.com


		</header> -->
		<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
		<div class="menu">
			<ul id="menu">

				<li id="menu-academico"><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i><span> Managers</span>
						<span class="fa fa-angle-right" style="float: right">

						</span>
						<div class="clearfix"></div>
					</a>
					<ul id="menu-academico-sub">
						<li id="menu-academico-avaliacoes"><a href="AddCoaches.php">Add New Manager</a></li>
						<li id="menu-academico-avaliacoes"><a href="ModifyCoaches.php">List of Manager </a></li>

						<li id="menu-academico-avaliacoes"><a href="AssignModules.php">Assign Modules</a></li>
					</ul>
				</li>

				<li id="menu-academico"><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i><span> Notifications</span>
						<span class="fa fa-angle-right" style="float: right">

						</span>
						<div class="clearfix"></div>
					</a>
					<ul id="menu-academico-sub">
						<li id="menu-academico-avaliacoes"><a href="AddNOtifications.php">Add Notification</a></li>
						<li id="menu-academico-avaliacoes"><a href="ListOfNotifications.php">List of Notifications </a></li>


					</ul>
				</li>
				<li id="menu-academico"><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i><span> Modules</span>
						<span class="fa fa-angle-right" style="float: right">

						</span>
						<div class="clearfix"></div>
					</a>
					<ul id="menu-academico-sub">
						<li id="menu-academico-avaliacoes"><a href="addEvent.php">Add Module</a></li>
						<li id="menu-academico-avaliacoes"><a href="Eventlist.php">List Of Modules</a></li>
					</ul>
				</li>
				<li id="menu-academico"><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Courses</span> <span class="fa fa-angle-right" style="float: right"></span>
						<div class="clearfix"></div>
					</a>
					<ul id="menu-academico-sub">
						<li id="menu-academico-avaliacoes"><a href="addSession.php">Add Courses</a></li>
						<li id="menu-academico-avaliacoes"><a href="Sessionslist.php"> List of Courses</a></li>
						<li id="menu-academico-avaliacoes"><a href="listpresentationvideos.php"> Courses Videos</a></li>
					</ul>
				</li>
				<li id="menu-academico"><a href="#"><i class="fa fa-th-list" aria-hidden="true"></i><span> Examination</span> <span class="fa fa-angle-right" style="float: right"></span>
						<div class="clearfix"></div>
					</a>
					<ul id="menu-academico-sub">
						<li id="menu-academico-avaliacoes"><a href="addquestion.php">Add Questions</a></li>
						<!-- <li id="menu-academico-avaliacoes" ><a href = "listofexaminations.php"> List Of Examination</a></li> -->
					</ul>
				</li>
				<li id="menu-academico"><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span> Users</span> <span class="fa fa-angle-right" style="float: right"></span>
						<div class="clearfix"></div>
					</a>
					<ul id="menu-academico-sub">
						<!-- <li id="menu-academico-avaliacoes"><a href="addstudent.php">Add Student</a></li> -->
						<li id="menu-academico-avaliacoes"><a href="studentlist.php"> Results</a></li>
					</ul>
				</li>

				<li id="menu-academico"><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i><span> Jobs</span>
						<span class="fa fa-angle-right" style="float: right">

						</span>
						<div class="clearfix"></div>
					</a>
					<ul id="menu-academico-sub">
						<li id="menu-academico-avaliacoes"><a href="AddJob.php">Add New Job</a></li>
						<li id="menu-academico-avaliacoes"><a href="listofjobs.php">List of Jobs </a></li>


					</ul>
				</li>
				<li id="menu-academico"><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i><span> Graphs</span>
						<span class="fa fa-angle-right" style="float: right">

						</span>
						<div class="clearfix"></div>
					</a>
					<ul id="menu-academico-sub">
						<li id="menu-academico-avaliacoes"><a href="oldpie.php">Courses Traffic</a></li>
						<li id="menu-academico-avaliacoes"><a href="PassedChart.php">Passed Users </a></li>

						<li id="menu-academico-avaliacoes"><a href="FailedChart.php">Failed Users </a></li>
					</ul>
				</li>
				<li id="menu-academico"><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i><span> Programs</span>
						<span class="fa fa-angle-right" style="float: right">

						</span>
						<div class="clearfix"></div>
					</a>
					<ul id="menu-academico-sub">
						<li id="menu-academico-avaliacoes"><a href="addTraining.php">Add Program</a></li>
						<li id="menu-academico-avaliacoes"><a href="trainingsList.php">List of Programs</a></li>

					</ul>
				</li>
				<li id="menu-academico"><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i><span> Blog</span>
						<span class="fa fa-angle-right" style="float: right">

						</span>
						<div class="clearfix"></div>
					</a>
					<ul id="menu-academico-sub">
						<li id="menu-academico-avaliacoes"><a href="createPost.php">Add Post</a></li>
						<li id="menu-academico-avaliacoes"><a href="posts.php">Edit Posts</a></li>
						<li id="menu-academico-avaliacoes"><a href="tags.php">Tags</a></li>
						<li id="menu-academico-avaliacoes"><a href="addTag.php">Add Tag</a></li>

					</ul>
				</li>
				<li id="menu-academico"><a href="homepage-images.php"><i class="fa fa-image" aria-hidden="true"></i><span> Homepage Images</span>
						<div class="clearfix"></div>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="clearfix"></div>
	<!-- </div> -->
	<script type="text/javascript">
		function getConfirm(l) {
			if (arguments[0] != null) {
				if (window.confirm('Get Full Source Code at reasonable cost  ' + l + '?\n')) {
					location.href = l;
				} else {
					event.cancelBubble = true;
					event.returnValue = false;
					return false;
				}
			} else {
				return false;
			}
			return;
		}
	</script>
	<script type="text/javascript">
		var toggle = true;
		$(".sidebar-icon").click(function() {
			if (toggle) {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({
					"position": "absolute"
				});
			} else {
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({
						"position": "relative"
					});
				}, 400);
			}
			toggle = !toggle;
		});
	</script>
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- /Bootstrap Core JavaScript -->
	<!-- morris JavaScript -->
	<script src="js/raphael-min.js"></script>
	<script src="js/morris.js"></script>
	<script>
		$(document).ready(function() {
			//BOX BUTTON SHOW AND CLOSE
			jQuery('.small-graph-box').hover(function() {
				jQuery(this).find('.box-button').fadeIn('fast');
			}, function() {
				jQuery(this).find('.box-button').fadeOut('fast');
			});
			jQuery('.small-graph-box .box-close').click(function() {
				jQuery(this).closest('.small-graph-box').fadeOut(200);
				return false;
			});

			//CHARTS
			function gd(year, day, month) {
				return new Date(year, month - 1, day).getTime();
			}

			graphArea2 = Morris.Area({
				element: 'hero-area',
				padding: 10,
				behaveLikeLine: true,
				gridEnabled: false,
				gridLineColor: '#dddddd',
				axes: true,
				resize: true,
				smooth: true,
				pointSize: 0,
				lineWidth: 0,
				fillOpacity: 0.85,
				data: [{
						period: '2014 Q1',
						iphone: 2668,
						ipad: null,
						itouch: 2649
					},
					{
						period: '2014 Q2',
						iphone: 15780,
						ipad: 13799,
						itouch: 12051
					},
					{
						period: '2014 Q3',
						iphone: 12920,
						ipad: 10975,
						itouch: 9910
					},
					{
						period: '2014 Q4',
						iphone: 8770,
						ipad: 6600,
						itouch: 6695
					},
					{
						period: '2015 Q1',
						iphone: 10820,
						ipad: 10924,
						itouch: 12300
					},
					{
						period: '2015 Q2',
						iphone: 9680,
						ipad: 9010,
						itouch: 7891
					},
					{
						period: '2015 Q3',
						iphone: 4830,
						ipad: 3805,
						itouch: 1598
					},
					{
						period: '2015 Q4',
						iphone: 15083,
						ipad: 8977,
						itouch: 5185
					},
					{
						period: '2016 Q1',
						iphone: 10697,
						ipad: 4470,
						itouch: 2038
					},
					{
						period: '2016 Q2',
						iphone: 8442,
						ipad: 5723,
						itouch: 1801
					}
				],
				lineColors: ['#ff4a43', '#a2d200', '#22beef'],
				xkey: 'period',
				redraw: true,
				ykeys: ['iphone', 'ipad', 'itouch'],
				labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
				pointSize: 2,
				hideHover: 'auto',
				resize: true
			});
		});
	</script>
</body>

</html>