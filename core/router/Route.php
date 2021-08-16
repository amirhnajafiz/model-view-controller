<?php

namespace app\core\router;

/**
 * Each of our routes need a class to save their
 * nam, path and callback.
 * 
 */
class Route
{
    // Private fields
    private string $name;
    private string $path;
    private $callback;

    /**
     * Route constructor.
     * 
     * @param path is the route path
     * @param callback is the callback function of the route
     */
    public function __construct(string $path, $callback)
    {
        $this->path = $path;
        $this->callback = $callback;
    }

    /**
     * A name setter.
     * 
     * @param name sets the route name
     */
    public function name($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * This method checks the path equetion.
     * 
     */
    public function check($path)
    {
        $pattern = preg_replace('/{\w+}/', '(\\w+)', $this->getPath());
        $pattern = '/^' . preg_replace("/\//", '\\/', $pattern) . '$/';
        return preg_match($pattern, $path);
    }

    /**
     * A name getter.
     * 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * A path getter.
     * 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Getting the route callback.
     * 
     */
    public function getCallback()
    {
        return $this->callback ?? false;
    }
}

?>