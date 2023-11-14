<?php

namespace App\Core\Database;

use App\Core\Database\DatabaseMysqlConnection;
use PDO;

/**
 * TODO: Сделать нормальные методы в QueryBuilder.
 * TODO: Сделать фасад для данного класса, но в другом проекте.
 */

class Database 
{
    private DBConnectionInterface $connection;
    // private ?PDO $pdo;
    public static ?PDO $pdo = null;

    public function __construct(DBConnectionInterface $connection)
    {
        $this->connection = $connection;
        
        self::$pdo = $this->connection->connect();
    }

    public static function __callStatic($method, $args) {
        return call_user_func_array([self::$pdo, $method], $args);
    }


}