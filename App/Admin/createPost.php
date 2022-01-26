<?php
session_start();
if ($_SESSION["userid"] == true) {

    include("sidebar.php");
    include("connect.php");

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="css/stylesheet.css">
        <link href="css/style.css" rel='stylesheet' type='text/css' />

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

        <title>Blog</title>
    </head>

    <body>
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
                    <h3>Create Post</h3>
                    <div class="validation-form">

                        <form action="addPost.php" method="POST" enctype="multipart/form-data">
                            <div class="col-md-3 form-group1">
                                <label class="control-label" for="Title">Title</label>
                                <input type="text" placeholder="Title" class="form-control my-3 text-center" name="Title">
                            </div>
                            <div class="col-md-6 form-group1">
                                <label class="control-label" for="Content">Body Text</label>
                                <div style="color: red;">
                                    Note: when pasting into the textarea below, select all the text that you have pasted and click on "remove font style" button (the rubber icon)
                                </div>
                                <textarea name="Content" id="id" class="form-control my-3" placeholder="Content" rows="5"></textarea>
                            </div>
                            <div class="form-group1 col-md-3">
                                <label class="control-label">Upload File</label></br>
                                <div style="color: red;">Image should be of size 1110x500 px</div>
                                <input type="file" name="files" accept=".gif, .jpeg, .jpg, .png, .mp4">

                                <button class="btn btn-admin-add text-white mt-5" name="new_post">Add Post</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>

                    <div class="copyrights">
                        <p>© 2020 Edokio. All rights reserved | by
                            <a href="http://echovalley.net" target="_blank">Echo Valley s.a.r.l</a>

                        </p>
                    </div>
                </div>
            </div>

        </div>



        <script>
            // ClassicEditor
            //     .create(document.querySelector('#id' + i))
            //     .catch(error => {
            //         console.error(error);
            //     });
            $(document).ready(function() {
                $('#id').summernote({
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link']],
                    ]
                });
            });
        </script>
    </body>

    </html>

<?php } else
    header('location:login.php');
?>