<?php

namespace App\Controllers;

use App\Repositories\ContentRepo;
use App\Views\SingleContentView;

class SingleContentControl extends Controller
{
    public function getSingleContent($content, $model_class, $id)
    {
        return $this->repo->loadSingleContent($content, $model_class, $id);
    }

    public function showPage($content, $model_class, $id)
    {
        $single_content = $this->getSingleContent($content, $model_class, $id);
        $single_content_array = $single_content->getContent();
        $user = parent::userAuth();
        $this->view->render($single_content_array, $content, $user);
    }

    public function __construct()
    {
        $this->repo = new ContentRepo();
        $this->view = new SingleContentView();
    }
}