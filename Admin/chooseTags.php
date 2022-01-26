<?php
session_start();
if ($_SESSION["userid"] == true) {

    include("sidebar.php");
    include("connect.php");
    
    $conx = new Service;
    $conx->connect();
    $Title = $_GET['Title'];
    $stmt = $conx->dbh->prepare("SELECT * FROM tags ORDER BY Id");
    $stmt->execute();
    $result = $stmt->fetchAll();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="css/stylesheet.css">
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <title>Choose Tags</title>
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

                    <h3>Choose Tags For This Post</h3>
                    <div class="agile-grids">
                        <div class="agile-tables">
                            <div class="w3l-table-info">
                                
                                <table id="table" style="width: 50%;">
                                    <thead>
                                        <tr>
                                            <th>Tags</th>
                                            <th></th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $rows) { ?>
                                            <tr>
                                                <td style="width: 80%;"><div><?php echo $rows['Tag'] ?></div></td>
                                                
                                                <td style="width: 20%;">

                                                    <?php 
                                                    $tag = $rows['Tag'];
                                                    $Stmt = $conx->dbh->prepare("SELECT COUNT(*) FROM assigned_tags WHERE Tag = '$tag' AND Title = '$Title'");
                                                    $Stmt->execute();
                                                    $res = $Stmt->fetchColumn();
                                                    if ($res > 0){
                                                    ?>
                                                    <a class="btn bg-success full-width text-white" href="unselectTag.php?Tag=<?php echo $rows['Tag']; ?>&Title=<?php echo $Title ?>" >Unselect</a>
                                                    <?php } else {?>
                                                        <a class="btn btn-admin-delete full-width my-3 text-white" href="selectTag.php?Tag=<?php echo $rows['Tag']; ?>&Title=<?php echo $Title ?>">Select</a>
                                                        
                                                        <?php } ?>
                                                </td>
                                            </tr>
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


        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


        

    </body>

    </html>

<?php } else
    header('location:login.php');
?>