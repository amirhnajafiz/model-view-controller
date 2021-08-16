<?php

namespace mvc\core\router;

use app\core\App;
use app\controller\HomeController;

/**
 * Routes class is the class for managing the routes of our
 * website.
 * 
 */
class Routes
{
    /**
     * This method generates the routes of our website.
     * 
     */
    public static function getRoutes()
    {
        $app = App::get_instance();

        // Write your routes here
        $app->router->get('/', [HomeController::class, 'index'])->name("home");
    }
}

?>