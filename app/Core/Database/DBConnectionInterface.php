<?php

namespace App\Core\Database;

use PDO;
use App\Database\DatabaseConfig;

interface DBConnectionInterface
{
    public function connect():PDO;
    public function queryBuild(string $sql, $params = []):mixed;
    public function closeConnection():void;
}