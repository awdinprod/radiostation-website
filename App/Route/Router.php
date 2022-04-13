<?php

namespace App\Route;

use App\Controllers\ContentListControl;
use App\Controllers\PlayerControl;
use App\Controllers\SingleContentControl;
use App\Views\MainPageView;
use App\Views\PostPageView;
use App\Views\SinglePostView;

class Router
{
    public function get($uri)
    {
        $section = explode('/', $uri);

        switch ($section[1]) {
            case '':
//                $view = new MainPageView($connection);
                break;
            case 'posts':
                $id = (int)substr($uri, 7, strlen($uri));
                $class = 'App\Models\Post';
                $control = new ContentListControl();
                break;
            case 'singlepost':
                $id = (int)substr($uri, 12, strlen($uri));
                $class = 'App\Models\Post';
                $section[1] = 'posts';
                $control = new SingleContentControl();
                break;
            case 'podcasts':
                $id = (int)substr($uri, 10, strlen($uri));
                $class = 'App\Models\Podcast';
                $control = new ContentListControl();
                break;
            case 'singlepodcast':
                $id = (int)substr($uri, 15, strlen($uri));
                $class = 'App\Models\Podcast';
                $section[1] = 'podcasts';
                $control = new SingleContentControl();
                break;
            case 'online-player':
                $control = new PlayerControl();
                break;
        }

        $control->showPage($section[1], $class, $id);
    }
}
