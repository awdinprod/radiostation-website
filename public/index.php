<?php
    require_once './../app/core/Autoload.php';

    use App\route\router;

    if($_SERVER['REQUEST_URI'] == '/phpmyadmin'){
        require_once '/usr/share/phpmyadmin/index.php';
    }

    $router = new router();
    $router->get($_SERVER['REQUEST_URI']);
    ?>