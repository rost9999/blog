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

    public function default(): void
    {
        View::render('login_form');
    }

    public function choice(): void
    {
        if (isset($_POST['login'])) {
            $this->login();
        } else {
            $this->register();
        }
    }

    public function register(): void
    {
        $isAdd = $this->UserRepository->addUser($_POST['email'], $_POST['password']);
        if ($isAdd) {
            $_SESSION['login'] = $_POST['email'];
            header('Location: /');
        } else {
            $this->default();
            echo "some error";
        }
    }

    public function login()
    {
        $user = $this->UserRepository->getUser($_POST['email'], $_POST['password'])[0];
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['login'] = $_POST['email'];
            header('Location: /');
        } else {
            $this->default();
            echo "incorrect password";
        }
    }

    public function logout()
    {
        $_SESSION = [];
        header('Location: /');
    }
}
