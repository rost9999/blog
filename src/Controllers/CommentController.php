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
        $this->renderCommentBlock($_POST['article_id']);
    }

    public function renderCommentBlock($id)
    {
        $data['article']['id'] = $id;
        include "./src/pages/comment.php";
    }

    public function deleteComment(int $id): void
    {
        $article_id = $this->commentRepository->getComment($id)['article_id'];
        $this->commentRepository->deleteComment($id);
        $this->renderCommentBlock($article_id);
    }
}
