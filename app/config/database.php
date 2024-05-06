<?php
namespace App\Config;

class Database {
    protected $connection;

    public function __construct($config) {
        $host = $config['host'];
        $dbname = $config['dbname'];
        $username = $config['username'];
        $password = $config['password'];

        try {
            $this->connection = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();
            die();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
