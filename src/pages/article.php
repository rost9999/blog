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
<?php if ($user): ?>
    <div class="row">
        <div class="col">
<!--            <form action="/comment/addComment" method="post">-->
                        <form id="formElem">
                <textarea class="form-control" name="text" placeholder="Add comment" rows="3"></textarea>
                <input type="hidden" name="article_id" id="article_id" value="<?php echo $data['article']['id'] ?>"/>
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $user['id'] ?>"/>
                <button type="submit" class="btn btn-primary float-end">Add</button>
            </form>
        </div>
    </div>
<?php endif; ?>
<div id="commentBlock">
    <?php
    include "./src/pages/comment.php";
    ?>
</div>

<script>
    formElem.onsubmit = async (e) => {
        e.preventDefault();

        let response = await fetch('/comment/addComment', {
            method: 'POST',
            body: new FormData(formElem)
        });

        let result = await response.text();

        document.getElementById('commentBlock').innerHTML = result;
    };
</script>
