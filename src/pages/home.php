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
        <form action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="name" name="name">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="textarea" name="text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</body>
</html>
