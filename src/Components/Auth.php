<?php

namespace Components;

use PDO;

class Auth
{
    public static function user($id = null)
    {
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
        }
        $pdo = DbConnection::getInstance();
        if ($id) {
            $sql = $pdo->prepare("SELECT * FROM `users` WHERE id = :id LIMIT 1");
            $sql->execute(['id' => $_SESSION['id']]);
            return $sql->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
}