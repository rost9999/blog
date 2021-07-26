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
        $articles = $this->articleRepository->get_all();

        include "./src/pages/home.php";
    }
}
