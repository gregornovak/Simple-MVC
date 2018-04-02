<?php

namespace Gregor\Core;

use Gregor\Core\Database;

/**
 * Responsible for connecting to the database.
 */
class Model extends Database
{

    /**
     * Instansiate a connection to the database.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    protected function getAll(string $table, array $fields = ['*'], string $where = '')
    {
        $sql = "SELECT ";
        $numOfFields = count($fields) - 1;

        foreach($fields as $key => $field) {

            $sql .= "$field";
            if($numOfFields != $key) {
                $sql .= ", ";
            }
        }

        $sql .= " FROM $table";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function getOne(string $table, string $id, array $fields = ['*'])
    {
        $sql = "SELECT ";
        $numOfFields = count($fields) - 1;

        foreach($fields as $key => $field) {

            $sql .= "$field";
            if($numOfFields != $key) {
                $sql .= ", ";
            }
        }

        $sql .= " FROM $table WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch();
        return $result;
    }

}
