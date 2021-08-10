<?php

namespace Controllers;

use Components\View;
use repositories\UserRepository;

class UsersController
{
    protected UserRepository $userRepository;
    
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }
    
    public function default(): void
    {
        View::render('login_form');
    }
    
    public function registerFrom()
    {
        View::render('register_form');
    }
    
    public function register()
    {
        $errors = [];
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Fill correct email';
        }
        if ((strlen($_POST['password']) < 3)) {
            $errors[] = 'Password must be more than 4 character';
        }
        if (!$errors) {
            $this->userRepository->registerUser($_POST['email'], $_POST['password']);
            View::render('login_form', ['result' => 'Register complete']);
        } else {
            View::render('register_form', ['errors' => $errors]);
        }
    }
    
    public function login()
    {
        $errors = [];
        $user = $this->userRepository->getUser($_POST['email']);
        if (!$user) {
            $errors[] = 'Email not registered';
        } elseif (!password_verify($_POST['password'], $user['password'])) {
            $errors[] = 'Password is incorrect';
        }
        if (!$errors) {
            $_SESSION['id'] = $user['id'];
            header("Refresh:0");
        } else {
            View::render('login_form', ['errors' => $errors]);
        }
    }
    
    public function logout()
    {
        $_SESSION = [];
        header('Location: /');
    }
}

