<?php
/** @var array $articles */
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
    <div class="row">
        <div class="col">
            <a href="/home/viewAddPost" type="button" class="btn btn-success">Add Post</a>
            <table class="table">
                <thead>
                <tr>
                    <?php foreach (array_keys($articles[0]) as $key => $value): ?>
                        <th scope="col"><?= $value; ?></th>
                    <?php endforeach; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $key => $value): ?>
                    <tr>
                        <th scope="row"><?= $value['id']; ?></th>
                        <td><?= $value['name']; ?></td>
                        <td><?= $value['text']; ?></td>
                        <td><a href="/home/viewEditPost/<?= $value['id']; ?>" type="button"
                               class="btn btn-primary btn-sm">Edit</a></td>
                        <td><a href="/home/deletePost/<?= $value['id']; ?>" type="button" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
