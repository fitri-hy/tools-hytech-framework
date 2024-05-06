<?php
namespace App\Config;

class Config {
    public static function getDatabaseConfig() {
        return array(
            'host' => 'localhost',
            'dbname' => 'nama_database',
            'username' => 'nama_pengguna_database',
            'password' => 'password_database',
            'use_database' => false // Set to 'true' for use database connection
        );
    }
}
?>
