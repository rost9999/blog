<?php

namespace Repositories;

use Components\DbConnection;
use PDO;

class UserRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DbConnection::getInstance();
    }

    public function registerUser(string $login, string $password): bool
    {
        $sql = $this->pdo->prepare("INSERT INTO `users` (login,password) VALUES (:login,:password)");
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $sql->execute(['login' => $login, 'password' => $password]);
    }

    public function getUser(string $login): ?array
    {
        $sql = $this->pdo->prepare("SELECT * FROM `users` WHERE login = :login LIMIT 1");
        if ($sql->execute(['login' => $login])) {
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
        return null;

    }
}
