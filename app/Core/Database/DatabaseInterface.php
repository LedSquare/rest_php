<?php 

namespace App\Core\Database;

interface DatabaseInterface
{
    public function query(string $sql, $params = [] ):mixed;
}