<?php
    require_once './../app/core/Autoload.php';

    use App\route\router;

    $router = new router();
    $router->get($_SERVER['REQUEST_URI']);
    ?>