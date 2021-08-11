<?php
/** @var array $data */
?>

<div class="row">
    <div class="col-md-auto">
        <?= empty($data['result']) ? '' : '<p> ' . $data['result'] . ' </p>' ?>
        <?php if (isset($data['errors'])): ?>
            <ul>
                <?php foreach ($data['errors'] as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
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
