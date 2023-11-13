<?php

namespace App\Core\Database;
use PDO;

class DatabaseQueryBuilder 
{
    protected ?PDO $pdo = null;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}


/**
 * TODO: Сделать логику подготовки запросов для бд 
 */
