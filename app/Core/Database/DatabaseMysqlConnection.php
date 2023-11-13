<?php

namespace App\Core\Database;

use App\Core\Database\DBConnectionInterface;
use PDO;
use PDOException;

final class DatabaseMysqlConnection implements DBConnectionInterface
{
    private static $instance = null;
    private string $host;
    private string $dbname;
    private string $user;
    private string $password;
    private ?PDO $connection = null;

    private function __construct()
    {
        $this->loadEnv();
    }

    public static function getInstance(): self {
        if (null === static::$instance) {
            static::$instance = new self();
        }

        return static::$instance;
    }

    private function loadEnv(): void
    {
        $env = parse_ini_file('../.env');

        $this->host = $env['DB_HOST'];
        $this->dbname = $env['DB_NAME'];
        $this->user = $env['DB_ROOT_USER'];
        $this->password = $env['DB_ROOT_PASSWORD'];
    }

    public function connect(): PDO
    {
        try {

            $this->connection = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->user, $this->password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $this->connection;

        } catch (\PDOException $e) {
            echo 'Error: ', $e->getMessage(), "\n", "<hr>";
            die;
        }
    }


    public function closeConnection(): void
    {
        $this->connection = null;
    }




}