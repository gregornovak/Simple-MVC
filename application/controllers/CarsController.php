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
        $car = new CarsModel();
        $id  = $this->request->sanitize($id);
        $car = $car->show($id);
        
        return new View('cars.show', ['car' => $car]);
    }

    public function add()
    {
        return new View('cars.add');
    }

    public function insert()
    {
        $name           = $this->request->post('name');
        $manufacturer   = $this->request->post('manufacturer');
        $makeYear       = $this->request->post('makeyear');

        $car = new CarsModel();
        $inserted = $car->insert([
            'name'          => $name,
            'manufacturer'  => $manufacturer,
            'make_year'     => $makeYear
        ]);

        if(!$inserted) {
            echo 'Error inserting data';     
        }

        header("Location: /cars"); die;
    }

    public function edit(int $post) : void
    {
        echo PHP_EOL . "Editing post number: $post" . PHP_EOL;
    }
}