<?php

namespace App\Database;

use DatabaseCRUDInterface;
use DBConnectionInterface;

class Database implements DatabaseCRUDInterface
{
    private DBConnectionInterface $connection;

    public function __construct(DBConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    

}