<?php
/** @var array $data */
$data = $data['article'][0];
?>

<div class="row">
    <div class="col">
        <form action="/home/<?= !empty($data) ? "editPost/" . $data['id'] : "addPost" ?>" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="name" name="name"
                       value=<?= $data['name'] ?? ""; ?>>
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="textarea"
                          name="text"><?= $data['text'] ?? ""; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>