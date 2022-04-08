<?php

namespace App\Route;

use App\Core\DBConnection;
use App\Views\MainPageView;
use App\Views\PostPageView;
use App\Views\SinglePostView;
use App\Views\PlayerView;

class Router
{
    public function get($uri)
    {
        if ($uri == '/phpinfo') {
            phpinfo();
        } else {
            try {
                $connection = new DBConnection();
            } catch (\Exception $e) {
                print "Error!: " . $e->getMessage();
                die();
            }

            if ($uri == '/') {
                $view = new MainPageView($connection);
            } elseif (substr($uri, 0, 6) == "/posts") {
                $id = (int)substr($uri, 7, strlen($uri));
                $view = new PostPageView($connection, $id);
            } elseif (substr($uri, 0, 11) == "/singlepost") {
                $id = (int)substr($uri, 12, strlen($uri));
                $view = new SinglePostView($connection, $id);
            } elseif ($uri == '/online-player') {
                $view = new PlayerView();
            }
            $view->render($id);
        }
    }
}
