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
    private array $url_array;

    public function get($uri)
    {
        $uri_sections = explode('/', $uri);
        $controller = new $this->url_array[$uri_sections[1]]['controller']();
        call_user_func_array(
            [$controller, $this->url_array[$uri_sections[1]]['method']],
            $this->url_array[$uri_sections[1]]['args']
        );
    }

    public function __construct()
    {
        $uri_sections = explode('/', $_SERVER['REQUEST_URI']);
        $this->url_array = array(
            '' => [
                'controller' => MainPageControl::class,
                'method' => 'showPage',
                'args' => [array('posts', 'podcasts'), array('App\Models\Post', 'App\Models\Podcast')]
            ],
            'posts' => [
                'controller' => ContentListControl::class,
                'method' => 'showPage',
                'args' => ['posts', 'App\Models\Post']
            ],
            'podcasts' => [
                'controller' => ContentListControl::class,
                'method' => 'showPage',
                'args' => ['podcasts', 'App\Models\Podcast']
            ],
            'singlepost' => [
                'controller' => SingleContentControl::class,
                'method' => 'showPage',
                'args' => ['posts', 'App\Models\Post', $uri_sections[2]]
            ],
            'singlepodcast' => [
                'controller' => SingleContentControl::class,
                'method' => 'showPage',
                'args' => ['podcasts', 'App\Models\Podcast', $uri_sections[2]]
            ],
            'signup' => [
                'controller' => SignupControl::class,
                'method' => 'showPage',
                'args' => []
            ],
            'forgot-password' => [
                'controller' => ForgotPasswordControl::class,
                'method' => 'showPage',
                'args' => []
            ],
            'new-password' => [
                'controller' => NewPasswordControl::class,
                'method' => 'showPage',
                'args' => []
            ],
            'confirmation' => [
                'controller' => ConfirmationControl::class,
                'method' => 'showPage',
                'args' => []
            ],
            'login' => [
                'controller' => AuthControl::class,
                'method' => 'login',
                'args' => []
            ],
            'logout' => [
                'controller' => AuthControl::class,
                'method' => 'logout',
                'args' => []
            ],
            'online-player' => [
                'controller' => PlayerControl::class,
                'method' => 'showPage',
                'args' => []
            ],
            'user-settings' => [
                'controller' => UserSettingsControl::class,
                'method' => 'showPage',
                'args' => []
            ],
            'phpmyadmin' => []
        );
    }
}
