<?php
namespace App\Controllers;

use App\Models\ProductModel;

class ProductController
{
    // Affiche la views pour les produits 
    public function index()
    {
        $gender = isset($_GET['gender']) ? $_GET['gender'] : 'all';

  
        if (!in_array($gender, ['man', 'woman', 'all'])) {
            $gender = 'all';
        }

        
        if ($gender === 'all') {
            $products = ProductModel::getAllProducts();
        } else {
            $products = ProductModel::getProductsByGender($gender);
        }

 
        $pageTitle = ($gender === 'man') ? 'Produits Homme' :
                     (($gender === 'woman') ? 'Produits Femme' : 'Tous nos produits');

   
        require_once __DIR__ . '/../views/ProductList.php';
    }

   
  public function details()
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;

    if (!$id) {
        http_response_code(400);
        echo "Erreur : ID du produit manquant.";
        return;
    }

    $product = ProductModel::getProductById($id);

    if (!$product) {
        http_response_code(404);
        echo "Erreur : Produit non trouvé.";
        return;
    }

    $pageTitle = $product['name'];

 
    $suggestions = ProductModel::getSuggestionsByGarmentId($product['garment_id'], $product['id']);


    require_once __DIR__ . '/../views/DetailsProduct.php';
}

}
