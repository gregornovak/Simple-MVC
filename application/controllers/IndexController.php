<?php

namespace Gregor\Controllers;

use Gregor\Core\Controller;
use Gregor\Core\View;


class IndexController extends Controller
{
    public function __construct()
    {
        // echo PHP_EOL . 'IndexController launched' . PHP_EOL;
    }

    public function test()
    {
        return new View('index.test', [1,2,3]);
    }

    public function index()
    {
        return new View('index.index');
    }

    public function edit(int $post)
    {
        echo PHP_EOL . "Editing post number: $post" . PHP_EOL;
    }
}