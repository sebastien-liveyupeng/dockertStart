<?php

namespace App\Controllers;

use App\Models\Product;
use App\Helpers\Flash;

class AdminProductController
{
  public function index()
  {
    $productModel = new Product();
    $products = $productModel->getAll();
    require_once 'app/views/admin/products/index.php';
  }

  public function create()
  {
    require_once 'app/views/admin/products/create.php';
  }

  public function store()
  {
    // Récupérer et valider les données POST
    $productModel = new Product();
    $productModel->create($_POST);
    Flash::set('success', 'Product successfully created.');
    header('Location: /boutique-en-ligne/admin/products');
  }

  public function edit($id)
  {
    $productModel = new Product();
    $product = $productModel->findById($id);
    require_once 'app/views/admin/products/edit.php';
  }

  public function update($id)
  {
    $productModel = new Product();
    $productModel->update($id, $_POST);
    Flash::set('success', 'Product successfully updated.');
    header('Location: /boutique-en-ligne/admin/products');
  }

  public function delete($id)
  {
    $productModel = new Product();
    $productModel->delete($id);
    Flash::set('success', 'Product successfully deleted.');
    header('Location: /boutique-en-ligne/admin/products');
  }
}
