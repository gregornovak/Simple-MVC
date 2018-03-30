<?php

namespace Gregor\Controllers;

use Gregor\Core\Controller;
use Gregor\Core\Request;
use Gregor\Core\View;
use Gregor\Models\CarsModel;

class CarsController extends Controller
{
    private $request;

    public function __construct()
    {
        $this->request = new Request;
    }

    public function test() : View
    {
        return new View('cars.test', ['nums' => [1,2,3,4,5,6,7,8,9,10], 'js' => '<script>alert(123);</script>']);
    }

    public function index() : View
    {
        $cars = new CarsModel();
        $cars = $cars->index();
        
        return new View('cars.index', ['cars' => $cars]);
    }

    public function show(int $id) : View
    {
        var_dump($id);
        $car = new CarsModel();
        $id  = $this->request->get($id);
        var_dump($id);
        die($id);
        $car = $car->show($id);
        
        return new View('cars.show', ['car' => $car]);
    }

    public function add()
    {
        return new View('cars.add');
    }

    public function insert()
    {
        // var_dump( file_get_contents('php://input'));
        var_dump($_POST['name']);
        var_dump($this->request->post('name'));
        die;
        $car = new CarsModel();
        $car = $car->insert([

        ]);
    }

    public function edit(int $post) : void
    {
        echo PHP_EOL . "Editing post number: $post" . PHP_EOL;
    }
}