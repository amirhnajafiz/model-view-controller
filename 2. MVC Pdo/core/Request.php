<?php

namespace mvc\core;

/**
 * The request class handles the user requests
 * to server.
 * 
 */
class Request
{
    /**
     * This method sets the path of the request.
     * 
     * @param path is the new path
     */
    public function setPath($path)
    {
        $_SERVER['REQUEST_URI'] = $path;
    }

    /**
     * This method sets the method of request.
     * 
     * @param method is the request method
     */
    public function setMethod($method)
    {
        $_SERVER['REQUEST_METHOD'] = $method;
    }

    /**
     * This method gets the path of the request.
     * 
     * @return path the path of user request
     */
    public function getPath()
    {
        $URI = $_SERVER['REQUEST_URI'];
        $pos = strpos("?", $URI);
        return $pos === FALSE ? $URI : substr($URI, 0, $pos);
    }

    /**
     * This method gets the method of request.
     * 
     * @return method the request method
     */
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * This method gets the data of request.
     * 
     * @return data the request data body
     */
    public function getBody()
    {
        $list = $this->getMethod() == 'post' ? $_POST : $_GET;
        $data = [];
        foreach($list as $key => $value) 
        {
            $data[$key] = $value;
        }
        return $data;
    }
}

?>