<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="css/style.css" rel='stylesheet' type='text/css' />

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

</head>


<body>
    <?php include("sidebar.php"); ?>
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
                <h3>Add Program</h3>
                <div class="validation-system">

                    <div class="validation-form">
                        <form action="insertTraining.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-2 form-group1">
                                    <label class="control-label" for="Title">Title</label>
                                    <input type="text" id="Title" name="Title" placeholder="Title" aria-required="true" required>
                                </div>
                                <div class="col-md-2 form-group1">
                                    <label class="control-label" for="Module">Number of modules</label>
                                    <input type="text" id="Module" name="Module" placeholder="Number of modules" aria-required="true" required>
                                </div>
                                <div class="col-md-2 form-group1">
                                    <label class="control-label" for="Days">Days</label>
                                    <input type="text" id="Days" name="Days" placeholder="Days" aria-required="true" required>
                                </div>
                                <div class="col-md-2 form-group1">
                                    <label class="control-label" for="Level">Level</label>
                                    <input type="text" id="Level" name="Level" placeholder="Level" aria-required="true" required>
                                </div>
                                <div class="col-md-2 form-group1">
                                    <label class="control-label" for="Language">Language</label>
                                    <input type="text" id="Language" name="Language" placeholder="Language" aria-required="true" required>
                                </div>
                                <div class="col-md-2 form-group1">
                                    <label class="control-label" for="Language">Category</label>
                                    <select class="form-c mt-2" name="Category" id="Category" required>
                                        <option value="">Select Category</option>
                                        <option value="Training">Training</option>
                                        <option value="Business Support">Business Support</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 form-group1">
                                <label class="control-label" for="Overview">Overview Text</label>
                                <div style="color: red;">
                                    Note: when pasting into the textarea below, select all the text that you have pasted and click on "remove font style" button (the rubber icon)
                                </div>
                                <!-- <input type="text" id="BodyText" name="BodyText" placeholder="Body Text" aria-required="true" required> -->
                                <textarea id="id" name="Overview" required></textarea>
                            </div>
                            <div class="col-md-12 form-group1 mb-3">
                                <label class="control-label">Upload Image/Video</label>
                                <input type="file" name="File" accept=".gif, .jpeg, .jpg, .png, .mp4" required>
                            </div>



                            <div class="text-center form-group col-md-2">
                                <button name="submit" type="submit" class="btn btn-admin-add text-white">Submit</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
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