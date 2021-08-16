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

    public function uploadFile(): string
    {
        if (isset($_FILES)) {
            $path = 'uploads/' . basename($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], $path);
            return $path;
        } else {
            return '';
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
        $path = $path == '' ? $article['uri'] : $path;
        $this->articleRepository->editArticle($id, $_POST['name'], $_POST['text'], $path);
        header('Location: /');
    }

    public function deleteArticle(int $id): void
    {
        $this->articleRepository->deleteArticle($id);
        header('Location: /');
    }
}
