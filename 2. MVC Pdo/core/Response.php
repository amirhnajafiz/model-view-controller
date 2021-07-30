<?php

namespace mvc\core;

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
}

?>