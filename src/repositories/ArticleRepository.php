<?php

namespace repositories;

use PDO;

class ArticleRepository
{

    private $db;

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

    public function addPost(array $data)
    {
        $sql = $this->db->prepare("INSERT INTO `articles` (name,text) VALUES (:name,:text)");
        $sql->execute($data);
    }


}
