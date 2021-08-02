<?php

namespace Controllers;

use repositories\UserRepository;
use views\View;

class UsersController
{
    protected UserRepository $UserRepository;

    public function __construct()
    {
        $this->UserRepository = new UserRepository();
    }

    public function registerFrom(): void
    {
        View::render('register_form');
    }

    public function register(): void
    {
        if ((strlen($_POST['email']) < 4) or (strlen($_POST['password']) < 4)) {
            View::render('register_form');
            echo '<p> Email and password must be more than 4 character</p>';
        } elseif (!($this->UserRepository->getUser($_POST['email']))) {
            $user = $this->UserRepository->registerUser($_POST['email'], $_POST['password']);
            $_SESSION['id'] = $user ? $this->UserRepository->getUser($_POST['email'])['id'] : null;
            header('Location: /');
        } else {
            View::render('register_form');
            echo '<p> Email is registered</p>';
        }
    }

    public function login()
    {
        $user = $this->UserRepository->getUser($_POST['email']);
        $_SESSION['id'] = $user['id'];
        header('Location: /');
    }

    public function default(): void
    {
        View::render('login_form');
    }

    public function logout()
    {
        $_SESSION = [];
        header('Location: /');
    }
}

