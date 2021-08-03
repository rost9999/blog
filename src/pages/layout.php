<?php
/** @var array $content */

use Components\Auth;

$user = Auth::user();
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
            <?= $_SERVER['REQUEST_URI'] == "/" ?
                '<a href="/home/viewAddArticle" type="button" class="btn btn-success">Add Article</a>'
                :
                '<a href="/" type="button" class="btn btn-success">Back</a>'
            ?>
        </div>
        <div class="col">
            <p class="text-end"><?= !empty($_SESSION['id']) ? 'hello :' . $user['login'] : 'please login'; ?> </p>
            <a href=<?= !empty($_SESSION['id']) ? '/users/logout' : '/users'; ?> type="button"
               class="btn btn-success float-end"><?= !empty($_SESSION['id']) ? 'LogOut' : 'Login'; ?></a>
        </div>
    </div>

    <?= $content; ?>

</body>
</html>
