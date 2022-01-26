<!DOCTYPE HTML>
<html>

<head>
    <title>Programs</title>
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
        $stmt = $conx->dbh->prepare("SELECT * FROM trainings ORDER BY Id DESC");
        $stmt->execute();
        $result = $stmt->fetchAll();
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
                                <h2>Programs</h2>

                                <?php $index = 1;
                                foreach ($result as $rows) { ?>
                                    <form action="EditTraining.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="Id" value="<?php echo $rows['Id']; ?>">
                                        <input type="hidden" name="oldFile" value="<?php echo $rows['File']; ?>">
                                        <div class="py-5" style="border-bottom: 1px solid; <?php if ($index % 2 != 0) { ?> background-color: #F3FAFF; <?php } ?>">
                                            <div class="row mb-5 ml-3">
                                                <div style="width: 60%; margin-top: auto; margin-bottom: auto">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <label class="control-label">Title</label>
                                                            <input class="mt-2" style="width: 100%;" type="text" name="Title" class="form-admin-input" value="<?php echo $rows['Title']; ?>" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label for="control-label mb-2">Category</label>
                                                            <select style="width: 100%;" class="form-c mb-5" name="Category" required>
                                                                <option value="Training" <?php if ($rows['Category'] == 'Training') { ?> selected <?php } ?>>Training</option>
                                                                <option value="Business Support" <?php if ($rows['Category'] == 'Business Support') { ?> selected <?php } ?>>Business Support</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="control-label mb-2" for="Module">Number of modules</label>
                                                            <input style="width: 100%;" type="text" name="Module" class="form-admin-input" value="<?php echo $rows['NumberOfModules']; ?>" required>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="control-label mb-2" for="Days">Days</label>
                                                            <input style="width: 100%;" type="text" name="Days" class="form-admin-input" value="<?php echo $rows['Days']; ?>" required>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="control-label mb-2" for="Level">Level</label>
                                                            <input style="width: 100%;" type="text" name="Level" class="form-admin-input" value="<?php echo $rows['Level']; ?>" required>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="control-label mb-2" for="Language">Language</label>
                                                            <input style="width: 100%;" type="text" name="Language" class="form-admin-input" value="<?php echo $rows['Language']; ?>" required>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div style="width: 7%;"></div>
                                                <div style="width: 30%;">

                                                    <div class="mt-3">
                                                        <?php if ($rows['File'] != NULL) {
                                                            if (substr($rows['File'], -4) != '.mp4') { ?>

                                                                <img src="Uploaded Files/<?php echo $rows['File'] ?>" width="100%" style="max-height: 500px;">

                                                            <?php } else { ?>
                                                                <video width="100%" controls >
                                                                    <source src="Uploaded Files/<?php echo $rows['File'] ?>" type="video/mp4">
                                                                </video>
                                                        <?php }
                                                        } ?>
                                                        <div class="mt-2">
                                                            <input type="file" name="file" accept=".gif, .jpeg, .jpg, .png, .mp4">
                                                            <div style="color: red;">
                                                                The image should be of size 1110 x 500 px
                                                            </div>
                                                        </div>
                                                        <div class="mt-3" style="width: 50%;">
                                                            <button class="btn bg-success full-width text-white" style="height: 40px;" type="submit" name="upload"> Change Image/Video </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="mb-5 mx-3">
                                                <div style="color: red;">
                                                    Note: when pasting into the textarea below, select all the text that you have pasted and click on "remove font style" button (the rubber icon)
                                                </div>
                                                <textarea style="width: 100%;" id="id<?php echo $rows['Id']; ?>" name="Overview"><?php echo $rows['Overview']; ?></textarea>
                                            </div>
                                            <div class="row ml-3">
                                                <div class="col-sm-2">
                                                    <a class="btn btn-admin-delete text-white btn-100" href="DeleteTraining.php?Id=<?php echo $rows['Id'] ?>"> Delete </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-admin-edit text-white" type="submit" name="edit"> Edit </button>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a class="btn bg-success full-width text-white" href="addTestimonial.php?Id=<?php echo $rows['Id']; ?>"> Add Testimonial</a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a class="btn btn-admin-add btn-100 text-white " href="testimonials.php?Id=<?php echo $rows['Id']; ?>">View Testimonials</a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <?php if ($rows['Status']) { ?>
                                                        <a class="btn btn-admin-delete full-width text-white" href="disableProgram.php?Id=<?php echo $rows['Id']; ?>">Disable</a>
                                                    <?php } else { ?>
                                                        <a class="btn bg-success full-width text-white" href="enableProgram.php?Id=<?php echo $rows['Id']; ?>">Enable</a>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                    <!-- <div style="width: 100%; border-top: 1px solid grey"></div> -->
                                <?php $index++;
                                } ?>

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

    <script>
        <?php foreach ($result as $rows) { ?>
            // ClassicEditor
            //     .create(document.querySelector('#id' + i))
            //     .catch(error => {
            //         console.error(error);
            //     });
            $(document).ready(function() {
                $('#id' + <?php echo $rows['Id']; ?>).summernote({
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link']],
                    ]
                });
            });
        <?php } ?>
    </script>
</body>

</html>