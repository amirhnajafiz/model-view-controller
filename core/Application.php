<?php 

namespace app\core;

use app\core\Request;
use app\core\Response;
use app\core\router\Router;
use app\core\router\Routes;

/**
 * App class is the main class of our website, where
 * we send user to different parts of website, or do the 
 * website features.
 * 
 */
class Application 
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
    public static function get_instance($root_dir=NULL)
    {
        if (!isset(self::$app))
        {
            self::$app = new App($root_dir);
            Routes::getRoutes();
        }
        return self::$app;
    }

    /**
     * The run method, starts the application.
     * 
     */
    public function run()
    {
        $result = $this->router->resolve();

        if (is_array($result)) {
            $this->response->setContentType('application/json');
            echo json_encode($result, JSON_PRETTY_PRINT);
            return;
        }

        echo $result;
    }
}

?>