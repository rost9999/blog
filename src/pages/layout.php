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
            // не понимаю как оно будет выглядеть в браузере но мне не нравится эта логика
            <?= $_SERVER['REQUEST_URI'] == "/" ? // двойная кавычка. пожалуйста перепроверяй все. мы это обсуждали миллион раз. чеклист перед коммитом себе сделай
                ''
                :
                '<a href="/" type="button" class="btn btn-success">Back</a>'; ?>
            <?= isset($user['admin']) && $user['admin'] == 1 ?
                '<a href="/article/viewAddArticle" type="button" class="btn btn-success">Add Article</a>'
                :
                ''; ?>
        </div>
        <div class="col">
            <p class="text-end"><?= !empty($_SESSION['id']) ? 'hello :' . $user['email'] : 'please login'; ?> </p>
            <a href=<?= !empty($_SESSION['id']) ? '/users/logout' : '/users'; ?> type="button"
               class="btn btn-success float-end"><?= !empty($_SESSION['id']) ? 'LogOut' : 'Login'; ?></a>
        </div>
    </div>

    <?= $content; ?>

</body>
</html>
