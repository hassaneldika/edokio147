<?php
include("Admin/connect.php");
$conx = new Service;
$conx->connect();
$tag = $_GET['Tag'];
$query = $conx->dbh->prepare("SELECT * FROM assigned_tags WHERE Tag = '$tag';");
$query->execute();
$result = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="images/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
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
    <div class="container py-5" style="margin-top: -65px; background-color: white;">

        <!-- Display posts from database -->
        <div class="row">
            <?php
            foreach ($result as $res) {
                $title = $res['Title'];
                $sql = $conx->dbh->prepare("SELECT * FROM posts WHERE Title = '$title';");
                $sql->execute();
                $queryResult = $sql->fetchAll();
                foreach ($queryResult as $q) { ?>
                    <div class="col-12 col-sm-4">
                        <div class="card" style="border: 2px groove;border-top: 0; border-left: 0; border-right: 0; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                            <div class="card-body">
                                <?php if ($q['file_url'] != NULL) { ?>

                                    <div width="310px">

                                        <img src="Admin/Posts Images/<?php echo $q['file_url'] ?>" width="100%">

                                    </div>
                                    <div>
                                        <h3 class="card-title tittle-wthree"><?php echo $q['Title']; ?></h3>
                                        <p><?php echo $q['Date']; ?></p>
                                        <p class="card-text"><?php echo substr($q['Content'], 0, 100); ?>...</p>

                                        <a href="viewPost.php?Id=<?php echo $q['Id'] ?>" class="btn btn-light" style="color: #fc636b;">Read More <span class="text-danger">&rarr;</span></a>
                                    </div>

                                <?php } else { ?>
                                    <div style="height: 310px;"></div>
                                    <div>
                                        <h3 class="card-title tittle-wthree"><?php echo $q['Title']; ?></h3>
                                        <p><?php echo $q['Date']; ?></p>
                                        <p class="card-text"><?php echo substr($q['Content'], 0, 100); ?>...</p>

                                        <a href="viewPost.php?Id=<?php echo $q['Id'] ?>" class="btn btn-light" style="color: #fc636b;">Read More <span class="text-danger">&rarr;</span></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>

    </div>
    <?php include("footer.php"); ?>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>