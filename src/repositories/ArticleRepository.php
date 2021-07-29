<?php

namespace repositories;

use PDO;

class ArticleRepository
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=task3', 'root', 'qwer1234');
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM `articles`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticle(int $id): array
    {
        $stmt = $this->db->query("SELECT * FROM `articles` WHERE `id` = $id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPost(string $name, string $text): void
    {
        $sql = $this->db->prepare("INSERT INTO `articles` (name,text) VALUES (:name,:text)");
        $sql->execute(['name' => $name, 'text' => $text]);
    }

    public function editPost(int $id): void
    {
        $sql = $this->db->prepare("UPDATE `articles` SET name = :name, text = :text WHERE id = $id");
        $sql->execute(['name' => $_POST['name'], 'text' => $_POST['text']]);
    }

    public function deletePost(int $id): void
    {
        $sql = $this->db->prepare("DELETE FROM `articles` WHERE  id =:id");
        $sql->execute(['id' => $id]);
    }
}
