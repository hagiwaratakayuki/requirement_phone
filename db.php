<?php
require_once 'vendor/autoload.php';

function save($data,$db='sample'){
	return request($data, 'POST',$db);
}

function update($data,$db='sample'){
	
	return request($data, 'POST',$db);
}

function request($data,$method,$db){
	$url = _createUrl($db);
	$headers = ['Content-Type'=>'application/json'];
	
	
	
	//header
	$header = array(
			"Content-Type:application/json",
	
	);
	
	$context = array(
			"http" => array(
					"method"  => $method,
					"header"  => implode("\r\n", $header),
					"content" => json_encode($data)
			)
	);
	
	
	return  file_get_contents($url, false, stream_context_create($context));
	
}
function getDocument($id){
	$url = _createUrl().'/'.$id;
	
	
	
	return  file_get_contents($url, false);
}

function adminQuery($phoneNumber){
	$url = _createUrl('admin');
	$url = $url.'/_design/settings/_search/numberid?q=phonenumber:"'.$phoneNumber.'"&include_docs=true';
	
	$result = file_get_contents($url);
	$result = json_decode($result,true);
	if(isset($result['rows']) && !empty($result['rows'])){
		return $result['rows'][0]['doc'];
		
	}
	return false;
	
	
}

function updateAdmin($data){
	
	$url = _createUrl('admin');
	$url = $url.'/_design/settings/_search/numberid?q=phonenumber:"'.$phoneNumber.'"&include_docs=true';
	$result = file_get_contents($url);
	$result = json_decode($result,true);
	if(isset($result['rows']) && !empty($result['rows'])){
		$before = $result['rows'][0]['doc'];
	
	}
	else
	{
		$after = array();
		
	}
	$data = array_merge($data,$after);
	update($data,'admin');
	
	
}

function query(){
	$url = _createUrl();
	$url = $url.'/_design/query/_search/all?q=*:*&sort="-created<string>"&include_docs=true';
	$result = file_get_contents($url);
	
	return json_decode($result,true);
	
	
}

function _createUrl($db='sample'){
	
	$services_json = getenv('VCAP_SERVICES');
	if(!$services_json){
		$services_json = file_get_contents('settings/disaster-needs_VCAP_Services.json');
	
	}
	$params = json_decode($services_json,true);
	
	
	
	
	$VcapSvs = $params["cloudantNoSQLDB"][0]["credentials"];
	// Extract the VCAP_SERVICES variables for Cloudant connection.
	
	$url = $VcapSvs["url"].':'.$VcapSvs["port"].'/'.$db;

	return $url;
	
	
	

	
}