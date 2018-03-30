<?php

namespace Gregor\Core;

use PDO;

/**
 * Responsible for connecting to the database.
 */
class Model extends PDO
{
    protected static $instance = null;
    private $config = [];
    public $db = null;

    /**
     * Instansiate a connection to the database.
     * 
     * @return void
     */
    public function __construct()
    {
        try {
            $this->config = require_once 'config.php';
            self::$instance = parent::__construct(
                "{$this->config['adapter']}:host={$this->config['host']};dbname={$this->config['dbname']};charset={$this->config['encoding']}", 
                $this->config['user'], 
                $this->config['pass']);
            // self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     
        } catch(PDOException $err) {
            echo "Connection error: ", $err->getMessage();
        }
    }

    /**
     * Get the database connection.
     * 
     * @return Model
     */
    public static function getInstance()
    {
        if(!isset(self::$instance)) {
            self::$instance = new Model();
        }
        
        return self::$instance;
    }

    public function __clone() { }
    
}
