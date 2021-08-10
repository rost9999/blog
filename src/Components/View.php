<?php

namespace Components;

class View
{
    public static function render($page, $data = [])// тайпхинты
    {
        ob_start();
        include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . $page . '.php';
        $content = ob_get_clean();
        include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'layout.php';
    }
}// пустая строка в конце файла