<?php
    $uri = $_SERVER['REQUEST_URI'];
    if ($uri == '/index.php' || $uri == '/') {
        require ('src/header.php');
        require ('src/mainpage.php');
        require ('src/footer.php');
    }
    elseif (uri == '/online-player/player.html') {
        require ('online-player/player.html');
    }
    else {
        echo "404: Not Found :(";
    }
?>