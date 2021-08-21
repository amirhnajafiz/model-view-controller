<?php

require_once __DIR__ . "/../vendor/autoload.php";

use app\core\Application;
use app\model\Model;

$app = Application::get_instance(dirname(__DIR__));

new Model();

$app->run();

?>