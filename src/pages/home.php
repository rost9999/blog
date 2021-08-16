<?php
/** @var array $data */
?>

<?php foreach ($data['articles'] as $article): ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $article['name']; ?></h5>
                    <img src="/<?= $article['uri']; ?>" class="rounded mx-auto d-block w-auto p-3" ">
                    <p class="card-text"><?= $article['text']; ?></p>
                    <a href="/article/viewArticle/<?= $article['id']; ?>" class="btn btn-primary">Read</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
