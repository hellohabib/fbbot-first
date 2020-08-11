
<?php
$my_Verify_Token="ABC123xyz";

$challenge=$_GET['hub_challenge'];
$verify_token=$_GET['hub_verify_token'];

if($my_Verify_Token===$verify_token){
echo $challenge;
exit;

}


$accessToken='EAAJ463Am3moBAOV8zZAVweTw4XhVAFc1765T6NwNfGzUItsNCALWG7ZAeMuitkjVLjLYitYXjml3hZBbgSsJIIpLFgxxD88ZAAAISoTGRq0aKEQXmWCk2NZBesGsOU1MZBhINcRVPn8akZBK34m4EJCMZCYqGrkvvmVpzPVpGTj8H8c3j8zV0P2M';

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