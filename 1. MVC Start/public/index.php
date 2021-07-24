<?php

// OLD Way for class autoload
// spl_autoload_register(function ($class_name) {
//     require_once "../core/$class_name.php";
// });

//error_reporting(0);

require_once __DIR__ . "/../vendor/autoload.php";

use app\core\Application;

use app\controllers\HomeController;
use app\controllers\LoginController;

$app = new Application(dirname(__DIR__));

$app->router->get('/', function() {
    return "Hello World";
});

$app->router->get('/about', 'about'); // only view

$app->router->get('/home', [HomeController::class, 'home']);

$app->router->get('/login', 'login');
$app->router->post('/login', [LoginController::class, 'handleLogin']);

$app->run();