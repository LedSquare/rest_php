<?php

interface DatabaseConnectionInterface {
    public function connect();
    public function executeQuery(string $query);
    public function closeConnection();
}

interface DatabaseCRUDInterface {
    public function create(array $data);
    public function read(int $id);
    public function update(int $id, array $data);
    public function delete(int $id);
}

class MySqlConnection implements DatabaseConnectionInterface {
    public function connect() {
        echo "Подключение к базе данных MySQL.
";
    }

    public function executeQuery(string $query) {
        echo "Выполнение запроса: $query
";
    }

    public function closeConnection() {
        echo "Закрытие соединения с базой данных MySQL.
";
    }
}

class PostgreSqlConnection implements DatabaseConnectionInterface {
    public function connect() {
        echo "Подключение к базе данных PostgreSQL.
";
    }

    public function executeQuery(string $query) {
        echo "Выполнение запроса: $query
";
    }

    public function closeConnection() {
        echo "Закрытие соединения с базой данных PostgreSQL.
";
    }
}

class Database implements DatabaseCRUDInterface {
    private $connection;

    public function __construct(DatabaseConnectionInterface $connection) {
        $this->connection = $connection;
    }

    public function create(array $data) {
        // Логика создания записи в базе данных
        $this->connection->connect();
        // ...
        $this->connection->executeQuery("INSERT INTO table_name VALUES ...");
        // ...
        $this->connection->closeConnection();
    }

    public function read(int $id) {
        // Логика чтения записи из базы данных
        $this->connection->connect();
        // ...
        $this->connection->executeQuery("SELECT * FROM table_name WHERE id = $id");
        // ...
        $this->connection->closeConnection();
    }

    public function update(int $id, array $data) {
        // Логика обновления записи в базе данных
        $this->connection->connect();
        // ...
        $this->connection->executeQuery("UPDATE table_name SET ... WHERE id = $id");
        // ...
        $this->connection->closeConnection();
    }

    public function delete(int $id) {
        // Логика удаления записи из базы данных
        $this->connection->connect();
        // ...
        $this->connection->executeQuery("DELETE FROM table_name WHERE id = $id");
        // ...
        $this->connection->closeConnection();
    }
}

// Пример использования

$mysqlConnection = new MySqlConnection();
$mysqlDatabase = new Database($mysqlConnection);

$postgresConnection = new PostgreSqlConnection();
$postgresDatabase = new Database($postgresConnection);

$mysqlDatabase->create(['name' => 'John', 'age' => 25]);
$mysqlDatabase->read(1);
$mysqlDatabase->update(1, ['name' => 'Jane', 'age' => 30]);
$mysqlDatabase->delete(1);

$postgresDatabase->create(['name' => 'Alex', 'age' => 35]);
$postgresDatabase->read(1);
$postgresDatabase->update(1, ['name' => 'Alice', 'age' => 40]);
$postgresDatabase->delete(1);
