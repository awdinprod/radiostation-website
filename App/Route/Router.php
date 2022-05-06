<?php

namespace App\Route;

use App\Controllers\AuthControl;
use App\Controllers\ConfirmationControl;
use App\Controllers\ContentListControl;
use App\Controllers\ForgotPasswordControl;
use App\Controllers\MainPageControl;
use App\Controllers\NewPasswordControl;
use App\Controllers\PlayerControl;
use App\Controllers\SignupControl;
use App\Controllers\SingleContentControl;
use App\Controllers\UserSettingsControl;

class Router
{
    private $url_array = array(
        '' => [
            'model_class' => array('App\Models\Post', 'App\Models\Podcast'),
            'content' => array('posts', 'podcasts'),
            'controller' => MainPageControl::class,
            'method' => 'showPage'
        ],
        'posts' => [
            'model_class' => 'App\Models\Post',
            'content' => 'posts',
            'controller' => ContentListControl::class,
            'method' => 'showPage'
        ],
        'podcasts' => [
            'model_class' => 'App\Models\Podcast',
            'content' => 'podcasts',
            'controller' => ContentListControl::class,
            'method' => 'showPage'
        ],
        'singlepost' => [
            'model_class' => 'App\Models\Post',
            'content' => 'posts',
            'controller' => SingleContentControl::class,
            'method' => 'showPage'
        ],
        'singlepodcast' => [
            'model_class' => 'App\Models\Podcast',
            'content' => 'podcasts',
            'controller' => SingleContentControl::class,
            'method' => 'showPage'
        ],
        'signup' => [
            'model_class' => null,
            'content' => 'signup',
            'controller' => SignupControl::class,
            'method' => 'showPage'
        ],
        'forgot-password' => [
            'model_class' => null,
            'content' => 'forgot-password',
            'controller' => ForgotPasswordControl::class,
            'method' => 'showPage'
        ],
        'new-password' => [
            'content' => 'new-password',
            'controller' => NewPasswordControl::class,
            'method' => 'showPage'
        ],
        'confirmation' => [
            'content' => 'confirmation',
            'controller' => ConfirmationControl::class,
            'method' => 'showPage'
        ],
        'login' => [
            'content' => 'login',
            'controller' => AuthControl::class,
            'method' => 'login'
        ],
        'logout' => [
            'content' => 'logout',
            'controller' => AuthControl::class,
            'method' => 'logout'
        ],
        'online-player' => [
            'content' => 'online-player',
            'controller' => PlayerControl::class,
            'method' => 'showPage'
        ],
        'user-settings' => [
            'content' => 'user-settings',
            'controller' => UserSettingsControl::class,
            'method' => 'showPage'
        ]
    );

    public function get($uri)
    {
        $uri_sections = explode('/', $uri);
        $uri_sections[2] ? $id = $uri_sections[2] : $id = null;
        $controller = new $this->url_array[$uri_sections[1]]['controller']();
        $method = $this->url_array[$uri_sections[1]]['method'];
        $controller->$method(
            $this->url_array[$uri_sections[1]]['content'],
            $this->url_array[$uri_sections[1]]['model_class'],
            $id
        );
    }
}
