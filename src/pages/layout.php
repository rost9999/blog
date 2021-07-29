<?php
/** @var array $content */
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
        </div>
    </div>
</div>

<?= $content; ?>

</body>
</html>