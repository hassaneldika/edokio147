<!doctype html>
<html dir="rtl" lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Edokio | Programs</title>
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

    <?php
    include('header.php');
    include('Admin/connect.php');
    $conx = new Service;
    $conx->connect();
    $getTraining = $conx->dbh->prepare("SELECT * FROM trainings WHERE Status = '1' AND Category = 'Training' ");
    $getTraining->execute();
    $getBusinessSupport = $conx->dbh->prepare("SELECT * FROM trainings WHERE Status = '1' AND Category = 'Business Support' ");
    $getBusinessSupport->execute();
    $getRes = $getTraining->fetchAll();
    $res = $getBusinessSupport->fetchAll();
    if (sizeof($getRes) == 0 && sizeof($res) == 0) {
    ?>
        <section id="maincontent">
            <div class="container">
                <div class="text-center" style="padding-top: 200px; padding-bottom: 200px; font-size: 30px;">لا توجد برامج متاحة</div>
            </div>
        </section>
    <?php } else { ?>
        <div class="container py-5" style="margin-top: -65px; background-color: white;">
            <div class="text-center pb-5">
                <h1>البرامج</h1>
            </div>
            <!-- Display programs from database -->
            <?php if (sizeof($getRes)) { ?>
                <div class="mt-3">
                    <h2>تمرين:</h2>
                </div>
                <div class="row my-5">
                    <?php foreach ($getRes as $q) { ?>
                        <div class="col-12 col-sm-4 mb-3">
                            <div class="card" style="border: 2px groove;border-top: 0; border-left: 0; border-right: 0; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                                <div class="card-body">
                                    <?php if ($q['File'] != NULL) { ?>

                                        <div width="310px">
                                            <?php if (substr($q['File'], -4) != '.mp4') { ?>

                                                <img src="Admin/Uploaded Files/<?php echo $q['File'] ?>" width="100%" style="margin-bottom: 45px;">

                                            <?php } else { ?>
                                                <video width="100%" controls>
                                                    <source src="Admin/Uploaded Files/<?php echo $q['File'] ?>" type="video/mp4">
                                                </video>
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <h3 class="card-title tittle-wthree"><?php echo $q['Title']; ?></h3>

                                            <p class="card-text"><?php echo substr($q['Overview'], 0, 100); ?>...</p>

                                            <a href="feedback.php?Id=<?php echo $q['Id'] ?>" class="btn btn-light" style="color: #fc636b;">اقرأ أكثر <span class="text-danger">&rarr;</span></a>
                                        </div>

                                    <?php } else { ?>
                                        <div style="aspect-ratio: 1/1;"></div>
                                        <div>
                                            <h3 class="card-title tittle-wthree"><?php echo $q['Title']; ?></h3>

                                            <p class="card-text"><?php echo substr($q['Overview'], 0, 100); ?>...</p>

                                            <a href="feedback.php?Id=<?php echo $q['Id'] ?>" class="btn btn-light" style="color: #fc636b;">اقرأ أكثر <span class="text-danger">&rarr;</span></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php if (sizeof($getRes) && sizeof($res)) { ?>
                    <div style="width: 100%; border-top: 1px solid;"></div>
            <?php }
            } ?>
            <?php if (sizeof($res)) { ?>
                <div class="mt-3">
                    <h2>دعم الأعمال:</h2>
                </div>
                <div class="row my-5">
                    <?php foreach ($res as $q) { ?>
                        <div class="col-12 col-sm-4 mb-3">
                            <div class="card" style="border: 2px groove;border-top: 0; border-left: 0; border-right: 0; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                                <div class="card-body">
                                    <?php if ($q['File'] != NULL) { ?>

                                        <div width="310px">
                                            <?php if (substr($q['File'], -4) != '.mp4') { ?>

                                                <img src="Admin/Uploaded Files/<?php echo $q['File'] ?>" width="100%" style="margin-bottom: 45px;">

                                            <?php } else { ?>
                                                <video width="100%" controls>
                                                    <source src="Admin/Uploaded Files/<?php echo $q['File'] ?>" type="video/mp4">
                                                </video>
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <h3 class="card-title tittle-wthree"><?php echo $q['Title']; ?></h3>

                                            <p class="card-text"><?php echo substr($q['Overview'], 0, 100); ?>...</p>

                                            <a href="feedback.php?Id=<?php echo $q['Id'] ?>" class="btn btn-light" style="color: #fc636b;">اقرأ أكثر<span class="text-danger">&rarr;</span></a>
                                        </div>

                                    <?php } else { ?>
                                        <div style="aspect-ratio: 1/1;"></div>
                                        <div>
                                            <h3 class="card-title tittle-wthree"><?php echo $q['Title']; ?></h3>

                                            <p class="card-text"><?php echo substr($q['Overview'], 0, 100); ?>...</p>

                                            <a href="feedback.php?Id=<?php echo $q['Id'] ?>" class="btn btn-light" style="color: #fc636b;">اقرأ أكثر<span class="text-danger">&rarr;</span></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <?php
    include('footer.php');
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.accordion-toggle').on('click', function(event) {
                event.preventDefault();
                // create accordion variables
                var accordion = $(this);
                var accordionContent = accordion.next('.accordion-content');
                // var accordionToggleIcon = $(this).children('.toggle-icon');
                // toggle accordion link open class
                accordion.toggleClass("open");
                // toggle accordion content
                accordionContent.slideToggle(250);
            });
        });
    </script>

</body>

</html>