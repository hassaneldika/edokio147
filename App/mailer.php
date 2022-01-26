<?php

use PHPMailer\PHPMailer\PHPMailer;

$title = $_GET['title'];
$id = $_GET['id'];
if (isset($_POST['fName']) && isset($_POST['email']) && isset($_POST['submit'])) {
    $secretKey = "6Ldcm0ocAAAAAD12AkmcV974kepDlEJZTdNMgg1h";
    $responseKey = $_POST['g-recaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
    $response = file_get_contents($url);
    $response = json_decode($response);
    if ($response->success) {
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $situation = $_POST['situation'];
        $expertise = $_POST['fieldOfExpertise'];

        $body =

            '<img src="http://edokio.com/img/logo1.png">
            <h2>Request</h2>
        <table>
            <tr>
                <th>Training: </th>
                <td>' . $title . '</td>
            </tr>
            <tr>
                <th>First Name: </th>
                <td>' . $fname . '</td>
            </tr>
            <tr>
                <th>Last Name: </th>
                <td>' . $lname . '</td>
            </tr>
            <tr>
                <th>Email: </th>
                <td>' . $email . '</td>
            </tr>
            <tr>
                <th>Address: </th>
                <td>' . $address . '</td>
            </tr>
            <tr>
                <th>Country: </th>
                <td>' . $country . '</td>
            </tr>
            <tr>
                <th>Phone: </th>
                <td>' . $phone . '</td>
            </tr>
            <tr>
                <th>Situation: </th>
                <td>' . $situation . '</td>
            </tr>
            <tr>
                <th>Field of expertise: </th>
                <td>' . $expertise . '</td>
            </tr>
        </table>
        <div>
        <p>© 2021 Edokio. All rights reserved | by
            <a href="http://echovalley.net" >Echo Valley s.a.r.l</a>

        </p>
        </div>';

        require_once "vendor/phpmailer/phpmailer/src/PHPMailer.php";
        require_once "vendor/phpmailer/phpmailer/src/SMTP.php";
        require_once "vendor/phpmailer/phpmailer/src/Exception.php";

        $mail = new PHPMailer();
        $clientmail = new PHPMailer();

        //SMTP Settings
        // $mail->SMTPDebug  = 3;
        $mail->isSMTP();
        $mail->Host = "smtp.livemail.co.uk";
        $mail->SMTPAuth = true;
        $mail->Username = 'feedback@edokio.com';
        $mail->Password = 'Feedback@2021';
        $mail->Port = 587; //587
        $mail->SMTPSecure = "tls"; //tls

        $clientmail->isSMTP();
        $clientmail->Host = "smtp.livemail.co.uk";
        $clientmail->SMTPAuth = true;
        $clientmail->Username = 'feedback@edokio.com';
        $clientmail->Password = 'Feedback@2021';
        $clientmail->Port = 587; //465
        $clientmail->SMTPSecure = "tls"; //ssl

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom('feedback@edokio.com');
        $mail->addAddress("info@edokio.com");
        $mail->Subject = 'Application of ' . $fname . ' ' . $lname.' to the program ' .$title;
        $mail->Body = $body;

        $clientmail->isHTML(true);
        $clientmail->setFrom('feedback@edokio.com');
        $clientmail->addAddress("$email");
        $clientmail->Subject = 'Response To Your Request';
        $clientmail->Body = '<img src="http://edokio.com/img/logo1.png"> <div style="color: #222;">Dear '.$fname.',</div><div style="color: #222;">We Will Contact You Soon Regarding Your Application To The Program: '.$title.'</div> <div style="color: #222;">Regards</div> <div style="color: #222;">Edokio</div> <div><p>© 2021 Edokio. All rights reserved | by <a href="http://echovalley.net" target="_blank">Echo Valley s.a.r.l</a> </p></div>';

        if ($mail->send() && $clientmail->send()) {
            $status = "success";
            $response = "Email is sent!";
            echo "<script>console.log('".$response."');</script>";
            echo "<script>alert('Request Sent!');
                        window.location.replace('trainings.php');</script>";
            //header("location: trainings.php");
        } else {
            $status = "failed";
            $response = "Something is wrong: " . $mail->ErrorInfo;
            echo "<script>console.log('".$response."');</script>";
            echo "<script>alert('".$response."');
                        window.location.replace('feedback.php?Id=".$id."');</script>";
        }

        //exit(json_encode(array("status" => $status, "response" => $response)));
    }
    echo "<script>alert('Verification failed!');
    window.location.replace('feedback.php?Id=".$id."');</script>";
}
