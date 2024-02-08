<?php

use App\Application;

require __DIR__ . '/vendor/autoload.php';

define('APP_URL', 'http://localhost/mine');
define('DEFAULT_CONTROLLER', 'Home');
define('DEFAULT_METHOD', 'index');

$app = new Application();
$app->run();
