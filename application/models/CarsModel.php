<?php

namespace Gregor\Models;

use Gregor\Core\Model;

class CarsModel extends Model
{
    public function __construct()
    {
        $this->db = Model::getInstance();
    }

    public function index()
    {
        $stmt = $this->db->query('SELECT * FROM cars');
        $result = $stmt->fetchALl();
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
        foreach($fields as $field) {
            
        }
    }

}