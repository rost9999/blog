<?php

namespace controllers;

use repositories\ArticleRepository;

class HomeController
{
    protected $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }

    public function default()
    {
        $articles = $this->articleRepository->getAll();

        include "./src/pages/home.php";
    }

    public function viewPost($data,$id)
    {
        $articles = $this->articleRepository->getArticle($id);

        include "./src/pages/post.php";
    }

    public function viewAddPost()
    {
        include "./src/pages/edit_post.php";
    }

    public function addPost(array $data)
    {

        $this->articleRepository->addPost($data);
        header('Location: /');
    }

    public function viewEditPost($data, $id)
    {
        $oldData = $this->articleRepository->getArticle($id);
        include "./src/pages/edit_post.php";

    }

    public function editPost($data, $id)
    {
        $this->articleRepository->editPost($data, $id);
        header('Location: /');
    }

    public function deletePost($data, $id)
    {
        $this->articleRepository->deletePost($id);
        header('Location: /');
    }
}
