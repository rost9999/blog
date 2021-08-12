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
    public function renderCommentBlock() {
        include "./src/pages/comment.php";
    }

    public function addComment(): void
    {
        $this->commentRepository->addComment($_POST['article_id'], $_POST['user_id'], $_POST['text']);
        $this->renderCommentBlock();

    }

    public function deleteComment(int $id): void
    {
        $this->commentRepository->deleteComment($id);

    }


}
