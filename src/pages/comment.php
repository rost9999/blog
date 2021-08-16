<?php
$owners = new \Repositories\UserRepository(); // мы во вьюшке запросов в БД не делаем. все в контроллере. вью это про вывод данных а не про их получение и обработку
$commentsClass = new \Repositories\CommentRepository();
$comments = $commentsClass->getComments($data['article']['id']); // скажи пхпшторму что такая переменная существует
$user = \Components\Auth::user();
?>

<?php foreach ($comments as $comment): ?>
    <?php $owner = $owners->getUserById($comment['user_id']); ?>
    <div class="row">
        <div class="col">
            <div class="card" style="width: fit-content;">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted"><?= $owner['email'] ?></h6>
                    <?= $comment['text'] ?>
                </div>
            </div>
            <?php if (isset($user['admin']) && $user['admin'] == 1): ?> // хуже некуда. нужна система с ролями и правами доступа пользователей. но наверное уже в след проетке. я подумаю
                <a onclick="sendGet(<?= $comment['id']; ?>)" class="btn btn-danger">Delete</a>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>

<script>
    const sendGet = async (id) => { // sendGet это что? мне это ни о чем не говорит когда я читаю код
        let response = await fetch("/comment/deleteComment/" + id);
        let result = await response.text();
        document.getElementById('commentBlock').innerHTML = result;
    }
</script>
