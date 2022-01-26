
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
<?php 
error_reporting(E_ALL^E_NOTICE);
if (!isset($_SESSION)) {
    session_start();
    //var_dump($_SESSION);
  }
  include_once"service.php";
  $service = new Service();

    // CODE FOR PAGE REDIRECTION
    $c = basename($_SERVER['REQUEST_URI']); $t = trim($c);
    if ($t != 'login.php' && $t != 'registration.php' && $t != 'edokio') {
        $_SESSION['pagedirect']=$t;
    }
    else if (($t=='login.php' && !isset($_SESSION['pagedirect'])) || ($t=='register.php' && !isset($_SESSION['pagedirect'])) || ($t == 'edokio')) {
        $_SESSION['pagedirect']='index.php';
    }



?>

    <div class="nav_w3pvt text-center " >
                <!-- nav -->
                <nav class="lavi-wthree">
                    <div id="logo">
       <h1> <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" style="width: 100%"><h6>المهارات الحياتية للنجاح</h6></a>
                        </h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mr-auto">
                        <li class="active"><a href="index.php">الرئيسية</a></li>
                        <li><a href="about.php">من نحن</a></li>
                        <!-- <li><a href="Marketopportunities.php">Market </a></li> -->
                       
                         <li><a href="examsessions.php">فيديوهات تعليمية    </a></li>
                        <!-- <li>
                            
                            <label for="drop-2" class="toggle">E-Learning<span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">E-Learning <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-2" />
                            <ul>
                                <li><a href="#features">Features</a>
                                </li>
                                <li><a href="#services">Services</a>
                                </li>
                                <li><a href="#gallery">Gallery</a>
                                </li>
                                <li><a href="#test">Testimonials</a>
                                </li>
                                <li><a href="#">Blogs</a>
                                </li>
                            </ul>
                        </li> -->
                        <li><a href="trainings.php">البرامج</a></li>
                        <li><a href="blog.php">أخبار متنوعة</a></li>
                        <li><a href="contact.php">تواصل معنا</a>
                        
                            <?php if (isset($_SESSION['id'])) {



$service->connect();
//var_dump($_SESSION);
$id= $_SESSION['id'];
//var_dump($id);
$UserName = $service->GetUserName($id);
//var_dump($UserName);     
                             
                                ?>
                        <li class="log-vj ml-lg-5"><a href="login.php">
                    <span class="far fa-user-circle" aria-hidden="true"></span> Welcome: <?php echo $UserName[0]['email'] ;?></a>
                </li>
                     <li class="log-vj ml-lg-5"><a href="logout.php">
                    <span class="fa fa-sign-out-alt " aria-hidden="true"></span> Logout</a>
                </li>
                     <?php } else {?>
   <li class="log-vj ml-lg-5"><a href="login.php">
                    <span class="far fa-user-circle" aria-hidden="true"></span> المنصة الخاصة </a>
                </li>
                         <?php } ?>
                    </ul>
                </nav>
                <!-- //nav -->
            </div>
        </div>