<?php

namespace Components;

class View
{
    public static function render($page, $data = [])
    {
        ob_start();
        include __DIR__ . DIRECTORY_SEPARATOR . "../pages/" . $page . ".php";
        $content = ob_get_clean();
        include __DIR__ . DIRECTORY_SEPARATOR . "../pages/layout.php";
    }
}