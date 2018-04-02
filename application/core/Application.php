<?php

namespace Gregor\Core;

use Gregor\Core\Router;

/**
 * Responisble for calling the router.
 */
class Application
{
    /**
     * Call the applications router.
     */
    public function __construct()
    {
        new Router();
    }
}