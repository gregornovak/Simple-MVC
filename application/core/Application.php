<?php

namespace Gregor\Core;

use Gregor\Core\Controller;

class Application
{
    public function __construct()
    {
        new Controller();
    }
}