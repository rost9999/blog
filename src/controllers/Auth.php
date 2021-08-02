<?php


namespace Controllers;

use Repositories\UserRepository;

class Auth
{
    public static $user = null;
    private static UserRepository $UserRepository;

    static function login($email,$password)
    {
        $user = self::$UserRepository->getUser($email);
        if ($user){
            if (password_verify($password, $user['password'])){
                self::$user = $user;
                $_SESSION['login'] = $email;
            }
        }
    }


}