<?php
/** @var array $comments */
$owners = new \Repositories\UserRepository();

$commentsClass = new \Repositories\CommentRepository();
$comments = $commentsClass->getComments(1);
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
            <?php if (isset($user['admin']) && $user['admin'] == 1): ?>
                <a href="#/<?= $comment['id']; ?>" class="btn btn-success">Edit</a>
                <a href="/comment/deleteComment/<?= $comment['id']; ?>" class="btn btn-danger">Delete</a>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>