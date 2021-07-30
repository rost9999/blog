<?php
/** @var array $data */
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $data['article']['name']; ?></h5>
                <p class="card-text"><?= $data['article']['text']; ?></p>
                <a href="/home/viewEditPost/<?= $data['article']['id']; ?>" class="btn btn-success">Edit</a>
                <a href="/home/deletePost/<?= $data['article']['id']; ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

