<?php

namespace Repositories;

use Components\ConnectToBD;
use PDO;

class UserRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = ConnectToBD::getInstance();
    }

    public function registerUser(string $login, string $password): ?bool
    {
        $sql = $this->pdo->prepare("INSERT INTO `users` (login,password) VALUES (:login,:password)");
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $sql->execute(['login' => $login, 'password' => $password]);
    }

    public function getUser(string $login)
    {
        $sql = $this->pdo->prepare("SELECT * FROM `users` WHERE login = :login LIMIT 1");
        if ($sql->execute(['login' => $login])) {
            return $sql->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
}
