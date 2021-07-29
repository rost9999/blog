<?php
/** @var array $data */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Blog</title>
</head>
<body>
<div class="container">
    <a href="/" type="button" class="btn btn-success">Back</a>
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
</div>
</body>
</html>
