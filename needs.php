<?php
require_once 'vendor/autoload.php';
$response = new Services_Twilio_Twiml();
$gather = $response->gather(array(
		'action' => 'http://'.$_SERVER['SERVER_NAME'].'/process_needs.php',
		'method' => 'GET',
		'timeout' => '30',
		'numDigits' => '1'
));
$gather->say("お電話ありがとうございます。こちらは豊島区被災者ニーズ申請サービスです。着るもので困っている場合は1を、食べるもので困っている場合は2を、住むところで困っている場合は3を、病気で困っている場合は4を、帰宅が困難になっている人は5を押してください", array('language' => 'ja-jp'));
header("Content-type: text/xml");
print $response;