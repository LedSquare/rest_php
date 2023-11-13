<?php

namespace App\Core\Database;

use App\Core\Database\DatabaseMysqlConnection;
use PDO;

class Database 
{
    private DBConnectionInterface $connection;
    private ?PDO $pdo;

    public function __construct(DBConnectionInterface $connection)
    {
        $this->connection = $connection;
        $this->pdo = $this->connection->connect();
    }

    public function query($sql): mixed
    {
        $pdo = $this->pdo;
        $result = $pdo->query($sql);
        
    }

}