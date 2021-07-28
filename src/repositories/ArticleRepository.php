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

    public function getArticle($id): array
    {
        $stmt = $this->db->query("SELECT * FROM `articles` WHERE `id` = $id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPost(array $data)
    {
        $sql = $this->db->prepare("INSERT INTO `articles` (name,text) VALUES (:name,:text)");
        $sql->execute($data);
    }

    public function editPost($data, $id)
    {
        $sql = $this->db->prepare("UPDATE `articles` SET name = :name, text = :text WHERE id = $id");
        $sql->execute($data);

    }

    public function deletePost($id)
    {
        $sql = $this->db->prepare("DELETE FROM `articles` WHERE  id =:id");
        $sql->execute(['id' => $id]);
    }

}
