<?php

namespace Gregor\Controllers;

use Gregor\Core\Controller;


class IndexController extends Controller
{
    public function __construct()
    {
        // echo PHP_EOL . 'IndexController launched' . PHP_EOL;
    }

    public function test()
    {
        echo PHP_EOL . 'Test function ran :DDDDDDD' . PHP_EOL;
    }

    public function index()
    {
        // var_dump($this->getController());
        require_once VIEWS . DS . lcfirst($this->getController()) . DS . $this->getMethod() . '.php';
        // echo PHP_EOL . 'Index function ran :DDDDDDD' . PHP_EOL;
    }

    public function edit(int $post)
    {
        echo PHP_EOL . "Editing post number: $post" . PHP_EOL;
    }
}