<?php

namespace Components;

use PDO;

class DbConnection
{
    private static $instance;
    
    public static function getInstance(): PDO
    {
        if (!self::$instance) {
            // время пришло. вынеси конфиг в файл .env в корне https://github.com/vlucas/phpdotenv
            self::$instance = new PDO('mysql:host=localhost;dbname=task3', 'root', 'qwer1234');
        }
        return self::$instance;
    }
}
