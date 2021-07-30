<?php

require_once  __DIR__ . '/../vendor/autoload.php';

use mvc\core\App;

$app = App::get_instance(dirname(__DIR__));

$app->router->get('/', 'home');

$app->run();

?>