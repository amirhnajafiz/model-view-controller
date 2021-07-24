<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public static Application $app;

    public Request $request;
    public Router $router;
    public Response $response;

    public function __construct(string $rootPath) {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();

        $this->router = new Router($this->request, $this->response);
    }

    public function run() {
        echo $this->router->resolve();
    }
}