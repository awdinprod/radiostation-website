<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\Podcast;
use App\Repositories\ContentRepo;
use App\Views\SingleContentView;

class SingleContentControl extends Controller
{
    public function __construct()
    {
        $this->repo = new ContentRepo();
        $this->user = new AuthControl();
        $this->view = new SingleContentView();
    }

    public function getSingleContent($content, $model_class, $id)
    {
        return $this->repo->loadSingleContent($content, $model_class, $id);
    }

    public function getComments($content, $id)
    {
        return $this->repo->loadComments($content, $id);
    }

    public function loadUsernameForComments($id)
    {
        return $this->repo->loadUsernameForComments($id);
    }

    public function showPage($content, $model_class, $id)
    {
        $single_content = $this->getSingleContent($content, $model_class, $id);
        $single_content_array = $single_content->getContent();

        $comments = $this->getComments($content, $id);
        $comments_array = array();
        foreach ($comments as $comment) {
            $comments_getter_array = $comment->getContent();
            $comments_getter_array['username'] = $this->loadUsernameForComments($comments_getter_array['user_id']);
            $comments_array[] = $comments_getter_array;
        }

        $userdata = $this->user->getUserData();
        $this->view->render($single_content_array, $content, $userdata, $comments_array);
    }
}
