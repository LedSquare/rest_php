<?php

namespace App\Core\Database;

use App\Core\Database\DBConnectionInterface;
use PDO;

final class DatabaseMysqlConnection implements DBConnectionInterface
{
    private string $host;
    private string $dbname;
    private string $user;
    private string $password;
    private ?PDO $connection = null;

    public function __construct()
    {
        $this->loadEnv();
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

        } catch (\Exception $e) {
            echo 'Error: ', $e->getMessage(), "\n", "<hr>";
            die;
        }
    }

    public function queryInject(string $sql, $params = []): mixed
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = :username AND age > :age");
        $stmt->bindValue(':username', 'john', PDO::PARAM_STR);
        $stmt->bindValue(':age', 25, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function closeConnection(): void
    {
        $this->connection = null;
    }




}