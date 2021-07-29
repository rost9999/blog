<?php


namespace repositories;

use PDO;

class UserRepository extends ArticleRepository
{
    public function addUser(string $login, string $password): bool
    {
        $sql = $this->db->prepare("INSERT INTO `users` (login,password) VALUES (:login,:password)");
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $sql->execute(['login' => $login, 'password' => $password]);
    }

    public function getUser($login, $password): array
    {
        $sql = $this->db->prepare("SELECT * FROM `users` WHERE login = :login");
        $sql->execute(['login' => $login]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}