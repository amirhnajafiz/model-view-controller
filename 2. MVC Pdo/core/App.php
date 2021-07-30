<?php 

namespace mvc\core;

use mvc\core\Request;
use mvc\core\Router;
use mvc\core\Response;

/**
 * App class is the main class of our website, where
 * we send user to different parts of website, or do the 
 * website features.
 * 
 */
class App 
{
    // App properties
    public static App $app;
    public static string $ROOT;
    // App tools
    public Router $router;
    public Request $request;
    public Response $response;

    /**
     * App constructor where we initialize the basics of the app
     * object, like root directory, request, response, ...
     * 
     * @param root_dir the main directory of our project
     */
    private function __construct($root_dir)
    {
        self::$app = $this;
        self::$ROOT = $root_dir;

        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    /**
     * Since we are using singleton pattern, we need to have a static method
     * to create our app instance.
     * 
     * @param root_dir is the directory of our website
     * @return app the created app instance
     */
    public static function get_instance($root_dir)
    {
        if (!isset(self::$app))
        {
            self::$app = new App($root_dir);
        }
        return self::$app;
    }

    /**
     * The run method, starts the application.
     * 
     */
    public function run()
    {
        echo $this->router->resolve();
    }
}

?>