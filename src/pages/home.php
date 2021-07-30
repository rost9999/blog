<?php
/** @var array $data */
?>

<?php foreach ($data['articles'] as $article): ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $article['name']; ?></h5>
                    <p class="card-text"><?= $article['text']; ?></p>
                    <a href="/home/viewArticle/<?= $article['id']; ?>" class="btn btn-primary">Read</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</div>
