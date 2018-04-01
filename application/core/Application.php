<?php

namespace Gregor\Core;

use Gregor\Core\Router;

class Application
{
    public function __construct()
    {
        new Router();
    }
}