<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Edokia | Register </title>
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

        <!-- about -->
        <section class="about py-5">
            <div class="container py-md-5">
                <h3 class="tittle-wthree text-center">Register</h3>

                <div class="row">

                    <div class="col-lg-6 contact-right-wthree-info login">
                        <h5 class="text-center mb-4"></h5>

                        <?php
                        include_once "service.php";
                        $service = new Service();
                        $Admins = $service->GetAdmins();
                        //var_dump($Admins);
                        ?>
                        <form action="registeraction.php" method="POST">

                            <div class="form-group mt-4">
                                <label class="mb-2">Full Name</label>
                                <input type="Text" name="FullName" class="form-control" id="password1" placeholder="" required="">
                            </div>

                            <div class="form-group mt-4">
                                <label class="mb-2">Coach Name</label>
                                <select name="CoachName" required="required" class="form-control">
                                    <option value=""></option>
                                    <?php foreach ($Admins as $Admin) { ?>
                                        <option class="form-control" value="<?php echo $Admin['AdminId']; ?>"><?php echo $Admin['AdminName']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="form-group mt-4">
                                <label class="mb-2">Phone Number</label>
                                <input type="password" name="Phone" class="form-control" id="password1" placeholder="" required="">
                            </div>

                            <button type="submit" name="loginsubmit" class="btn btn-primary submit mb-4">Submit </button>

                        </form>

                    </div>
                </div>

                <!--   <div class="map-wthree mt-5 p-2">
            

            </div> -->
            </div>
        </section>
        <!-- //about -->

        <?php include_once "footer.php" ?>
</body>

</html>