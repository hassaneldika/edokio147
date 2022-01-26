<?php
var_dump($_POST);
	$NotificationId= $_POST['NotificationId'];
	$NotificationTitle=$_POST['NotificationTitle'];
    $NotificationLink=$_POST['NotificationLink'];
	$NotificationTitle=str_replace('"', ' ', $NotificationTitle);
	$NotificationText =$_POST['NotificationText'];
	$NotificationText =str_replace('"', ' ', $NotificationText);
$msg = '
{
"to": "/topics/all",
"notification": {
    "title": "'.$NotificationTitle.'",
    "body": "'.$NotificationText.'",
 
    "sound": "default"
},
"data": {
	"url": "'.$NotificationLink.'",
},
	"priority": "high"
}
';
$fields = array
(
'data' => $msg
);
$headers = array
(
'Authorization: key=AAAA592Kj_M:APA91bGPBeNU_EEU9CbBp_4aiWdZd3cOKeWPBt_vdMEr7t-zRFsMRjLSEonYq-HBwsLbFOuTbEkjVLuTyq5R14Ujb14e2hibl_SSqELLUJ9YZFUew2-JpyAYY3G3uRAS_2PnMzJtYnY6',
'Content-Type: application/json'
);
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, $msg );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;
?>
