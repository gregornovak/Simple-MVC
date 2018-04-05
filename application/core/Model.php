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

    /**
     * Return all results.
     * 
     * @param string $table Specify the table name
     * @param array $fields Desired return fields
     * @param string $where Specify additional where statement
     * 
     * @return array $result
     */
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

        if(!empty($where)) {
            $sql .= $where;
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->fetchAll();
        return $result;
    }


    /**
     * Return single a result.
     * 
     * @param string $table Specify the table name
     * @param string $where Specify additional where statement
     * @param array $fields Desired return fields 
     * 
     * @return array $result
     */
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
