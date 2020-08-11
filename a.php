
<?php
$my_Verify_Token="ABC123xyz";

$challenge=$_GET['hub_challenge'];
$verify_token=$_GET['hub_verify_token'];

if($my_Verify_Token===$verify_token){
echo $challenge;
exit;

}


$accessToken='EAAvSbYS7MZBEBAIhabvDK3LKFeWgEcnevTe9RZBCpo7SHtyT6fi1yseQidvpnej7QNGPMJS9mOORhG6i2mcC7ZCWpWZCXUtItlcUcUpMuRRLi0ZBUtp6MI8FZCV9m2tHBKUAM6cQjB9M3Ih5BMJPIfqZCnYzxBHOJUmCh8kGppsmTAKTmiQZAlJA';

$input= json_decode(file_get_contents("php://input"), true);

$userID=$input['entry'][0]['messaging'][0]['sender']['id'];

$message=$input['entry'][0]['messaging'][0]['message']['text'];
//echo $userID;
//echo $message;

$url="https://graph.facebook.com/v2.6/me/messages?access_token=$accessToken";

$jsonData="{
	'recipient':{
		'id':$userID
	},
	'message':{
	'text':'alhamdulillah from reply'
	}
}";

$ch=curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

if(!empty($input['entry'][0]['messaging'][0]['message'])){
	curl_exec($ch);
}

?>