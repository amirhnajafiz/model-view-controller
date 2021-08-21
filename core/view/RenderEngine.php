<?php

namespace app\core\view;

use app\core\Application;

/**
 * RenderEngine is the class that does the rendring and viewing stuff.
 * 
 */
class RenderEngine
{
    // Private fields
    private static string $BASE = "layouts/main";

    /**
     * Render view gets a callback with parameters, and renders the pages 
     * for us.
     * 
     * @param callback is the function to be executed
     * @param params is the parameters of the request
     */
    public static function renderView($view, $params = [])
    {
        return str_replace("{{content}}", self::loadView($view, $params), self::loadView(self::$BASE));
    }

    /**
     * This method loads the view that we give to it, with its
     * parameters.
     * 
     * @param view is the address of that view
     * @param params is the view parameters
     */
    private static function loadView($view, $params = []) 
    {
        foreach ($params as $key => $value) 
        {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT . "/view/" . $view . ".blade.php";
        return ob_get_clean();
    }
}

?>