<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
  public static function connect(): PDO
  {
    try {
      return new PDO(
        'mysql:host=localhost;dbname=omni',
        'root',
        '',
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    } catch (PDOException $e) {
      die('Database connection error: ' . $e->getMessage());
    }
  }
}
