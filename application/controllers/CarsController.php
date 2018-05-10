<?php

namespace Gregor\Controllers;

use Gregor\Core\Controller;
use Gregor\Core\Request;
use Gregor\Core\View;
use Gregor\Core\Session;
use Gregor\Models\CarsModel;

class CarsController extends Controller
{
    private $request;

    public function __construct()
    {
        parent::__construct();
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

    public function add() : View
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
            Session::flash('Error saving car to database');
        } else {
            Session::flash('Car has been successfully saved.');
        }

        header("Location: /cars"); die;
    }

    public function edit(int $id)
    {
        $car = new CarsModel();
        $id  = $this->request->sanitize($id);
        $car = $car->show($id);

        return new View('cars.edit', ['car' => $car]);
    }

    public function update(int $id)
    {
        $id             = $this->request->sanitize($id);
        $name           = $this->request->post('name');
        $manufacturer   = $this->request->post('manufacturer');
        $makeYear       = $this->request->post('make_year');

        $car = new CarsModel();
        $inserted = $car->update([
            'name'          => $name,
            'manufacturer'  => $manufacturer,
            'make_year'     => $makeYear
        ],
        $id);

        if(!$inserted) {
            Session::flash('Error updating car to database');
        } else {
            Session::flash('Car has been successfully saved.');
        }

        header("Location: /cars"); die;
    }
}