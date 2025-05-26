<?php

namespace App\Controllers;

use App\Models\User;

require_once 'app/helpers/auth.php';

class ProfileController
{
  private $userModel;

  public function __construct()
  {
    $this->userModel = new User();
  }

  public function show()
  {
    if (!isLoggedIn()) {
      header('Location: /boutique-en-ligne/login');
      exit;
    }

    $data = [
      'user' => [
        'first_name' => $_SESSION['user_first_name'] ?? 'N/A',
        'name' => $_SESSION['user_name'] ?? 'N/A',
        'email' => $_SESSION['user_email'] ?? 'N/A',
        'is_admin' => $_SESSION['is_admin'] ?? false
      ]
    ];

    // Débogage (à supprimer en production)
    // var_dump($data['user']);

    $this->render('profile', $data);
  }

  public function update()
  {
    if (!isLoggedIn()) {
      header('Location: /boutique-en-ligne/login');
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $firstName = trim($_POST['first_name']);
      $name = trim($_POST['name']);
      $email = trim($_POST['email']);
      $password = $_POST['password'];

      $updateData = [];
      if ($firstName) {
        $updateData['first_name'] = $firstName;
        $_SESSION['user_first_name'] = $firstName;
      }
      if ($name) {
        $updateData['name'] = $name;
        $_SESSION['user_name'] = $name;
      }
      if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $updateData['email'] = $email;
        $_SESSION['user_email'] = $email;
      }
      if ($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $updateData['password'] = $hashedPassword;
      }

      if ($updateData) {
        $this->userModel->updateUser($_SESSION['user_id'], $updateData);
      }

      header('Location: /boutique-en-ligne/profile');
      exit;
    }
  }

  private function render($view, $data = [])
  {
    extract($data);
    define('APP_ACCESS', true);
    require_once "app/views/$view.php";
  }
}
