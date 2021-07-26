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

    public function addPost(array $data = [])
    {
        if (!empty($data['name'])) {
            $this->articleRepository->addPost($data);
            header('Location: /');
        } else {
            include "./src/pages/add_post.php";
        }

    }
}
