<!DOCTYPE HTML>
<html>

<head>
    <title>Events</title>
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
        $id = $_GET['Id'];
        $stmt = $conx->dbh->prepare("SELECT * FROM feedback WHERE Training_Id = $id ORDER BY Id");
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
                                <h2>Feedbacks </h2>
                                <table id="table" style="width: auto;">
                                    <thead>
                                        <tr>
                                            <th align="left" style="text-align: center;">Title</th>
                                            <th align="left" style="text-align: center;">Body Text</th>
                                            <th align="center" width="100"></th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($result as $rows) { ?>
                                            <form action="EditFeedback.php" method="POST" enctype="multipart/form-data">
                                                <tr>
                                                    <input type="hidden" name="Training_Id" value="<?php echo $id ?>">
                                                    <input type="hidden" name="Id" value="<?php echo $rows['Id']; ?>">
                                                    <td style="width: 20%;"><input style="width: 100%;" type="text" name="Title" class="form-admin-input" value="<?php echo $rows['Title']; ?>" required></td>
                                                    <td style="width: 70%;"><textarea style="width: 100%;" id="id<?php echo $rows['Id']; ?>" name="BodyText"><?php echo $rows['BodyText']; ?></textarea>

                                                        <input type="file" name="files[]" multiple>
                                                    </td>

                                                    <td style="width: 10%;">
                                                        <a class="btn btn-admin-delete text-white btn-100 my-3" href="DeleteFeedback.php?Id=<?php echo $rows['Id'] ?>&Training_Id=<?php echo $id ?>"> Remove </a>
                                                        <button class="btn btn-admin-edit mb-3 text-white" type="submit" name="edit"> Edit </button>
                                                        <button class="btn bg-success full-width text-white" type="submit" name="upload"> Upload </button>

                                                        <a class="btn btn-admin-add btn-100 text-white my-3" href="uploadedFiles.php?id=<?php echo $rows['Id']; ?>&Training_Id=<?php echo $id ?>">View Files</a>

                                                    </td>
                                                </tr>
                                            </form>
                                        <?php } ?>
                                    </tbody>
                                </table>
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