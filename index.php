<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <title>Edokio | Home </title>
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
    <link rel="shortcut icon" href="images/logo.png">
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
   <!--<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
    <div id="home">
        <!-- banner -->
        <div class="top_w3pvt_main container">

            <!-- nav -->
            <?php include_once "menu.php" ?>
            <?php

            // include("Admin/connect.php");
            $conx = new Service;
            $conx->connect();
            $query = $conx->dbh->prepare("SELECT * FROM homepage_slider;");
            $query->execute();
            $images = $query->fetchAll();
            ?>
            <!-- //nav -->
            <!-- banner slider -->
            <div id="homepage-slider" class="st-slider" style="direction: ltr;">
                <input type="radio" class="cs_anchor radio" name="slider" id="play1" checked="" />
                <input type="radio" class="cs_anchor radio" name="slider" id="slide1" />
                <input type="radio" class="cs_anchor radio" name="slider" id="slide2" />
                <input type="radio" class="cs_anchor radio" name="slider" id="slide3" />
                <div class="images">
                    <div class="images-inner">
                        <a href="<?php echo $images[0]['link'] ?>">
                            <div class="image-slide">
                                <div class="banner-w3pvt-1" style="background: url(Admin/homepageImages/banner1.jpg) no-repeat top;">
                                    <div class="overlay-wthree"></div>
                                </div>
                            </div>
                        </a>
                        <a href="<?php echo $images[1]['link'] ?>">
                            <div class="image-slide">
                                <div class="banner-w3pvt-2" style="background: url(Admin/homepageImages/banner2.jpg) no-repeat top;">
                                    <div class="overlay-wthree"></div>
                                </div>
                            </div>
                        </a>
                        <a href="<?php echo $images[2]['link'] ?>">
                            <div class="image-slide">
                                <div class="banner-w3pvt-3" style="background: url(Admin/homepageImages/banner3.jpg) no-repeat top;">
                                    <div class="overlay-wthree"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="labels">
                    <div class="fake-radio">
                        <label for="slide1" class="radio-btn"></label>
                        <label for="slide2" class="radio-btn"></label>
                        <label for="slide3" class="radio-btn"></label>
                    </div>
                </div>
                <!-- banner-w3ls-info -->

                <div>
                    <a href="login.php">
                        <div class="content-bg-1 one-bg">
                            <span class="fa fa-lightbulb-o" aria-hidden="true"></span>
                            <h3 class="ban-text">
                            سجّل الدخول                                                
                            </h3>
                        </div>
                    </a>
                    <!-- <a href="examsessions.php"> 
                <div class="content-bg-1 two-bg">
                    <span class="fa fa-book"></span>
                    <h3 class="ban-text">
                        Blended Learning
                    </h3>
                </div>
            </a> -->
                    <!-- <a href="examsessions.php">  -->
                    <!-- <div class="content-bg-1 third-bg">
                    <span class="fa fa-shield" aria-hidden="true"></span>
                    <h3 class="ban-text">
                       Micro-learning
                    </h3>
                </div> -->
                    <!-- </a> -->
                </div>

                <!-- //banner-w3ls-info -->
            </div>
            <!-- //banner slider -->
        </div>
        <!-- //banner -->

        <!-- //home -->

        <!-- about -->
        <section class="about py-5">
            <div class="container py-md-5">
                <div class="about-w3ls-info text-center mx-auto">
                    <h3 class="tittle-wthree pt-md-5 pt-3">معلومات عنا</h3>
                    <p class="sub-tittle mt-3 mb-sm-5 mb-4">
                    إيدوكيو هي منصة  تعليمية رقمية أطلقها المركز اللبناني للتربية المدنية تعنى بدعم النساء والشباب على تنمية مهاراتهم الحياتية وزيادة ثقتهم بنفسهم من أجل تحقيق النجاح في الحياة العملية والشخصية.</p>
                     
                    <p class="sub-tittle mt-3 mb-sm-5 mb-4">
                    تشمل المهارات الحياتية على: المهارات الشخصية (مثل التواصل، التفاوض، العمل الجماعي، الاقناع، تنظيم الوقت، الذكاء العاطفي)، ريادة الأعمال ، المهارات المتعلقة بالتكنولوجيا الرقمية ، اللغات، والثقافة الصحية.</p>
                   
                    <a href="about.php" class="btn btn-primary submit">اقرأ أكثر</a>
                </div>
            </div>
        </section>
        <!-- //about -->
        <!-- /features -->
        <div class="welcome py-5" id="features">
            <div class="container py-xl-5 py-lg-3">
                <div class="row">
                    <div class="col-lg-5 welcome-left">
                        <p>
                        <h3 class="tittle-wthree mt-2 mb-3">
                        لم نحن؟</h3>

                        <p class="mt-4 pr-lg-5">يتمتع فريق ايدوكيو بخبرة تزيد عن العقد من الزمن في تطوير برامج تدريبية للشباب لاكتساب مهارات حياتية وتقنية متعددة. ساهمت هذه النشاطات في دعم الآلاف من المتعلمين من الفئات الشابة لتطوير مهاراتهم والتقدم في سوق العمل والريادة. بناءعلى ذلك تم اطلاق ايدوكيو لتقديم منهجية مبتكرة مخصصة للفئات العمرية الشابة لتطوير المهارات بصورة عصرية بالاعتماد على التقنيات الرقمية و التعلم عبر الموبايل.
                            <a href="about.php">يكمل..</a>
                        </p>
                    </div>
                    <div class="col-lg-7 welcome-right text-center mt-lg-0 mt-5">
                        <div class="row">

                            <div class="col-sm-4 service-1-w3ls serve-gd2">
                                <div class="serve-grid mt-4">
                                    <span class="fa fa-language s2"></span>
                                    <p class="mt-2">التعلم المختلط</p>
                                </div>
                                <div class="serve-grid mt-4">
                                    <span class="fa fa-tachometer s3"></span>
                                    <p class="mt-2">التعلم المصغر</p>
                                </div>
                            </div>
                            <div class="col-sm-4 service-1-w3ls serve-gd3">
                                <div class="serve-grid mt-4">
                                    <span class="fa fa-handshake-o s4"></span>
                                    <p class="mt-2">تمرين</p>
                                </div>
                                <div class="serve-grid mt-4">
                                    <span class="fa fa-address-card-o s5"></span>
                                    <p class="text-li mt-2">إبداع </p>
                                </div>
                                <div class="serve-grid mt-4">
                                    <span class="fa fa-paint-brush s6"></span>
                                    <p class="mt-2">التصميم </p>
                                </div>
                            </div>
                            <div class="col-sm-4 service-1-w3ls serve-gd2">
                                <div class="serve-grid mt-4">
                                    <span class="fa fa-podcast s1"></span>
                                    <p class="mt-2">جودة </p>
                                </div>
                                <div class="serve-grid mt-4">
                                    <span class="fa fa-book s7"></span>
                                    <p class="mt-2">المرونة</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //features -->

        <?php include_once "services.php" ?>

        <?php //include_once "gallery.php"
        ?>

        <?php include_once "footer.php" ?>




</body>

</html>