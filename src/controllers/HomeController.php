<?php

namespace controllers;

use repositories\ArticleRepository;

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

        include "./src/pages/home.php";
    }

    public function viewPost(int $id): void
    {
        $articles = $this->articleRepository->getArticle($id);

        include "./src/pages/post.php";
    }

    public function viewAddPost(): void
    {
        include "./src/pages/edit_post.php";
    }

    public function addPost(): void
    {

        $this->articleRepository->addPost($_POST);
        header('Location: /');
    }

    public function viewEditPost(int $id): void
    {
        $article = $this->articleRepository->getArticle($id)[0];
        include "./src/pages/edit_post.php";

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
