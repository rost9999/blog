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
        View::render('home',['articles'=>$articles]);

    }

    public function viewPost(int $id): void
    {
        $articles = $this->articleRepository->getArticle($id);

        include "./src/pages/post.php";
    }

    public function viewAddPost(): void
    {
        include "./src/pages/form.php";
    }

    public function addPost(): void
    {
        $this->articleRepository->addPost($_POST['name'], $_POST['text']);
        header('Location: /');
    }

    public function viewEditPost(int $id): void
    {
        $article = $this->articleRepository->getArticle($id)[0];
        include "./src/pages/form.php";
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
