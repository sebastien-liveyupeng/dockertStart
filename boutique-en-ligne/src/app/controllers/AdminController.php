<?php

namespace App\Controllers;

require_once 'app/helpers/auth.php';
require_once 'app/core/Database.php';

use App\Core\Database;
use PDO;

class AdminController
{
    public function dashboard()
    {
        if (!isAdmin()) {
            header('Location: /boutique-en-ligne/login');
            exit;
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $user = null;
        $id = $_SESSION['user_id'] ?? null;

        if ($id) {
            $pdo = Database::connect(); 
            $stmt = $pdo->prepare("SELECT * FROM account WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        require 'app/views/admin/dashboard.php';
    }
}
