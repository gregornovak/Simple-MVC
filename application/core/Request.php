<?php

namespace Gregor\Core;

/**
 * Responsible for sanitizing $_GET and $_POST superglobals.
 */
class Request
{
    /**
     * Sanitize the specified $_GET parameter
     * 
     * @param string $param
     * @return string 
     */
    public function get(string $param) : string
    {
        return filter_input(trim(INPUT_GET), $param, FILTER_SANITIZE_MAGIC_QUOTES) ?? '';
    }

    /**
     * Sanitize the specified $_POST parameter
     * 
     * @param string $param
     * @return string 
     */
    public function post(string $param) : string
    {
        return filter_input(trim(INPUT_POST), $param, FILTER_SANITIZE_MAGIC_QUOTES) ?? '';
    }

    /**
     * General sanitize method.
     * 
     * @param string $param
     * @return string
     */
    public function sanitize(string $param) : string
    {
        return filter_var($param, FILTER_SANITIZE_MAGIC_QUOTES) ?? '';
    }
}