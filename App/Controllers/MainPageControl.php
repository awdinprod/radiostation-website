<?php

namespace App\Controllers;

use App\Repositories\ContentRepo;
use App\Views\MainPageView;

class MainPageControl extends Controller
{
    public function getLatestContent($content, $model_class, $content_num)
    {
        return $this->repo->loadLatestContent($content, $model_class, $content_num);
    }

    public function showPage($content, $model_class, $id = null)
    {
        $post_list = $this->getLatestContent($content[0], $model_class[0], 6);
        $podcast_list = $this->getLatestContent($content[1], $model_class[1], 4);
        $post_list_array = array();
        foreach ($post_list as $unit) {
            $post_list_array[] = $unit->getContent();
        }
        $podcast_list_array = array();
        foreach ($podcast_list as $unit) {
            $podcast_list_array[] = $unit->getContent();
        }
        $userdata = $this->user->getUserData();
        $this->view->render($post_list_array, $podcast_list_array, $userdata);
    }

    public function __construct()
    {
        $this->repo = new ContentRepo();
        $this->user = new AuthControl();
        $this->view = new MainPageView();
    }
}