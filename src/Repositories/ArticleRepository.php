<?php

namespace Repositories;

use Components\DbConnection;
use PDO;

class ArticleRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DbConnection::getInstance();
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM articles');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticle(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM articles WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addArticle(string $name, string $text, string $path): void
    {
        $sql = $this->pdo->prepare('INSERT INTO articles (name,text,URI) VALUES (:name, :text, :URI)'); // URI почему большими буквами?
        // напиши скрипт миграции плиз. он подключается к БД и создает там нужные таблицы с нужными полями. и в ридми напиши как его запускать и кк он называется
        $sql->execute(['name' => $name, 'text' => $text, 'URI' => $path]);
    }

    public function editArticle(int $id, string $name, string $text, string $uri): void
    {
        $sql = $this->pdo->prepare('UPDATE articles SET name = :name, text = :text, uri = :uri WHERE id = :id');
        $sql->execute(['id' => $id, 'name' => $name, 'text' => $text, 'uri' => $uri]);
    }

    public function deleteArticle(int $id): void
    {
        $sql = $this->pdo->prepare('DELETE FROM articles WHERE  id = :id');
        $sql->execute(['id' => $id]);
    }
}
