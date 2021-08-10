<?php

namespace Controllers;

use Repositories\CommentRepository;

class CommentController
{
    private CommentRepository $commentRepository;
    private ArticleController $articleController;
    
    public function __construct()
    {
        $this->commentRepository = new CommentRepository();
        $this->articleController = new ArticleController();
    }
    
    public function addComment(): void
    {
        $this->commentRepository->addComment($_POST['article_id'], $_POST['user_id'], $_POST['text']);
        $this->articleController->viewArticle($_POST['article_id']);
    }
    
    public function deleteComment(int $id): void
    {
        $comment = $this->commentRepository->getComment($id);
        $this->commentRepository->deleteComment($id);
        $this->articleController->viewArticle($comment['article_id']);
    }
}