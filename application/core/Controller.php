<?php

namespace Gregor\Core;

use Gregor\Core\Session;

/**
 * Serves as a base controller.
 */
class Controller
{
    public $session;

    public function __construct()
    {
        new Session();
    }

}