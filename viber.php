<?php

$access_token = "47141c6a37e7d5c4-382bedb6babb669e-47c54c07fdf6809c";

$requset = file_get_contents("php://input");
$input = json_decode($request,true);

if($input['event']=='webhook'){
	$webhook_response['status'] = 0;
	$webhook_response['status_message'] = "ok";
	$webhook_response['event_tyes'] = "delivered";
	echo json_encode($webhook_response);
	die;
}

elseif($input['event']=='message'){
	$text_received = $input['message']['text'];
	$sender_id = $input['sender']['id']
	$sender_name = $input['sender']['name']
	
	$message_to_reply = "hello";
	
	$data['auth_token'] = $access_token;
	$data['receiver'] = $sender_id;
	$data['type'] = "text";
	$data['text'] = $message_to_reply;
	sendMessage($data);
}

function sendMessage($data){
	$url = "https://chatapi.viber.com/pa/send_message";
	$jsonData = json_encode($data);
	$ch = curl_init($url);
	curl_setopt($ch,CURLOPT_POST,1);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$jsonData);
	curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
	$result = curl_exec($ch);
	return $result;
}
