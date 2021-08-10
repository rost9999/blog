<?php

namespace Components;

use PDO;

class Auth
{
    public static function user()
    {
        if (!empty($_SESSION['id'])) {
            $pdo = DbConnection::getInstance();
            $sql = $pdo->prepare("SELECT * FROM `users` WHERE id = :id LIMIT 1");
            $sql->execute(['id' => $_SESSION['id']]);
            return $sql->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
        
    }
}