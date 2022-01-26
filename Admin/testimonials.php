<html>

<head>
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <link rel="stylesheet" href="css/table-style.css" type='text/css' />
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
    <?php
    session_start();
    if ($_SESSION["userid"] == true) {
        include('connect.php');
        $conx = new Service;
        $conx->connect();
        $Training_Id = $_GET['Id'];
        $stmt = $conx->dbh->prepare("SELECT * FROM testimonials WHERE Training_Id = $Training_Id ORDER BY Id desc");
        $stmt->execute();
        $result = $stmt->fetchAll();
    ?>
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

                    <div class="agile-grids">
                        <div class="agile-tables">
                            <div class="w3l-table-info">
                                <h2>Testimonials</h2>
                                <table id="table" style="width: auto;">
                                    <thead>
                                        <tr>
                                            <th align="left" style="text-align: center;">Name</th>
                                            <th align="left" style="text-align: center;">Testimonial</th>
                                            <th align="center" style="text-align: center;">Image</th>
                                            <th align="center" width="100"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $rows) { ?>
                                            <form action="EditTestimonial.php" method="POST">
                                                <input type="hidden" name="Id" value="<?php echo $rows['Id'] ?>">
                                                <input type="hidden" name="trainingId" value="<?php echo $Training_Id ?>">
                                                <tr>
                                                    <td style="width: 15%;"><input style="width: 100%;" type="text" name="Name" class="form-admin-input" value="<?php echo $rows['Name'] ?>"></td>
                                                    <td style="width: 60%;">
                                                        <textarea style="width: 100%; line-height: 22px;" rows="10" name="Testimonial"><?php echo $rows['Testimonial'] ?></textarea>
                                                        <div class="mt-3">Date: <?php echo $rows['Date'] ?></div>
                                                    </td>
                                                    <?php if ($rows['Image'] == NULL) { ?>
                                                        <td style="width: 15%;"></td>
                                                    <?php } else { ?>
                                                        <td class="px-5" style="width: 15%;"><img style="width: 200px; height: auto;" src="../Uploaded Images/<?php echo $rows['Image'] ?>"></td>
                                                    <?php } ?>
                                                    <td style="width: 10%;">
                                                        <button class="btn btn-admin-edit mb-3 text-white" type="submit" name="Edit">Edit</button>
                                                        <?php if ($rows['isPublished'] == 0) { ?>
                                                            <a class="btn bg-success full-width my-3 text-white" onclick="confirmPublish(<?php echo $rows['Id']; ?>, <?php echo $Training_Id ?>)">Publish</a> <?php } else { ?>
                                                            <a class="btn btn-admin-delete full-width my-3 text-white" onclick="confirmUnpublish(<?php echo $rows['Id']; ?>, <?php echo $Training_Id ?>)">Unpublish</a> <?php } ?>
                                                        <a class="btn btn-admin-delete full-width my-3 text-white" onclick="confirmDelete(<?php echo $rows['Id']; ?>, <?php echo $Training_Id ?>)">Delete</a>
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

    <?php } else
        header('location:login.php');
    ?>

    <script type="text/javascript">
        function confirmDelete(id, TrainingId) {
            var result = confirm("Are you sure you want to delete this Recommendation?");
            if (result) {
                window.location.replace('deleteComment.php?Id=' + id + '&Training_Id=' + TrainingId);
            }
        }

        function confirmPublish(id, TrainingId) {
            var result = confirm("Are you sure you want to Publish this Recommendation?");
            if (result) {
                window.location.replace('publishComment.php?Id=' + id + '&Training_Id=' + TrainingId);
            }
        }

        function confirmUnpublish(id, TrainingId) {
            var result = confirm("Are you sure you want to Unpublish this Recommendation?");
            if (result) {
                window.location.replace('unpublishComment.php?Id=' + id + '&Training_Id=' + TrainingId);
            }
        }
    </script>

</body>

</html>