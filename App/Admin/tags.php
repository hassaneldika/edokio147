<?php
session_start();
if ($_SESSION["userid"] == true) {

    include("sidebar.php");
    include("connect.php");
    $conx = new Service;
    $conx->connect();
    $stmt = $conx->dbh->prepare("SELECT * FROM tags ORDER BY Id");
    $stmt->execute();
    $result = $stmt->fetchAll();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <title>Tags</title>

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


                    <div class="agile-grids">
                        <div class="agile-tables">
                            <div class="w3l-table-info">
                                <h2>Tags</h2>
                                <table id="table" style="width: auto;">
                                    <thead>
                                        <tr>
                                            <th align="left" style="text-align: center;">Tag Name</th>
                                            <th align="center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($result as $rows) { ?>
                                            
                                                <tr>


                                                    
                                                    <td><?php echo $rows['Tag']; ?></td>


                                                    <td>
                                                        <a class="btn btn-admin-delete text-white full-width my-3" href="deleteTag.php?Tag=<?php echo $rows['Tag']; ?>" style="background-color: #800;"> Delete </a>
                                                        
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



    </body>

    </html>

<?php } else
    header('location:login.php');
?>