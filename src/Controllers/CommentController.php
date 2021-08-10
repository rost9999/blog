<?php

namespace Controllers;

use Repositories\CommentRepository;

/**
 * окей. а теперь давай сделаем так чтобы при добавлении коммента не нужно было перезагружать страницу
 * технология называется ajax. схема такая
 * - пишу коммент
 * - нажимаю кнопку отправить
 * - джс скрипт берет данные из формы коммента и шлет на бек
 * - бек добавляет запись в БД
 * - бек рендерит блок хтмл со всеми комментами. мы вынесем отрисовку комментов в отдельный файл в папке pages
 * - отдаем сгенеренный хтмл. и в нем уже есть новый коммент
 * - джс получает этот ответ. иполученные текст вставляет вместо своего текущего блока комментов
 */
class CommentController
{
    private CommentRepository $commentRepository;
    private ArticleController $articleController;
    
    public function __construct()
    {
        $this->commentRepository = new CommentRepository();
        $this->articleController = new ArticleController(); // ненене, контроллер с другим конроллером взаимодействовать не должен!
    }
    
    public function addComment(): void
    {
        $this->commentRepository->addComment($_POST['article_id'], $_POST['user_id'], $_POST['text']);
        $this->articleController->viewArticle($_POST['article_id']); // продублируй код
    }
    
    public function deleteComment(int $id): void
    {
        $comment = $this->commentRepository->getComment($id);
        $this->commentRepository->deleteComment($id);
        $this->articleController->viewArticle($comment['article_id']); // продублируй код
    }
}