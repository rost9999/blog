<?php

namespace Controllers;

use Repositories\CommentRepository;

class CommentController
{
    private CommentRepository $commentRepository;

    public function __construct()
    {
        $this->commentRepository = new CommentRepository();
    }

    public function addComment(): void
    {
        $this->commentRepository->addComment($_POST['article_id'], $_POST['user_id'], $_POST['text']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function deleteComment(int $id): void
    {
        $this->commentRepository->deleteComment($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
