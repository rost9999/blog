<?php
/** @var array $data */

use Components\Auth;

$user = Auth::user();
?>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['article']['name']; ?></h5>
                    <p class="card-text"><?= $data['article']['text']; ?></p>
                    <?php if (isset($user['admin']) && $user['admin'] == 1): ?>
                        <a href="/article/viewEditArticle/<?= $data['article']['id']; ?>"
                           class="btn btn-success">Edit</a>
                        <a href="/article/deleteArticle/<?= $data['article']['id']; ?>"
                           class="btn btn-danger">Delete</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/comment/addComment" method="post">
                <textarea class="form-control" name="text" placeholder="Add comment" rows="3"></textarea>
                <input type="hidden" name="article_id" id="hiddenField" value="<?php echo $data['article']['id'] ?>"/>
                <input type="hidden" name="user_id" id="hiddenField" value="<?php echo $user['id'] ?>"/>
                <button type="submit" class="btn btn-primary float-end">Add</button>
            </form>
        </div>
    </div>

<?php foreach ($data['comments'] as $comment): ?>
    <?php $owner = Auth::user($comment['user_id']); ?>
    <div class="row">
        <div class="col">
            <div class="card" style="width: fit-content;">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted"><?= $owner['login'] ?></h6>
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