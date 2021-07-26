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

    public function addPost($data = '')
    {
        if (!empty($data['name'])) {
            $this->articleRepository->addPost($data);
            echo "<p>Post was added</p>";
        }
        include "./src/pages/addPost.php";
    }
}
