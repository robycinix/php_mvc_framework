<?php
namespace Core;

use PDO;

class Database {
    public PDO $pdo;

    public function __construct(array $config) {
        $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $this->pdo = new PDO($dsn, $config['user'], $config['password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
