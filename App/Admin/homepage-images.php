<!DOCTYPE HTML>
<html>

<head>
    <title>Homepage Images</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- <meta name="keywords" content="Upturn Smart Online Exam System" /> -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
    <!-- Graph CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <link rel="stylesheet" href="css/table-style.css" type='text/css' />
    <link rel="stylesheet" href="css/stylesheet.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script> -->


</head>

<body>

    <?php
    session_start();
    if ($_SESSION["userid"] == true) {
        include('connect.php');
        $conx = new Service;
        $conx->connect();
        $query = $conx->dbh->prepare("SELECT * FROM homepage_slider ORDER BY id");
        $query->execute();
        $image = $query->fetchAll();
    ?>
        <div class="page-container">
            <div class="left-content">
                <div class="mother-grid-inner">

                    <div class="header-main">
                        <div class="logo-w6-agile">


                            <ul class="nav navbar-nav navbar-right">

                                <li>
                                    <a href="logout.php">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        <p>Logout</p>
                                    </a>
                                </li>
                            </ul>
                            <h4>Welcome to Edokio Backend </h4>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="agile-grids">
                        <div class="agile-tables">
                            <div class="w3l-table-info">
                                <h2>Homepage Images</h2>

                                
                                    <form action="editHomepageSlider.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $image[0]['id']; ?>">
                                        <input type="hidden" name="oldFile" value="<?php echo $image[0]['image']; ?>">
                                        <div class="row py-5 my-5" style="border-bottom: 1px solid black;">
                                            <div class="col-md-6">
                                                <img src="homepageImages/<?php echo $image[0]['image']; ?>" style="width: 100%; object-fit: scale-down;">
                                                <div class="mt-3">
                                                    <label for="image">Change Image <span class="ml-3" style="color: red;">Should be of size 1680 x 800 px and .jpg extension</span></label>
                                                    <input type="file" name="file" accept=".jpg">
                                                    <button type="submit" class="btn btn-success mt-3" style="width: 140px;" name="upload">Upload</button>
                                                </div>
                                                <div class="mt-5">
                                                    <label for="link">Link</label>
                                                    <input type="text" class="form-c" style="width: 100%;" name="link" value="<?php echo $image[0]['link']; ?>">
                                                    <button type="submit" class="btn btn-secondary mt-3" style="width: 140px;" name="edit">Edit</button>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="id1" value="<?php echo $image[1]['id']; ?>">
                                        <input type="hidden" name="oldFile1" value="<?php echo $image[1]['image']; ?>">
                                        <div class="row py-5 my-5" style="border-bottom: 1px solid black;">
                                            <div class="col-md-6">
                                                <img src="homepageImages/<?php echo $image[1]['image']; ?>" style="width: 100%; object-fit: scale-down;">
                                                <div class="mt-3">
                                                    <label for="image">Change Image <span class="ml-3" style="color: red;">Should be of size 1680 x 800 px and .jpg extension</span></label>
                                                    <input type="file" name="file1" accept=".jpg">
                                                    <button type="submit" class="btn btn-success mt-3" style="width: 140px;" name="upload1">Upload</button>
                                                </div>
                                                <div class="mt-5">
                                                    <label for="link">Link</label>
                                                    <input type="text" class="form-c" style="width: 100%;" name="link1" value="<?php echo $image[1]['link']; ?>">
                                                    <button type="submit" class="btn btn-secondary mt-3" style="width: 140px;" name="edit1">Edit</button>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="id2" value="<?php echo $image[2]['id']; ?>">
                                        <input type="hidden" name="oldFile2" value="<?php echo $image[2]['image']; ?>">
                                        <div class="row py-5 my-5" style="border-bottom: 1px solid black;">
                                            <div class="col-md-6">
                                                <img src="homepageImages/<?php echo $image[2]['image']; ?>" style="width: 100%; object-fit: scale-down;">
                                                <div class="mt-3">
                                                    <label for="image">Change Image <span class="ml-3" style="color: red;">Should be of size 1680 x 800 px and .jpg extension</span></label>
                                                    <input type="file" name="file2" accept=".jpg">
                                                    <button type="submit" class="btn btn-success mt-3" style="width: 140px;" name="upload2">Upload</button>
                                                </div>
                                                <div class="mt-5">
                                                    <label for="link">Link</label>
                                                    <input type="text" class="form-c" style="width: 100%;" name="link2" value="<?php echo $image[2]['link']; ?>">
                                                    <button type="submit" class="btn btn-secondary mt-3" style="width: 140px;" name="edit2">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                

                            </div>
                        </div>
                    </div>
                    <div class="copyrights">
                        <p>© 2020 Edokio. All rights reserved | by
                            <a href="http://echovalley.net" target="_blank">Echo Valley s.a.r.l</a>

                        </p>
                    </div>
                </div>
            </div>

        </div>

        <?php include("sidebar.php"); ?>
    <?php } else
        header('location:login.php');
    ?>

</body>

</html>