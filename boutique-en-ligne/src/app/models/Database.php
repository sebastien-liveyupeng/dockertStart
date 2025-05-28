<?php
namespace App\Models;

use PDO;

class Database
{
    public static function connect(): PDO
    {        $host     = 'mysql';
        $dbname   = 'omni';           
        $username = 'root';
        $password = 'root';

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,   
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        return $pdo;
    }
}
