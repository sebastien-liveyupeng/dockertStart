<?php

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(function ($class) {
            $prefix = 'App\\';
            $baseDir = __DIR__ . '/../';

            if (strpos($class, $prefix) === 0) {
                $relativeClass = substr($class, strlen($prefix));

                $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

                if (file_exists($file)) {
                    require $file;
                }else{
                    throw new Exception("Le fichier $file n'existe pas.");
                }
            }
        });
    }
}