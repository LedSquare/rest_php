<?php

namespace App\Core\Database;

use App\Core\Database\DatabaseMysqlConnection;

class Database 
{
    private DBConnectionInterface $database;

    public function __construct(DBConnectionInterface $connection)
    {
        $this->database = $connection;
        $this->database->connect();
    }

    


    

}