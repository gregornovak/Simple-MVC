<?php

namespace Gregor\Core;

use PDO;
use Dotenv\Dotenv;

/**
 * Responsible for connecting to the database.
 */
class Database extends PDO
{
    protected static $instance = null;
    public $db = null;

    /**
     * Instansiate a connection to the database.
     * 
     * @return void
     */
    public function __construct()
    {
        [$adapter, $host, $dbName, $encoding, $user, $pass] = $this->getEnvironment(new Dotenv(ROOTDIR));

        try {
            self::$instance = parent::__construct(
                "{$adapter}:host={$host};dbname={$dbName};charset={$encoding}", $user, $pass);
        } catch(PDOException $err) {
            echo "Connection error: ", $err->getMessage();
        }
    }

    /**
     * Get the database connection.
     * 
     * @return Database
     */
    public static function getInstance() : Database
    {
        if(!isset(self::$instance)) {
            self::$instance = new Database();
        }
        
        return self::$instance;
    }

    /**
     * Get environment variables for database connection.
     * 
     * @param Dotenv $dotenv Dotenv instance
     * @return array Returns array of environment variables
     */
    private function getEnvironment(Dotenv $dotenv) : array
    {
        try {

            $dotenv->load();
            $adapter  = getenv('ADAPTER');
            $host     = getenv('HOST');
            $dbName   = getenv('DB_NAME');
            $encoding = getenv('ENCODING');
            $user     = getenv('USERNAME');
            $pass     = getenv('PASS');

        } catch(Dotenv\Exception $e) {
            echo $e->getMessage();
        }

        return [$adapter, $host, $dbName, $encoding, $user, $pass];
    }
    
}
