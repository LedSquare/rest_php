<?php

namespace App\Core\Database;

use PDO;

interface DBConnectionInterface
{
    public static function getInstance(): self;
    public function connect():PDO;
    // public function queryInject(string $sql, $params = []):mixed;
    public function closeConnection():void;
}