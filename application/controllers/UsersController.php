<?php

namespace Gregor\Controllers;

use Gregor\Core\Controller;
use Gregor\Core\View;


class UsersController extends Controller 
{
    public function __construct()
    {
        // echo PHP_EOL . 'IndexController launched' . PHP_EOL;
    }

    public function index() : View
    {
        $users = [
            'Gregor', 
            'Gašper', 
            'Jure', 
            'Aleš', 
            'Andreja'
        ];

        return new View('users.index', ['users' => $users]);
    }
}