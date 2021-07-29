<?php

?>

<div class="row">
    <div class="col-md-auto">
        <form action="/users/choice" method="post">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="email" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="password" name="password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <button type="submit" name="register" class="btn btn-primary float-end">Register</button>

        </form>
    </div>
</div>