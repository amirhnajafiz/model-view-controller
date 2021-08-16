<?php

require_once __DIR__ . "/../vendor/autoload.php";

use app\core\Application;

$app = Application::get_instance(dirname(__DIR__));

$app->run();

?>