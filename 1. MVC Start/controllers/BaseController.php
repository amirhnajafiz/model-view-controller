<?php

namespace app\controllers;

use app\core\Application;

class BaseController
{

    public function render($view, $params = []) {
        return Application::$app->router->renderView($view, $params);
    }
}