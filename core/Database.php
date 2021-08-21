<?php

namespace app\core;

use app\controller\BaseController;
use app\core\Application;

/**
 * Database class is a cofigure for out database connection.
 * 
 */
class Database
{
    // Private fields
    private static $instance;
    private $pdo;

    // Singleton pattern
    private function __construct() 
    {
        try {
            $environments = $this->init_env();
            $dsn = sprintf("mysql:host=%s;port=%s;dbname=%s", $environments['DB_HOST'],  $environments['DB_PORT'],  $environments['DB_NAME']);

            try {
                $this->pdo = new \PDO($dsn,  $environments['DB_USERNAME'],  $environments['DB_PASSWORD']);
                $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch(\PDOException $e) {
                echo $e->getMessage();
                exit();
            }
        } catch(Exception $ex) {
            echo $ex->getMessage();
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

    // .env reader
    private function init_env()
    {
        $env = [];
        $lines = file(Application::$ROOT . "/.env", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {

            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            $env[$name] = $value;
        }
        return $env;
    }
}
