<?php

namespace App\Models;

use App\Core\Database;

class User
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect();

  }

  public function findByEmail($email)
  {
    $stmt = $this->db->prepare('SELECT * FROM account WHERE email = :email');
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }

  public function create($data)
  {
    $stmt = $this->db->prepare("INSERT INTO account (first_name, name, email, password, is_admin) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([
      $data['first_name'],
      $data['name'],
      $data['email'],
      $data['password'],
      $data['is_admin']
    ]);
  }

  public function updateUser($userId, $data)
  {
    $updates = [];
    $params = [':id' => $userId];

    if (isset($data['first_name'])) {
      $updates[] = 'first_name = :first_name';
      $params[':first_name'] = $data['first_name'];
    }
    if (isset($data['name'])) {
      $updates[] = 'name = :name';
      $params[':name'] = $data['name'];
    }
    if (isset($data['email'])) {
      $updates[] = 'email = :email';
      $params[':email'] = $data['email'];
    }
    if (isset($data['password'])) {
      $updates[] = 'password = :password';
      $params[':password'] = $data['password'];
    }

    if ($updates) {
      $sql = 'UPDATE account SET ' . implode(', ', $updates) . ' WHERE id = :id';
      $stmt = $this->db->prepare($sql);
      return $stmt->execute($params);
    }

    return false;
  }
}
