<?php

namespace app\core;

use app\core\Application;

/**
 * Response class handles the user request responses.
 * 
 */
class Response 
{
    /**
     * This method sets the response status code. 
     * 
     * @param code the new code
     */
    public function setStatusCode($code)
    {
        http_response_code($code);
    }

    /**
     * This method sets the content type of response.
     *
     * @param string $type is the return type
     * @return void
     */
    public function setContentType($type = "text/html")
    {
        header("Content-Type: $type; charset=UTF-8");
    }

    /**
     * This function redirects.
     *
     * @param string $name targer page
     * @param integer $code status code
     * @return void
     */
    public function redirect(string $name = "home", int $code = 301) 
    {
        $path = Application::$app->router->getURL($name);
        header("Location: $path", TRUE, $code);
    }
}

?>