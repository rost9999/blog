<?php

namespace Components;

use PDO;

class DbConnection
{
    private static $instance;

    public static function getInstance(): PDO
    {
        if (!self::$instance) {
            self::$instance = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_LOGIN'], $_ENV['DB_PASSWORD']);
        }
        return self::$instance;
    }
}
