<?php

namespace App\Config;

use Opis\Database\Database;
use Opis\Database\Connection;

class Model
{
    public $db = null;

    public function __construct()
    {
        try {
            self::openDatabaseConnection();
        } catch (\PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    protected function openDatabaseConnection()
    {
        $connection = new Connection(
            'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD']
        );

        $this->db = new Database($connection);
    }
}
