<?php
require __DIR__ . '/../vendor/autoload.php';

use Core\App;

$config = require __DIR__ . '/../config/config.php';
$app = new App($config);

// Register middleware, routes, etc.
$app->router->get('/', 'App\\Controllers\\HomeController@index');

$app->run();
