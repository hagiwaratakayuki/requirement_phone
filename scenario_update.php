<?php
require 'admin.php';

use Philo\Blade\Blade;

$views = __DIR__ . '/template';
$cache = __DIR__ . '/cache';

updateAdmin($_REQUEST);
header( "Location: scenario.php" );

