<?php

namespace Controllers;

use Components\View;
use Repositories\ArticleRepository;

class ArticleController
{
    protected ArticleRepository $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }

    public function viewArticle(int $id): void
    {
        $article = $this->articleRepository->getArticle($id);
        View::render('article', ['article' => $article]);
    }

    public function viewAddArticle(): void
    {
        View::render('form');
    }

    public function addArticle(): void
    {
        $path = $this->uploadFile();
        $this->articleRepository->addArticle($_POST['name'], $_POST['text'], $path);
        header('Location: /');
    }

    public function uploadFile(): string // почему метод публичный? судя по логике он должен быть приватным
    {
        if (isset($_FILES)) {
            $path = 'uploads/' . basename($_FILES['file']['name']); // а если загрузят 2 файла с одинаковым именем? они ж друг друга перетрут. попробуй назвать
            // файл uniqueid() и как-то вытащить файл экстеншн. и из них слепить файлнейм
            move_uploaded_file($_FILES['file']['tmp_name'], $path);
            return $path;
        } else {
            return ''; // не нужно возвращать пустую строку. не возвращай ничего. а то как будто в пустой строке есть какой то сокральный смысл
        }
    }

    public function viewEditArticle(int $id): void
    {
        $article = $this->articleRepository->getArticle($id);
        View::render('form', ['article' => $article]);
    }

    public function editArticle(int $id): void
    {
        $article = $this->articleRepository->getArticle($id);
        $path = $this->uploadFile();
        $path = $path == '' ? $article['uri'] : $path; //  $path = $path ?? $article['uri']
        $this->articleRepository->editArticle($id, $_POST['name'], $_POST['text'], $path);
        header('Location: /');
    }

    public function deleteArticle(int $id): void
    {
        $this->articleRepository->deleteArticle($id);
        header('Location: /');
    }
}
