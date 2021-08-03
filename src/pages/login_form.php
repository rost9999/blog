<?php
/** @var array $data */
?>

<div class="row">
    <div class="col-md-auto">
        <?= empty($data['result']) ? '' : '<p> Register complete </p>' ?>
        <?= empty($data['errors']) ? '' : '<p> ' . $data['errors'][0] . ' </p>' ?>
        <form action="/users/login" method="post">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="email" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="password" name="password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <a href="/users/registerFrom" type="button" class="btn btn-success">Register</a>
        </form>
    </div>
</div>
