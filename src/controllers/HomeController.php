<?php

namespace controllers;

use repositories\ArticleRepository;
use views\View;

class HomeController
{
    protected ArticleRepository $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }

    public function default(): void
    {
        $articles = $this->articleRepository->getAll();
        View::render('home', ['articles' => $articles]);

    }

    public function viewPost(int $id): void
    {
        $article = $this->articleRepository->getArticle($id);
        View::render('post', ['article' => $article]);
    }

    public function viewAddPost(): void
    {
        View::render('form');
    }

    public function addPost(): void
    {
        $this->articleRepository->addPost($_POST['name'], $_POST['text']);
        header('Location: /');
    }

    public function viewEditPost(int $id): void
    {

        $article = $this->articleRepository->getArticle($id);
        View::render('form', ['article' => $article]);
    }

    public function editPost(int $id): void
    {
        $this->articleRepository->editPost($id);
        header('Location: /');
    }

    public function deletePost(int $id): void
    {
        $this->articleRepository->deletePost($id);
        header('Location: /');
    }
}
