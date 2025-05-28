<?php

namespace App\Controllers;

use App\Models\User;


class AuthController
{
  private $userModel;

  public function __construct()
  {
    $this->userModel = new User();
  }

  public function login()
  {
    
    if (isset($_SESSION['user_id'])) {
      header('Location: /boutique-en-ligne/home');
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = $this->userModel->findByEmail($email);

      if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_first_name'] = $user['first_name'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['is_admin'] = $user['is_admin'];

        // Redirection selon rôle
        if ($user['is_admin']) {
          header('Location: /boutique-en-ligne/admin/dashboard');
        } else {
          header('Location: /boutique-en-ligne/home');
        }
        exit;
      } else {
        $error = "Email ou mot de passe incorrect.";
        require_once __DIR__ . '/../views/auth/login.php';
      }
    } else {
      require_once __DIR__ . '/../views/auth/login.php';
    }
  }

  public function register()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $firstName = trim($_POST['first_name']);
      $name = trim($_POST['name']);
      $email = trim($_POST['email']);
      $password = $_POST['password'];
      $confirmPassword = $_POST['confirm_password'];

      if ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
        require_once __DIR__ . '/../views/auth/register.php';
        return;
      }

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $this->userModel->create([
        'first_name' => $firstName,
        'name' => $name,
        'email' => $email,
        'password' => $hashedPassword,
        'is_admin' => 0
      ]);

      header('Location: /boutique-en-ligne/login');
      exit;
    } else {
      require_once __DIR__ . '/../views/auth/register.php';
    }
  }

  public function logout()
  {
    session_destroy();
    header('Location: /boutique-en-ligne/login');  
    exit;
  }
}
