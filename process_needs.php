<?php
require_once 'vendor/autoload.php';
require_once 'db.php';
$response = new Services_Twilio_Twiml();
$pollDigits = $_REQUEST['Digits'];
$messages = array(
		'1' => '衣料品の配給が近日行われます',
		'2' => '明日の午後4時から、池袋東口公園で炊き出しがあります',
		'3' => '池袋東口公園に避難所が設営されています',
		'4' => '池袋東口公園で明日午前七時より臨時診療所が開かれます。どうぞご利用ください',
		'5' => '池袋東口公園で、帰宅困難者向けのテントが設営されています'
);

$data = array(
		'to' => $_REQUEST['To'],
		'phone-number'=>$_REQUEST['From'],
		'digits'=>$pollDigits,
		'created'=>gmdate("Y/m/d H:i:s", time() ));
$result = json_decode(save($data),true);
$url = 'http://'.$_SERVER['SERVER_NAME'].'/record.php?id='.urlencode($result['id']);

$say_str = $messages[$pollDigits];
$response = new Services_Twilio_Twiml();
$response->say($say_str, array('language' => 'ja-jp'));
$response->say('何かありましたら一言お願いします。メッセージが終了したら、シャープを押してください', array('language' => 'ja-jp'));
$response->record(array(
		'action' => $url,
		'method' => 'POST',
		

));
header("Content-type: text/xml");
print $response;