<?php

namespace App\Route;

use App\Controllers\AccountConfirmationControl;
use App\Controllers\AuthControl;
use App\Controllers\CommentControl;
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

    public function __construct()
    {
        $uri_sections = explode('/', $_SERVER['REQUEST_URI']);
        $this->url_array = array(
            '/' => [
                'controller' => MainPageControl::class,
                'method' => 'showPage',
                'args' => [['posts', 'podcasts'], ['App\Models\Post', 'App\Models\Podcast']]
            ],
            '/posts' => [
                'path_pattern' => '/posts/',
                'controller' => ContentListControl::class,
                'method' => 'showPage',
                'args' => ['posts', 'App\Models\Post']
            ],
            '/podcasts' => [
                'controller' => ContentListControl::class,
                'method' => 'showPage',
                'args' => ['podcasts', 'App\Models\Podcast']
            ],
            '/singlepost/' . $uri_sections[2] => [
                'controller' => SingleContentControl::class,
                'method' => 'showPage',
                'args' => ['posts', 'App\Models\Post', $uri_sections[2]]
            ],
            '/singlepost/' . $uri_sections[2] . '/send_comment' => [
                'controller' => CommentControl::class,
                'method' => 'addComment',
                'args' => ['posts', $uri_sections[2]]
            ],
            '/singlepost/' . $uri_sections[2] . '/' . $uri_sections[3] . '/edit' => [
                'controller' => CommentControl::class,
                'method' => 'showPage',
                'args' => [$uri_sections[3]]
            ],
            '/singlepost/' . $uri_sections[2] . '/' . $uri_sections[3] . '/edit_comment' => [
                'controller' => CommentControl::class,
                'method' => 'editComment',
                'args' => ['posts', $uri_sections[2], $uri_sections[3]]
            ],
            '/singlepost/' . $uri_sections[2] . '/' . $uri_sections[3] . '/delete_comment' => [
                'controller' => CommentControl::class,
                'method' => 'deleteComment',
                'args' => ['posts', $uri_sections[2], $uri_sections[3]]
            ],
            '/singlepodcast/' . $uri_sections[2] => [
                'controller' => SingleContentControl::class,
                'method' => 'showPage',
                'args' => ['podcasts', 'App\Models\Podcast', $uri_sections[2]]
            ],
            '/singlepodcast/' . $uri_sections[2] . '/send_comment' => [
                'controller' => CommentControl::class,
                'method' => 'addComment',
                'args' => ['podcasts', $uri_sections[2]]
            ],
            '/singlepodcast/' . $uri_sections[2] . '/' . $uri_sections[3] . '/edit' => [
                'controller' => CommentControl::class,
                'method' => 'showPage',
                'args' => [$uri_sections[3]]
            ],
            '/singlepodcast/' . $uri_sections[2] . '/' . $uri_sections[3] . '/edit_comment' => [
                'controller' => CommentControl::class,
                'method' => 'editComment',
                'args' => ['podcasts', $uri_sections[2], $uri_sections[3]]
            ],
            '/singlepodcast/' . $uri_sections[2] . '/' . $uri_sections[3] . '/delete_comment' => [
                'controller' => CommentControl::class,
                'method' => 'deleteComment',
                'args' => ['podcasts', $uri_sections[2], $uri_sections[3]]
            ],
            '/signup' => [
                'controller' => SignupControl::class,
                'method' => 'showPage',
                'args' => []
            ],
            '/forgot-password' => [
                'controller' => ForgotPasswordControl::class,
                'method' => 'showPage',
                'args' => []
            ],
            '/new-password/' . $uri_sections[2] => [
                'controller' => NewPasswordControl::class,
                'method' => 'showPage',
                'args' => [$uri_sections[2]]
            ],
            '/confirmation/' . $uri_sections[2] => [
                'controller' => AccountConfirmationControl::class,
                'method' => 'showPage',
                'args' => [$uri_sections[2]]
            ],
            '/login' => [
                'controller' => AuthControl::class,
                'method' => 'login',
                'args' => []
            ],
            '/logout' => [
                'controller' => AuthControl::class,
                'method' => 'logout',
                'args' => []
            ],
            '/online-player' => [
                'controller' => PlayerControl::class,
                'method' => 'showPage',
                'args' => []
            ],
            '/user-settings' => [
                'controller' => UserSettingsControl::class,
                'method' => 'showPage',
                'args' => []
            ],
            '/phpmyadmin' => [],
            '/api-user-changedata' => [
                'controller' => UserSettingsControl::class,
                'method' => 'changeData',
                'args' => []
            ],
        );
    }

    public function get($uri)
    {
        if (array_key_exists($uri, $this->url_array)) {
            $controller = new $this->url_array[$uri]['controller']();
            call_user_func_array(
                [$controller, $this->url_array[$uri]['method']],
                $this->url_array[$uri]['args']
            );
        } else {
            echo "404: page not found";
        }
    }
}
