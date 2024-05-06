<?php

namespace App\Models;

class Database {
    protected $pdo;

    public function __construct() {
        $config = require_once(__DIR__ . '/../config/config.php');
        
        if ($config['use_database']) {
            $dsn = "mysql:host={$config['host']};dbname={$config['database']}";
            $this->pdo = new \PDO($dsn, $config['username'], $config['password']);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } else {
            $this->pdo = null;
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}
