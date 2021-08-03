<?php
/** @var array $data */
?>

<div class="row">
    <?php if (isset($data['errors'])): ?>
        <ul>
            <?php foreach ($data['errors'] as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <p>Fill in the fields </p>
    <div class="col-md-auto">
        <form action="/users/register" method="post">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="email" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="password" name="password">
            </div>
            <button type="submit" name="register" class="btn btn-primary float-end">Register</button>
        </form>
    </div>
</div>
