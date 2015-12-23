<?php
require_once 'vendor/autoload.php';
require 'db.php';
require_once 'speechtotext.php';
$response = new Services_Twilio_Twiml();

$say_str = "ご利用ありがとうございました";
$recording_url = $_REQUEST['RecordingUrl'];
$id = $_REQUEST['id'];

$data = json_decode(getDocument($id),true);
$data['recording_url'] = $recording_url;
$speechtext = speechtotext($recording_url);
$data['speechtext'] = $speechtext['results'][0]['alternatives'][0]['transcript'];
update($data);

$response = new Services_Twilio_Twiml();
$response->say($say_str, array('language' => 'ja-jp'));
$response->hangup();
header("Content-type: text/xml");
print $response;