<?php

namespace Gregor\Models;

use Gregor\Core\Model;

class CarsModel extends Model
{

    /**
     * Return all cars.
     * 
     * @return array $result
     */
    public function index()
    {
        $result = $this->getAll('cars');
        return $result;
    }

    /**
     * Return the desired car.
     * 
     * @return array $result
     */
    public function show(int $id)
    {
        $result = $this->getOne('cars', $id);
        return $result;
    }

    /**
     * Insert car into the database.
     * 
     * @param array $fields
     * @return bool $result
     */
    public function insert(array $fields) : bool
    {
        $stmt = $this->db->prepare('INSERT INTO cars(name, manufacturer, make_year) VALUES(:name, :manufacturer, :make_year)');
        $stmt->bindParam(':name', $fields['name']);
        $stmt->bindParam(':manufacturer', $fields['manufacturer']);
        $stmt->bindParam(':make_year', $fields['make_year']);
        $result = $stmt->execute();
        
        return $result;
    }

    /**
     * Update the desired car in the database.
     * 
     * @param array $fields
     * @return bool $result
     */
    public function update(array $fields, int $id)
    {
        $stmt = $this->db->prepare('UPDATE cars SET name = :name, manufacturer = :manufacturer, make_year = :make_year WHERE id = :id');
        $stmt->bindParam(':name', $fields['name']);
        $stmt->bindParam(':manufacturer', $fields['manufacturer']);
        $stmt->bindParam(':make_year', $fields['make_year']);
        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();
        
        return $result;
    }

}