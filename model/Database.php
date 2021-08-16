<?php

namespace app\database;

use app\controller\BaseController;

/**
 * Database class is a cofigure for out database connection.
 * 
 */
class Database
{
    // Constant fields
    const DB_HOST = "";
    const DB_PORT = "";
    const DB_NAME = "";
    const DB_USERNAME = "";
    const DB_PASSWORD = "";

    // Private fields
    private static $instance;
    private $pdo;

    // Singleton pattern
    private function __construct() 
    {
        $dsn = sprintf("mysql:host=%s;port=%s;dbname=%s", self::DB_HOST, self::DB_PORT, self::DB_NAME);

        try {
            $this->pdo = new \PDO($dsn, self::DB_USERNAME, self::DB_PASSWORD);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    /**
     * Gets the instance of our database.
     * 
     * @return Database an instance of our database
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
          self::$instance = new Database();
        }
     
        return self::$instance;
    }

    /**
     * Gets the connection to our database.
     * 
     * @return PDO DB connection
     */
    public function getPDO()
    {
        return $this->pdo;
    }
}
