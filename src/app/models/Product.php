<?php

namespace App\Models;

use App\Core\Database;


class Product
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect();
  }

  public function getAll()
  {
    return $this->db->query("SELECT * FROM product")->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function findById($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM product WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }

  public function create($data)
  {
    $stmt = $this->db->prepare("INSERT INTO product (name, description, price, gender_id, garment_id, color_id, size_id, image_url, stock_quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
      $data['name'],
      $data['description'],
      $data['price'],
      $data['gender_id'],
      $data['garment_id'],
      $data['color_id'],
      $data['size_id'],
      $data['image_url'],
      $data['stock_quantity'],
    ]);
  }

  public function update($id, $data)
  {
    $stmt = $this->db->prepare("UPDATE product SET name = ?, description = ?, price = ?, gender_id = ?, garment_id = ?, color_id = ?, size_id = ?, image_url = ?, stock_quantity = ? WHERE id = ?");
    $stmt->execute([
      $data['name'],
      $data['description'],
      $data['price'],
      $data['gender_id'],
      $data['garment_id'],
      $data['color_id'],
      $data['size_id'],
      $data['image_url'],
      $data['stock_quantity'],
      $id
    ]);
  }

  public function delete($id)
  {
    $stmt = $this->db->prepare("DELETE FROM product WHERE id = ?");
    $stmt->execute([$id]);
  }
}
