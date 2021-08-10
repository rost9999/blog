<?php

namespace Components;

use PDO;

class Auth
{
    public static function user(// тайпхинт
        //зачем? Auth только для текущего пользователя. для не текущего есть ЮзерРепозиторий
        $id = null)
        // тайпхинт
    {
        //сделай синглтоном
        if (isset($_SESSION['id'])) { // давай !empty() а не иисет. одно и то же но так будет поприятнее читать. одна из тех вещей которые просто на опыте
            $id = $_SESSION['id'];
        }
        $pdo = DbConnection::getInstance();
        if ($id) {
            $sql = $pdo->prepare("SELECT * FROM `users` WHERE id = :id LIMIT 1");
            $sql->execute(['id' => $_SESSION['id']]);
            return $sql->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
        // вот так покрасивее, нет?
        if (!$id) {
            return null;
        }

        $sql = $pdo->prepare("SELECT * FROM `users` WHERE id = :id LIMIT 1");
        $sql->execute(['id' => $_SESSION['id']]);

        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}