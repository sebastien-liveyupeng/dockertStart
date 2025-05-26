<?php
namespace App\Helpers;

class Flash
{
    public static function set($key, $message)
    {
        $_SESSION['flash'][$key] = $message;
    }

    public static function get($key)
    {
        if (isset($_SESSION['flash'][$key])) {
            $msg = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $msg;
        }
        return null;
    }
}
