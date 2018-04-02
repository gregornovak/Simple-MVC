<?php

namespace Gregor\Core;

use Gregor\Core\Router;

class Application
{
    public function __construct()
    {
        // new \Gregor\Core\Database();
        new Router();
    }
}