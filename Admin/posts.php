<!DOCTYPE HTML>
<html>

<head>
    <title>Blog Posts</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

</head>

<body>
    <?php
    session_start();
    if ($_SESSION["userid"] == true) {
        include('connect.php');
        $conx = new Service;
        $conx->connect();
        $stmt = $conx->dbh->prepare("SELECT * FROM posts ORDER BY Id DESC");
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
                                <h2>Blog Posts </h2>

                                <?php $index = 1;
                                foreach ($result as $rows) { ?>
                                    <form action="EditPost.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="file_url" value="<?php echo $rows['file_url']; ?>">
                                        <input type="hidden" name="Id" value="<?php echo $rows['Id']; ?>">
                                        <div class="py-5" style="border-bottom: 1px solid; <?php if ($index % 2 != 0) { ?> background-color: #F3FAFF; <?php } ?>">
                                            <div class="row mb-5 ml-3">
                                                <div style="width: 50%; margin-top: auto; margin-bottom: auto">
                                                    <input style="width: 100%;" type="text" name="Title" class="form-admin-input" value="<?php echo $rows['Title']; ?>" required>
                                                </div>
                                                <div style="width: 10%;"></div>
                                                <div style="width: 30%;">
                                                    <?php if ($rows['file_url'] != NULL) { ?>
                                                        <img src="Posts Images/<?php echo $rows['file_url'] ?>" width="100%" style="object-fit: scale-down;">
                                                    <?php } ?>
                                                    <div class="mt-3">
                                                        <div>
                                                            <input type="file" name="file" accept=".gif, .jpeg, .jpg, .png">
                                                            <div style="color: red;">
                                                                The image should be of size 1110 x 500 px
                                                            </div>
                                                        </div>
                                                        <div class="mt-3" style="width: 40%;">
                                                            <button class="btn bg-success full-width text-white" style="height: 40px;" type="submit" name="upload"> Change Image </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="mb-5 mx-3">
                                                <div style="color: red;">
                                                    Note: when pasting into the textarea below, select all the text that you have pasted and click on "remove font style" button (the rubber icon)
                                                </div>
                                                <textarea rows="5" name="Content" id="id<?php echo $rows['Id']; ?>"><?php echo $rows['Content']; ?></textarea>
                                            </div>
                                            <div class="row ml-3">
                                                <div style="width: 12%;">
                                                    <a class="btn btn-admin-delete text-white full-width" style="height: 40px;" href="deletePost.php?Id=<?php echo $rows['Id']; ?>&file_url=<?php echo $rows['file_url']; ?>"> Delete </a>
                                                </div>
                                                <div class="ml-3" style="width: 12%;">
                                                    <button class="btn btn-admin-edit text-white full-width" style="height: 40px;" type="submit" name="edit"> Edit </button>
                                                </div>
                                                <div class="ml-3" style="width: 12%;">
                                                    <a class="btn btn-primary text-white full-width" style="height: 40px;" href="chooseTags.php?Title=<?php echo $rows['Title']; ?>">Choose Tags</a>
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