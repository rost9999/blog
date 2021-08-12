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
        $this->articleRepository->addArticle($_POST['name'], $_POST['text']);
        header('Location: /');
    }

    public function viewEditArticle(int $id): void
    {
        $article = $this->articleRepository->getArticle($id);
        View::render('form', ['article' => $article]);
    }

    public function editArticle(int $id): void
    {
        $this->articleRepository->editArticle($id, $_POST['name'], $_POST['text']);
        header('Location: /');
    }

    public function deleteArticle(int $id): void
    {
        $this->articleRepository->deleteArticle($id);
        header('Location: /');
    }
}
