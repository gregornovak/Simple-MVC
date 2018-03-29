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
        return new View('index.test', ['nums' => [1,2,3,4,5,6,7,8,9,10]]);
    }

    public function index()
    {
        return new View('index.index', ['a' => 'A']);
    }

    public function edit(int $post)
    {
        echo PHP_EOL . "Editing post number: $post" . PHP_EOL;
    }
}