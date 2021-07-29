<?php
/** @var array $data */
?>
    <?php foreach ($data['article'] as $article): ?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article['name']; ?></h5>
                        <p class="card-text"><?= $article['text']; ?></p>
                        <a href="/home/viewEditPost/<?= $article['id']; ?>" class="btn btn-success">Edit</a>
                        <a href="/home/deletePost/<?= $article['id']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
