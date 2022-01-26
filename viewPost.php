<?php
if (isset($_GET['Id'])) {
    include("Admin/connect.php");
    $conx = new Service;
    $conx->connect();
    $Id = $_GET['Id'];
    $sql = $conx->dbh->prepare("SELECT * FROM posts WHERE Id = $Id;");
    $sql->execute();
    $query = $sql->fetchAll();
    $baseUrl = "http://edokio.com/viewPost.php?Id=$Id";
    $description = substr($query[0]['Content'], 0, 100);

?>


    <!DOCTYPE html>
    <html dir="rtl" lang="ar" prefix="og: https://ogp.me/ns#">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:title" content="<?php echo $query[0]['Title']; ?>" />
        <meta property="og:description" content="<?php echo $description ?>" />
        <meta property="og:url" content="<?php echo $baseUrl ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="http://edokio.com/Admin/Posts%20Images/<?php echo $query[0]['file_url']; ?>" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="shortcut icon" href="images/logo.png">
        <title>Edokio | Blog</title>
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
        <?php include("header.php"); ?>
        <div class="container pt-5" style="margin-top: -65px; background-color: white;">

            <?php foreach ($query as $q) { ?>
                <div class="p-2 rounded-lg text-center">
                    <h3 class="tittle-wthree"><?php echo $q['Title']; ?></h3>
                </div>

                <?php

                if ($q['file_url'] != NULL) { ?>

                    <div class="my-5"><img src="Admin/Posts Images/<?php echo $q['file_url'] ?>" width="100%" style="max-height: 500px;"></div>

                <?php } ?>

                <div style="color: grey;"><?php echo $q['Date']; ?></div>
                <div class="my-5 border-left border-dark pl-3"><?php echo $q['Content']; ?>
                </div>

                <div class="pb-5">
                    <div><strong>العلامات</strong></div>

                    <?php
                    $Title = $q['Title'];
                    $stmt = $conx->dbh->prepare("SELECT * FROM assigned_tags WHERE Title = '$Title';");
                    $stmt->execute();
                    $Result = $stmt->fetchAll();
                    foreach ($Result as $Res) {
                    ?>

                        <a class="btn btn-outline-primary my-1" href="SimilarPosts.php?Tag=<?php echo $Res['Tag']; ?>"><?php echo $Res['Tag']; ?></a>

                    <?php } ?>
                </div>



                <div>
                    <strong>الوظائف ذات الصلة </strong>
                    <div class="row pt-3">
                        <?php
                        $SQL = $conx->dbh->prepare("SELECT COUNT(*) FROM assigned_tags WHERE Title = '$Title';");
                        $SQL->execute();
                        $count = $SQL->fetchColumn();
                        if ($count > 0) {
                            $counter = 0;

                            $array = array();
                            for ($index = 0; $index < $count; $index++) {
                                $tag = $Result[$index]['Tag'];
                                $Query = $conx->dbh->prepare("SELECT DISTINCT Title FROM assigned_tags NATURAL JOIN posts WHERE Tag = '$tag' AND Title != '$Title' ORDER BY rand() LIMIT 4;");
                                $Query->execute();
                                $relatedTitles = $Query->fetchAll();
                                foreach ($relatedTitles as $title) {
                                    $postTitle = $title['Title'];
                                    array_push($array, $postTitle);
                                    $num = 0;
                                    foreach ($array as $arr) {
                                        if ($arr == $postTitle)
                                            $num++;
                                    }
                                    if ($num < 2) {
                                        $getPosts = $conx->dbh->prepare("SELECT * FROM posts WHERE Title = '$postTitle'");
                                        $getPosts->execute();
                                        $relatedPosts = $getPosts->fetchAll();
                                        foreach ($relatedPosts as $row) {
                                            $counter++;
                        ?>

                                            <div class="col-12 col-sm-3">
                                                <div class="card" style="border: 2px groove;border-top: 0; border-left: 0; border-right: 0; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                                                    <div class="card-body">
                                                        <?php if ($row['file_url'] != NULL) { ?>

                                                            <div width="215px">

                                                                <img src="Admin/Posts Images/<?php echo $row['file_url'] ?>" width="100%">

                                                            </div>
                                                            <div>
                                                                <h3 class="card-title tittle-wthree"><?php echo $row['Title']; ?></h3>
                                                                <p><?php echo $row['Date']; ?></p>
                                                                <p class="card-text"><?php echo substr($row['Content'], 0, 100); ?>...</p>

                                                                <a href="viewPost.php?Id=<?php echo $row['Id'] ?>" class="btn btn-light" style="color: #fc636b;">اقرأ أكثر<span class="text-danger">&rarr;</span></a>
                                                            </div>

                                                        <?php } else { ?>
                                                            <div style="aspect-ratio: 1/1;"></div>
                                                            <div>
                                                                <h3 class="card-title tittle-wthree"><?php echo $row['Title']; ?></h3>
                                                                <p><?php echo $row['Date']; ?></p>
                                                                <p class="card-text"><?php echo substr($row['Content'], 0, 100); ?>...</p>

                                                                <a href="viewPost.php?Id=<?php echo $row['Id'] ?>" class="btn btn-light" style="color: #fc636b;">اقرأ أكثر <span class="text-danger">&rarr;</span></a>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>

                        <?php }
                                    }
                                }
                            }
                        } ?>
                    </div>
                </div>

                </br>
                </br>
                <a href="blog.php" class="btn btn-outline-primary my-3">عد</a>
                </br>
                </br>
                <p><strong>شارك </strong></p>
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style mb-3">
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_linkedin"></a>
                </div>
                <!-- <div class="pb-5 row">

                    <div class="mx-2"><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php //echo $baseUrl; 
                                                                                                    ?>"> <img src="images/facebook.png" width="40px" height="40px" style="object-fit: fill;"></a></div>

                    <div class="mx-2"><a target="_blank" href="http://twitter.com/share?text=Visit the link &url=<?php //echo $baseUrl; 
                                                                                                                    ?>"><img src="images/twitter.png" width="40px" height="40px" style="object-fit: fill;"></a></div>

                    <div class="mx-2"><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php //echo $baseUrl; 
                                                                                                                    ?>"> <img src="images/linkedin.png" width="40px" height="40px" style="object-fit: fill;"></a></div>


                </div> -->

            <?php } ?>
        </div>
        <?php include("footer.php"); ?>
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <script async src="https://static.addtoany.com/menu/page.js"></script>
    </body>

    </html>

<?php } ?>