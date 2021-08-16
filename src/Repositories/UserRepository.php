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

    public function registerUser(string $email, string $password): bool
    {
        $sql = $this->pdo->prepare('INSERT INTO users (email,password) VALUES (:email,:password)');
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $sql->execute(['email' => $email, 'password' => $password]);
    }

    public function getUser(string $email): ?array
    {
        $sql = $this->pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $sql->execute(['email' => $email]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        if ($result) { // не нравится. уж лучше return $result ?? null
            return $result;
        } else {
            return null;
        }
    }

    public function getUserById(int $id): ?array
    {
        $sql = $this->pdo->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
        if ($sql->execute(['id' => $id])) {
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }
}
