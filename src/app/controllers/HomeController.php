<?php
namespace App\Controllers;

use App\Models\ProductModel;

class HomeController
{
    public function index()
    {
      
        $randomProducts = ProductModel::getRandomProducts(4);

        require_once __DIR__ . '/../views/Home.php';
    }
}
