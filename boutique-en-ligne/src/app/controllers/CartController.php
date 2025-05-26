<?php
namespace App\Controllers;

class CartController
{
   public function add()
{
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input'), true);
    $id = isset($data['id']) ? intval($data['id']) : null;
    $quantity = isset($data['quantity']) ? intval($data['quantity']) : 1;

    if (!$id) {
        echo json_encode(['success' => false, 'message' => 'ID manquant.']);
        return;
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] += $quantity; 
    } else {
        $_SESSION['cart'][$id] = $quantity; 
    }

    echo json_encode(['success' => true]);
}

    public function show()
{
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    if (empty($cart)) {
        $products = [];
        $total = 0;
    } else {
      
        $ids = array_keys($cart);
        $placeholders = implode(',', array_fill(0, count($ids), '?'));

        $pdo = \App\Models\Database::connect();
        $sql = "SELECT id, name, price, image_url FROM product WHERE id IN ($placeholders)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($ids);
        $products = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        
foreach ($products as $key => $product) {
    $quantity = $cart[$product['id']];
    $products[$key]['quantity'] = $quantity;
    $products[$key]['subtotal'] = $quantity * $product['price'];
}


        $total = array_sum(array_column($products, 'subtotal'));
    }

    $pageTitle = 'Votre panier';

    require_once __DIR__ . '/../views/CartView.php';
}


public function clear()
{
    unset($_SESSION['cart']); // Efface le panier
    header('Location: /boutique-en-ligne/cart'); // Redirige vers la page panier
    exit;
}


}
