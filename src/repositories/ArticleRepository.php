<?php

namespace Repositories;

use PDO;

class ArticleRepository
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=task3', 'root', 'qwer1234');
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `articles`");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticle(int $id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `articles` WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addArticle(string $name, string $text): void
    {
        $sql = $this->pdo->prepare("INSERT INTO `articles` (name,text) VALUES (:name,:text)");
        $sql->execute(['name' => $name, 'text' => $text]);
    }

    public function editArticle(int $id, $name, $text): void
    {
        $sql = $this->pdo->prepare("UPDATE `articles` SET name = :name, text = :text WHERE id = :id");
        $sql->execute(['id' => $id, 'name' => $name, 'text' => $text]);
    }

    public function deleteArticle(int $id): void
    {
        $sql = $this->pdo->prepare("DELETE FROM `articles` WHERE  id =:id");
        $sql->execute(['id' => $id]);
    }
}
