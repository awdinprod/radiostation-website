<?php

require_once './../App/Core/Autoload.php';

use App\Route\Router;

if ($_SERVER['REQUEST_URI'] == '/phpmyadmin') {
} else {
    $router = new Router();
    $router->get($_SERVER['REQUEST_URI']);
}
