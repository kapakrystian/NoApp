<?php

namespace App\Models;

use PDO;

//model abstrakcyjny
abstract class Model
{

    //właściwość klasy PDO
    protected PDO $conn;

    //konstruktor
    public function __construct(array $config)
    {
        $this->createConnection($config);
    }

    //funkcja tworząca połączenie z bazą danych wd configu
    private function createConnection(array $config): void
    {
        $dsn = "mysql:dbname={$config['database']};host={$config['host']}";
        $this->conn = new PDO(
            $dsn,
            $config['username'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
}
