<?php

namespace Controllers;

use Components\View;
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
        View::render('home', ['articles' => $articles]);
    }
}
