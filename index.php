<?php

require_once "./vendor/autoload.php";

use controllers\HomeController;

$controller = new HomeController;
$controller->default();
