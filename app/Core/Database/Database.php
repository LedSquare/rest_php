<?php

namespace App\Core\Database;

use App\Core\Database\DatabaseMysqlConnection;
use PDO;

class Database 
{
    private DBConnectionInterface $database;

    public function __construct(DBConnectionInterface $connection)
    {
        $this->database = $connection;
        $this->database->connect();
    }

    public function query(): mixed
    {
        $database = $this->database;

        $stmt = $database->prepare("SELECT * FROM users WHERE username = :username AND age > :age");
        $stmt->bindValue(':username', 'john', PDO::PARAM_STR);
        $stmt->bindValue(':age', 25, PDO::PARAM_INT);
        $stmt->execute();
    }

    

}