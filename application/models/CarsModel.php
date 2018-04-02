<?php

namespace Gregor\Models;

use Gregor\Core\Model;

class CarsModel extends Model
{

    public function index()
    {
        $result = $this->getAll('cars');
        
        return $result;
    }

    public function show(int $id)
    {
        $stmt = $this->db->prepare('SELECT * FROM cars WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch();
        return $result;
    }

    public function insert(array $fields)
    {
        $stmt = $this->db->prepare('INSERT INTO cars(name, manufacturer, make_year) VALUES(:name, :manufacturer, :make_year)');
        $stmt->bindParam(':name', $fields['name']);
        $stmt->bindParam(':manufacturer', $fields['manufacturer']);
        $stmt->bindParam(':make_year', $fields['make_year']);
        $result = $stmt->execute();
        
        return $result;
    }

}