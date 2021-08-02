<?php
/** @var array $data */
?>

<div class="row">
    <div class="col">
        <form action="/home/<?= !empty($data['article']) ? "editArticle/" . $data['article']['id'] : "addArticle" ?>" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="name" name="name"
                       value=<?= $data['article']['name'] ?? ""; ?>>
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="textarea"
                          name="text"><?= $data['article']['text'] ?? ""; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
