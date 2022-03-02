<?php
//    echo $_SERVER['REQUEST_URI'];
    $uri = $_SERVER['REQUEST_URI'];
    if ($uri == '/' || $uri == '/index.php') {
        require('src/header.php');
        require('src/mainpage.php');
        require('src/footer.php');
    }
    elseif ($uri == '/online-player/') {
        require('online-player/player.html');
    }
    elseif ($uri == '/posts') {
        require('posts.php');
    }
    elseif ($uri == '/podcasts') {
        require('podcasts.php');
    }
    elseif ($uri == '/chart') {
        require('chart.php');
    }
    else {
        echo "404: Not Found :(";
    }