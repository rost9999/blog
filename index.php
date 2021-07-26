<?php

require_once "./vendor/autoload.php";

use controllers\HomeController;

$url = explode('/', $_SERVER['REQUEST_URI']);
$controllerName = $url[1];
$method = $url[2];

if (empty($url[1])) {
    $controllerName = HomeController::class;
} else {
    $controllerName = "controllers\\" . $controllerName . "Controller";
}

if (empty($method)) {
    $method = 'default';
}

if (method_exists($controllerName, $method)) {
    $controller = new $controllerName();
    $controller->$method($_POST);
} else {
    http_response_code(404);
    echo 404;
}
