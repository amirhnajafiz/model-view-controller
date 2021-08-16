<?php

namespace app\core\router;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\router\Route;
use app\core\view\RenderEngine;

/**
 * The router class, manages the routes of our website
 * based on the user request.
 * 
 */
class Router
{
    // Router tools
    public Request $request;
    public Response $response;
    // Router routes
    public $routes = [];

    /**
     * The constructor of our router.
     * 
     * @param request is the user request to our website
     * @param response is the response for our user request
     */
    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Get method handles the get requests to our website.
     * 
     * @param path is the path of the request
     * @param Route created route object
     */
    public function get($path, $callback)
    {
        return $this->routes['get'][] = new Route($path, $callback);
    }

    /**
     * Post method handles the post requests to our website.
     * 
     * @param path is the path of the request
     * @param Route created route object
     */
    public function post($path, $callback)
    {
        return $this->routes['post'][] = new Route($path, $callback);
    }

    /**
     * This method gets the URL of a route
     * based on its name.
     * 
     * @param name the route name
     * @return URL the route paths
     */
    public function getURL($name) 
    {
        foreach($this->routes as $method) {
            foreach($method as $route) {
                if ($route->getName() == $name) {
                    return $route->getPath();
                }
            }
        }
        return "/";
    }

    /**
     * This method gets the callback function of a route.
     * 
     * @param path the wanted route path
     * @param method request method
     * @return callback the route callback function
     */
    public function getCallBack($path, $method)
    {
        foreach($this->routes[$method] as $route) {
            if ($route->check($path)) {
                return $route->getCallback();
            }
        }
        return false;
    }

    /**
     * Resolve method does the rendering in router.
     * 
     * @return view what will it show to user
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        
        $callback = $this->getCallBack($path, $method);
        
        if ($callback === false) {
            $code = 404;
            $this->response->setStatusCode($code);
            return RenderEngine::renderView("errors/_404", compact('code'));
        }

        if (is_string($callback)) {
            return RenderEngine::renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0];
        }

        return call_user_func($callback, $this->request);
    }
}

?>