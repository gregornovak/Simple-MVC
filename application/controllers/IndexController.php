<?php

namespace Gregor\Controllers;

use Gregor\Core\Controller;
use Gregor\Core\View;


class IndexController extends Controller 
{
    public function index() : View
    {
        return new View('index.index');
    }

    public function test() : View
    {
        return new View('index.test', ['nums' => [1,2,3,4,5,6,7,8,9,10]]);
    }
}