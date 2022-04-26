<?php

namespace App\Route;

use App\Controllers\ContentListControl;
use App\Controllers\LoginSignupControl;
use App\Controllers\MainPageControl;
use App\Controllers\PlayerControl;
use App\Controllers\SingleContentControl;

class Router
{
    public function get($uri)
    {
        $uri_sections = explode('/', $uri);

        if (isset($_POST['login_user'])) {
            extract($_POST, EXTR_SKIP);
            $control = new LoginSignupControl();
            $user = $control->login($username, $password);
            setcookie('username', $user->getUsername());
            setcookie('role', $user->getRole());
            header('Location: /');
            die();
        }

        switch ($uri_sections[1]) {
            case '':
                $model_class = array('App\Models\Post', 'App\Models\Podcast');
                $uri_sections[1] = array('posts', 'podcasts');
                $control = new MainPageControl();
                break;
            case 'posts':
                $model_class = 'App\Models\Post';
                $control = new ContentListControl();
                break;
            case 'singlepost':
                $id = $uri_sections[2];
                $model_class = 'App\Models\Post';
                $uri_sections[1] = 'posts';
                $control = new SingleContentControl();
                break;
            case 'podcasts':
                $model_class = 'App\Models\Podcast';
                $control = new ContentListControl();
                break;
            case 'singlepodcast':
                $id = $uri_sections[2];
                $model_class = 'App\Models\Podcast';
                $uri_sections[1] = 'podcasts';
                $control = new SingleContentControl();
                break;
            case 'signup':
                $control = new LoginSignupControl();
                break;
            case 'confirmation':
                $control = new LoginSignupControl();
                $control->checkConfirmation($uri_sections[2]);
                break;
            case 'logout':
                unset($_COOKIE['username']);
                setcookie('username', null, -1, '/');
                unset($_COOKIE['role']);
                setcookie('role', null, -1, '/');
                header('Location: /');
                die();
            case 'online-player':
                $control = new PlayerControl();
                break;
            default:
                break;
        }

        $control->showPage($uri_sections[1], $model_class, $id);
    }
}
