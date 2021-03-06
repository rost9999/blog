<?php

namespace Components;

use PDO;

class Auth
{
    private static $user;

    public static function user()
    {
        if (!self::$user && isset($_SESSION['id'])) {
            $pdo = DbConnection::getInstance();
            $sql = $pdo->prepare("SELECT * FROM `users` WHERE id = :id LIMIT 1");
            $sql->execute(['id' => $_SESSION['id']]);
            self::$user = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return self::$user;
    }
}
