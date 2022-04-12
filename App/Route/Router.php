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
        try {
            $connection = new DBConnection();
        } catch (\Exception $e) {
            print "Error!: " . $e->getMessage();
            die();
        }

        $section = explode('/', $uri);

        switch ($section[1]) {
            case '':
                $view = new MainPageView($connection);
                break;
            case 'posts':
                $id = (int)substr($uri, 7, strlen($uri));
                $view = new PostPageView($connection, $id);
                break;
            case 'singlepost':
                $id = (int)substr($uri, 12, strlen($uri));
                $view = new SinglePostView($connection, $id);
                break;
            case 'online-player':
                $view = new PlayerView();
                break;
        }

        $view->render($id);
    }
}
