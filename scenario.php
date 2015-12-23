<?php
require 'admin.php';

use Philo\Blade\Blade;

$views = __DIR__ . '/template';
$cache = __DIR__ . '/cache';
$blade = new Blade($views, $cache);
$phoneNumber = '+81345402625';
$params = array('phoneNumber'=>$phoneNumber);
if($p = adminQuery($phoneNumber)){
	
	$params = array_merge($params,$p);
}
echo $blade->view()->make('scenario')->with('params',$params)->render();

