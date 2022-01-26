<?php
error_reporting(0);
//index.php

include('configfacebook.php');

$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if(isset($_GET['code']))
{
 if(isset($_SESSION['access_token']))
 {
  $access_token = $_SESSION['access_token'];
 }
 else
 {
  $access_token = $facebook_helper->getAccessToken();

  $_SESSION['access_token'] = $access_token;

  $facebook->setDefaultAccessToken($_SESSION['access_token']);
 }

 $_SESSION['user_id'] = '';
 $_SESSION['user_name'] = '';
 $_SESSION['user_email_address'] = '';
 $_SESSION['user_image'] = '';

 $graph_response = $facebook->get("/me?fields=name,email", $access_token);

 $facebook_user_info = $graph_response->getGraphUser();

 if(!empty($facebook_user_info['id']))
 {
  $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
 }

 if(!empty($facebook_user_info['name']))
 {
  $_SESSION['user_name'] = $facebook_user_info['name'];
 }

 if(!empty($facebook_user_info['email']))
 {
  $_SESSION['user_email_address'] = $facebook_user_info['email'];
 }

 //echo $_SESSION['user_email_address'];
 //echo $_SESSION['user_name'];
 
}
else
{
 // Get login url
    $facebook_permissions = ['email']; // Optional permissions

    $facebook_login_url = $facebook_helper->getLoginUrl('https://edokio.com/', $facebook_permissions);
    
    // Render Facebook login button
    $facebook_login_url = '<span><a href="'.$facebook_login_url.'"><img src="fb.png" width="120"/></a></span>';
}


//index.php

//Include Configuration File
include('config.php');

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
  include_once "service.php";
                        $service = new Service();
                        $Admins = $service->account($_SESSION['user_first_name'],$_SESSION['user_last_name'],$_SESSION['user_email_address'],$_SESSION['user_gender'],$_SESSION['user_image']);
                        //var_dump($Admins);
 }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<span><a href="'.$google_client->createAuthUrl().'"><img src="gmail.png" width="100" /></a></span>';
}

?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <title>Edokio | Login </title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="css/fontawesome-free-5.15.3-web/css/all.css">
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    <!-- //Fonts -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T54Y1DPZ01"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-T54Y1DPZ01');
    </script>
</head>


<body>
    <!-- home -->
    <div id="home" class="inner-w3pvt-page">
        <div class="overlay-innerpage">
            <!-- banner -->
            <div class="top_w3pvt_main container">

                <!-- nav -->
                <?php include_once "menu.php";
                echo "<br>";
                //var_dump($_SESSION);
                echo "<br>";
                ?>
                <!-- //nav -->

            </div>
            <!-- //banner -->
        </div>
        <!-- //home -->

        <!-- about -->
        <section class="about py-5">
            <div class="container py-md-5">
                <h3 class="tittle-wthree text-center">المنصة الخاصة </h3>

                <div class="row">

                    <div class="col-lg-6 contact-right-wthree-info login">
                        <h5 class="text-center mb-4"></h5>
                        


                        <div class="panel panel-default">
    <?php 
    if(isset($facebook_login_url))
    {
    // echo $facebook_login_url;
    }
    else
    {
     echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
     echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
     echo '<h3><b>Name :</b> '.$_SESSION['user_name'].'</h3>';
     echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
     echo '<h3><a href="logout.php">Logout</h3></div>';
    }
    ?>
   </div>

   <div class="panel panel-default">
   <?php
   if($login_button == '')
   {
    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
    echo '<h3><a href="logout.php">Logout</h3></div>';
   }
   else
   {
    //echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
   </div>

   </div>
                </div>

   <div style="display: block;position: relative; width:100%; text-align: center;">

<?php

if(isset($facebook_login_url))
{
echo $facebook_login_url;
}
if($login_button != '')
{

 echo $login_button;

}?>

</div>

   



                            
                        

                   

                <!--   <div class="map-wthree mt-5 p-2">
            

            </div> -->
            </div>
        </section>
        <!-- //about -->

        <?php include_once "footer.php" ?>
</body>

</html>