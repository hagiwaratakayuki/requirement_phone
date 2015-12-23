<?php
require 'db.php';
require 'vendor/autoload.php';

use Philo\Blade\Blade;

$views = __DIR__ . '/template';
$cache = __DIR__ . '/cache';

$blade = new Blade($views, $cache);

$results = query();
$params = array();
$choiceMap = array('1'=>'Clothes','2'=>'Food','3'=>'House','4'=>'Medical Care','5'=>'Move');
foreach ($results['rows'] as $result) {
	
	$doc = $result['doc'];
	
	
	
	$doc['choice'] = $choiceMap[$doc['digits']];
	$params[] = $doc;
}

echo $blade->view()->make('table')->with('params',$params)->render();