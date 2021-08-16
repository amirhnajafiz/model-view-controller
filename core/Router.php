<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;

    protected $routes = [];

    public function __construct($request, $response) {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        
        $callback = $this->routes[$method][$path] ?? false;
        
        if ($callback === false) {
            $code = 404;

            $this->response->setStatusCode($code);
            return $this->loadView("errors/_404", compact('code'));
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0];
        }

        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = []) {
        $layout = $this->loadLayout();
        $view = $this->loadView($view, $params);
        return str_replace("{{content}}", $view, $layout);
    }

    protected function loadView($view, $params) {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/view/" . $view . ".php";
        return ob_get_clean();
    }

    protected function loadLayout() {
        ob_start();
        include_once Application::$ROOT_DIR . "/view/layouts/main.php";
        return ob_get_clean();
    }
}