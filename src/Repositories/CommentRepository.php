<?php

namespace Repositories;

use Components\DbConnection;
use PDO;

class CommentRepository
{
    private PDO $pdo;
    
    public function __construct()
    {
        $this->pdo = DbConnection::getInstance();
    }
    
    public function addComment(int $article_id, int $user_id, string $text): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO `comments` (article_id, user_id, text) VALUES (:article_id, :user_id, :text)'); // одинарные кавычки
        $stmt->execute(['article_id' => $article_id, 'user_id' => $user_id, 'text' => $text]);
    }
    
    public function getComments(int $id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `comments` WHERE article_id = :id"); // двойные. у меня пунктик на счет кавычек. не все пхпешники за этим следят, но я с лежу. это не ошибка на самом деле, просто я так привык и считаю что так правильно. и пару моих коллег - синьйоров так считают тоже
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getComment(int $id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `comments` WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function deleteComment(int $id): void
    {
        $sql = $this->pdo->prepare("DELETE FROM `comments` WHERE  id = :id");
        $sql->execute(['id' => $id]);
    }
}// пустая строка