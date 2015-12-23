<?php

function speechtotext($url) {
	

	$services_json = getenv('VCAP_SERVICES');
	if(!$services_json){
		$services_json = file_get_contents('settings/disaster-needs_VCAP_Services.json');
	
	}
	$params = json_decode($services_json,true);
	$VcapSvs = $params["speech_to_text"][0]["credentials"];
	$ch = curl_init('https://stream.watsonplatform.net/speech-to-text/api/v1/recognize?continuous=true&model=ja-JP_NarrowbandModel');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // -k
	curl_setopt($ch, CURLOPT_POST, TRUE); // POST
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	//curl_setopt($ch, CURLOPT_TRANSFERTEXT, TRUE);
	//curl_setopt($ch2, CURLOPT_COOKIESESSION, TRUE);
	
	curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
	
	$postdata = file_get_contents($url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	curl_setopt($ch, CURLOPT_USERPWD, $VcapSvs['username'].':'.$VcapSvs['password']);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: audio/wav"));
	$result = json_decode(curl_exec($ch),true);
	
	return $result;
}