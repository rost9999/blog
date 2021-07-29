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
    <title>Edit Post</title>
</head>
<body>
<div class="container">
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
</div>
</body>
</html>